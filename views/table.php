<?php

    $num_table = $_GET['table'] ;

    require_once('../controllers/database.php') ;

    #Recuperation donné table
    $court = $pdo->prepare("SELECT * FROM courts WHERE id=?") ;
    $court->execute(array($num_table)) ;
    $court = $court->fetch() ;


    if ($court['match_id'] === null) {

        $et = [
            'blue_player'=>0,
            'red_player'=>0,
            'hour'=>'',
            'score'=>'{
                    "round1" : { "blue" : 0, "red" : 0, "state" : 1 },
                    "round2" : { "blue" : 0, "red" : 0, "state" : 0 },
                    "round3" : { "blue" : 0, "red" : 0, "state" : 0 },
                    "round4" : { "blue" : 0, "red" : 0, "state" : 0 },
                    "round5" : { "blue" : 0, "red" : 0, "state" : 0 }
                }',
            'state'=>0
        ] ;

    }else{

        $id = $court['match_id'] ;

        #Match selectionné
        $ps = $pdo->prepare("SELECT * FROM matchs WHERE id=?") ;
        $ps->execute(array($id)) ;
        $et = $ps -> fetch() ;    

    };

?>

<!--==========-->

<?php include("../includes/partials/header.html") ?>

<!--==========-->

<div class="container">

    <h3 class="text-center shadow-none p-3 mb-4 bg-light rounded">
        Table <?php echo($num_table) ?> - <?php echo( substr($et['hour'],0,5) ) ?>
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

    <table class="table table-secondary shadow p-3 mb-5 rounded">

        <!-- Affichage joueur bleu -->
        <td>

            <div class="card bg-primary mb-3" style="width: 18rem;">

                <img src="../assets/img/players/<?php if (empty($etBlue['picture'])) { echo('vide.png') ;}else { echo($etBlue['picture']) ; } ; ?>" class="card-img-top" width="320" height=320 alt="">

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

            <?php #Case centrale 
                if (empty($court['video'])) {

                    echo('<iframe width="450" height="318" src="https://www.youtube.com/embed/nadxO6ZnDDA" frameborder="2" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"></iframe>') ;

                }else {
                    
                    echo('<iframe class="embed-responsive-item" width="450" height="318" src='.$court['video'].' frameborder="2" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"></iframe>') ;

                } ;

            ?>

            <br />
            <br />

            <!-- Partie à refresh -->
            <table class="table table-warning table-bordered">

                <?php

                    if (!empty($id)) {

                        $ps = $pdo->prepare("SELECT score FROM matchs WHERE id=?") ;
                        $ps->execute(array($id)) ;

                        $json = $ps -> fetch() ;

                    }else{

                        $json = [
                            'score'=>'{
                                "round1" : { "blue" : 0, "red" : 0, "state" : 1 },
                                "round2" : { "blue" : 0, "red" : 0, "state" : 0 },
                                "round3" : { "blue" : 0, "red" : 0, "state" : 0 },
                                "round4" : { "blue" : 0, "red" : 0, "state" : 0 },
                                "round5" : { "blue" : 0, "red" : 0, "state" : 0 }
                            }',
                        ];

                    }

                    

                    $json_clear = json_decode($json['score']) ;
                
                ?>

                <tbody>

                    <tr>
                        <th scope="row">
                            <?php echo($etBlue['surname'])?>
                        </th>
                        <td width=10% <?php if ($json_clear->round1->state == "2") { echo("class='text-secondary'"); }?>> <?php echo($json_clear->round1->blue)?></td>
                        <td width=10% <?php if ($json_clear->round2->state == "2") { echo("class='text-secondary'"); }?>> <?php echo($json_clear->round2->blue)?></td>
                        <td width=10% <?php if ($json_clear->round3->state == "2") { echo("class='text-secondary'"); }?>> <?php echo($json_clear->round3->blue)?></td>
                        <td width=10% <?php if ($json_clear->round4->state == "2") { echo("class='text-secondary'"); }?>> <?php echo($json_clear->round4->blue)?></td>
                        <td width=10% <?php if ($json_clear->round5->state == "2") { echo("class='text-secondary'"); }?>> <?php echo($json_clear->round5->blue)?></td>
                    </tr>

                    <tr>
                        <th scope="row">
                            <?php echo($etRed['surname'])?>

                            <!--
                            <span class="badge badge-secondary">Service</span>
                            -->

                        </th>
                        <td width=10% <?php if ($json_clear->round1->state == "2") { echo("class='text-secondary'"); }?>> <?php echo($json_clear->round1->red)?></td>
                        <td width=10% <?php if ($json_clear->round2->state == "2") { echo("class='text-secondary'"); }?>> <?php echo($json_clear->round2->red)?></td>
                        <td width=10% <?php if ($json_clear->round3->state == "2") { echo("class='text-secondary'"); }?>> <?php echo($json_clear->round3->red)?></td>
                        <td width=10% <?php if ($json_clear->round4->state == "2") { echo("class='text-secondary'"); }?>> <?php echo($json_clear->round4->red)?></td>
                        <td width=10% <?php if ($json_clear->round5->state == "2") { echo("class='text-secondary'"); }?>> <?php echo($json_clear->round5->red)?></td>
                    </tr>

                </tbody>

            </table>
            <!-- Fin de partie -->

            <?php #Affichage etat du match
                if ( $et['state'] == 0 ) {
                    echo("<h3 class='text-info text-center'>Aucun match</h3>");
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

            <img src="../assets/img/players/<?php if (empty($etRed['picture'])) { echo('vide.png') ;}else { echo($etRed['picture']) ; } ; ?>" class="card-img-top" width="320" height=320 alt="">

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