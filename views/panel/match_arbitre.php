<?php
include_once '../../includes/partials/header_panel.html';
include_once '../../includes/toasts.php';
?>

<?php

$num_match = $_GET['match'] ;

require_once('../../controllers/database.php') ;

$et = $pdo->prepare("SELECT * FROM matchs WHERE id=$num_match") ;
$et->execute() ;
$et = $et->fetch() ;

?>

<div class="container" max-width=75%>

    <h3 class="text-center shadow-none p-3 mb-4 bg-light rounded">
        Table <?php echo($et['court']) ?> - <?php echo( substr($et['hour'],0,5) ) ?>
    </h3>


    <?php #Infos joueurs

        $blue = $et['blue_player'];

        $psBlue = $pdo->prepare("SELECT * FROM players WHERE id=$blue") ;
        $psBlue->execute() ;

        $etBlue = $psBlue -> fetch() ;

        ######################

        $red = $et['red_player'];

        $psRed = $pdo->prepare("SELECT * FROM players WHERE id=$red") ;
        $psRed->execute() ;

        $etRed = $psRed -> fetch();
    ?>


    <table class="table table-secondary">

        <!-- Affichage joueur bleu -->
        <td>

            <div class="card bg-primary mb-3" style="width: 18rem;">

                <img src="../../assets/img/players/<?php echo($etBlue['picture'])?>" class="card-img-top" width=320 height=320 alt="">

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
                        <td width=10%><?php echo($json_clear->round1->blue)?></td>
                        <td width=10%><?php echo($json_clear->round2->blue)?></td>
                        <td width=10%><?php echo($json_clear->round3->blue)?></td>
                        <td width=10%><?php echo($json_clear->round4->blue)?></td>
                        <td width=10%><?php echo($json_clear->round5->blue)?></td>
                    </tr>

                    <tr>
                        <th scope="row">
                            <?php echo($etRed['surname'])?>
                        </th>
                        <td width=10%><?php echo($json_clear->round1->red)?></td>
                        <td width=10%><?php echo($json_clear->round2->red)?></td>
                        <td width=10%><?php echo($json_clear->round3->red)?></td>
                        <td width=10%><?php echo($json_clear->round4->red)?></td>
                        <td width=10%><?php echo($json_clear->round5->red)?></td>
                    </tr>

                </tbody>
                <?php

                
                ?>
            </table>


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
                        <div type="button" class="card bg-primary btn btn-light">
                            <h1>+</h1>
                        </div>
                    </td>
                    <td width=50%>
                            <a href="plusunrouge.php?match=<?php echo $num_match ?>&player=red&action=p" >
                        <div type="button" class="card bg-danger btn btn-light">
                            <h1>+</h1>
                        </div>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td width=50%>
                        <div type="button" class="card bg-primary btn btn-light">
                            <h1>-</h1>
                        </div>
                    </td>
                    <td width=50%>
                    <a href="moinsunrouge.php?match=<?php echo $num_match ?>&player=red&action=p" >
                        <div type="button" class="card bg-danger btn btn-light">
                            <h1>-</h1>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td width=50%>
                        <div type="button" class="card bg-dark btn btn-light">
                            <h1 class="text-white">Set</h1>
                        </div>
                    </td>
                    <td width=50%>
                        <div type="button" class="card bg-success btn btn-light disabled">
                            <h1>Match</h1>
                        </div>
                    </td>
                </tr>
            </table>


        </td>
        <!-- Fin cadre -->

        <!-- Affichage joueur rouge -->
        <td>

            <div class="card bg-danger mb-3" style="width: 18rem;">

                <img src="../../assets/img/players/<?php echo($etRed['picture'])?>" class="card-img-top" width=320 height=320 alt="">

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