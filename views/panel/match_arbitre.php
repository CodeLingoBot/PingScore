<?php
include_once '../../includes/partials/header_panel.html';
include_once '../../includes/toasts.php';
?>

<?php

$num_match = $_GET['match'] ;

require_once('../../controllers/database.php') ;

$et = $pdo->prepare("SELECT * FROM matchs WHERE id=?") ;
$et->execute(array($num_match));
$et = $et->fetch();

$table = $pdo->prepare("SELECT id FROM courts WHERE match_id=?") ;
$table->execute(array($num_match));
$table = $table->fetch();

?>

<div class="container" style='border: solid red;'>

    <h3 class="text-center shadow-none p-3 mb-4 bg-light rounded">
        Table <?php echo $table['id'] ?> - <?php echo( substr($et['hour'],0,5) ) ?>
    </h3>


    <?php #Infos joueurs

        $blue = $et['blue_player'];

        $psBlue = $pdo->prepare("SELECT * FROM players WHERE id=?") ;
        $psBlue->execute(array($blue)) ;

        $etBlue = $psBlue -> fetch() ;

        ######################

        $red = $et['red_player'];

        $psRed = $pdo->prepare("SELECT * FROM players WHERE id=?") ;
        $psRed->execute(array($red)) ;

        $etRed = $psRed -> fetch();
    ?>


    <table class="table table-secondary table-responsive">

        <!-- Affichage joueur bleu -->
        <td>

            <div class="card bg-primary mb-3" style="width: 18rem;">

            <img src="../../assets/img/players/<?php if (empty($etBlue['picture'])) { echo('vide.png') ;}else { echo($etBlue['picture']) ; } ; ?>" class="card-img-top" width="320" height=320 alt="">

                <div class="card-body">
                    <h5 class="card-title">
                        <?php echo($etBlue['name']) ?>
                        <?php echo($etBlue['surname']) ?>
                    </h5>
                </div>

                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        Cat. <?php echo($etBlue['cat']) ?>
                    </li>
                    <li class="list-group-item">
                        <?php echo($etBlue['club']) ?>
                    </li>
                </ul>
                    
            </div>

        </td> 
        <!-- Fin affichage bleu -->


        <!-- Cadre centre -->
        <td>

            <!-- Affichage score -->
            <table class="table table-warning table-bordered">

                <?php 

                    $json = $et['score'] ;
                    $json_clear = json_decode($json) ;

                ?>

                <tbody>

                    <tr>
                        <th scope="row">
                            <?php echo($etBlue['surname'])?>
                        </th>
                        <td width=10% <?php if ($json_clear->round1->state == "2") { echo("class='text-muted'"); }?>><?php echo($json_clear->round1->blue)?></td>
                        <td width=10% <?php if ($json_clear->round2->state == "2") { echo("class='text-muted'"); }?>><?php echo($json_clear->round2->blue)?></td>
                        <td width=10% <?php if ($json_clear->round3->state == "2") { echo("class='text-muted'"); }?>><?php echo($json_clear->round3->blue)?></td>
                        <td width=10% <?php if ($json_clear->round4->state == "2") { echo("class='text-muted'"); }?>><?php echo($json_clear->round4->blue)?></td>
                        <td width=10% <?php if ($json_clear->round5->state == "2") { echo("class='text-muted'"); }?>><?php echo($json_clear->round5->blue)?></td>
                    </tr>

                    <tr>
                        <th scope="row">
                            <?php echo($etRed['surname'])?>
                        </th>
                        <td width=10% <?php if ($json_clear->round1->state == "2") { echo("class='text-muted'"); }?>><?php echo($json_clear->round1->red)?></td>
                        <td width=10% <?php if ($json_clear->round2->state == "2") { echo("class='text-muted'"); }?>><?php echo($json_clear->round2->red)?></td>
                        <td width=10% <?php if ($json_clear->round3->state == "2") { echo("class='text-muted'"); }?>><?php echo($json_clear->round3->red)?></td>
                        <td width=10% <?php if ($json_clear->round4->state == "2") { echo("class='text-muted'"); }?>><?php echo($json_clear->round4->red)?></td>
                        <td width=10% <?php if ($json_clear->round5->state == "2") { echo("class='text-muted'"); }?>><?php echo($json_clear->round5->red)?></td>
                    </tr>

                </tbody>

            </table>
            <!-- Fin affichage score -->

            <!-- Boutons -->
            <table class="table table-borderless text-center">
                <tr>
                    <td width=50%>
                        <div type="button" class="card bg-dark btn btn-light disabled">
                            <h1 class="text-white">Service</h1>
                        </div>
                    </td>

                    <td width=50%>
                        <div type="button" class="card bg-dark btn btn-light">
                            <h1 class="text-white">Service</h1>
                        </div>
                    </td>
                <tr>
                <tr>
                    <td width=50%>
                        <a href="../../controllers/arbitration/evo_score.php?match=<?php echo $num_match ?>&player=blue&action=plus" >
                        <div type="button" class="card bg-primary btn btn-light">
                            <h1>+</h1>
                        </div>
                        </a>
                    </td>
                    <td width=50%>
                        <a href="../../controllers/arbitration/evo_score.php?match=<?php echo $num_match ?>&player=red&action=plus" >
                        <div type="button" class="card bg-danger btn btn-light">
                            <h1>+</h1>
                        </div>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td width=50%>
                        <a href="../../controllers/arbitration/evo_score.php?match=<?php echo $num_match ?>&player=blue&action=less" >
                        <div type="button" class="card bg-primary btn btn-light">
                            <h1>-</h1>
                        </div>
                        </a>
                    </td>
                    <td width=50%>
                        <a href="../../controllers/arbitration/evo_score.php?match=<?php echo $num_match ?>&player=red&action=less" >
                        <div type="button" class="card bg-danger btn btn-light">
                            <h1>-</h1>
                        </div>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td width=50%>
                        <a href="../../controllers/arbitration/evo_round.php?match=<?php echo $num_match ?>" >
                        <div type="button" class="card bg-dark btn btn-light">
                            <h1 class="text-white">Set</h1>
                        </div>
                        </a>
                    </td>
                    <td width=50%>
                        <a href="../../controllers/arbitration/state_match.php?match=<?php echo $num_match ?>" >
                        <div type="button" class="card bg-success btn btn-light disabled">
                            <h1>Match</h1>
                        </div>
                        </a>
                    </td>
                </tr>
            </table>
            <!-- Fin boutons -->

            <?php #Affichage etat du match
                if ( $et['state'] == 0 ) {
                    echo("<h3 class='text-info text-center'>Non attribué</h3>");
                }elseif ( $et['state'] == 1) {
                    echo("<h3 class='text-success text-center'>En cours</h3>");
                }
                elseif ( $et['state'] == 2) {
                    echo("<h3 class='text-danger text-center'>Terminé</h3>");
                }
            ?>

        </td>
        <!-- Fin cadre -->


        <!-- Affichage joueur rouge -->
        <td>

            <div class="card bg-danger mb-3" style="width: 18rem;">

            <img src="../../assets/img/players/<?php if (empty($etRed['picture'])) { echo('vide.png') ;}else { echo($etRed['picture']) ; } ; ?>" class="card-img-top" width="320" height=320 alt="">

                <div class="card-body">
                    <h5 class="card-title">
                        <?php echo($etRed['name']) ?>
                        <?php echo($etRed['surname']) ?>
                    </h5>
                </div>

                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        Cat. <?php echo($etRed['cat']) ?>
                    </li>
                    <li class="list-group-item">
                        <?php echo($etRed['club']) ?>
                    </li>
                </ul>
                        
            </div>

        </td>
        <!-- Fin affichage rouge -->

    </table>

</div>

<?php
include_once '../../includes/partials/footer_panel.html';
?>