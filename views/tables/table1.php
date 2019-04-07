<?php

    #Recuperation id du match
    $id = 1;

    require_once('../../controllers/database.php') ;

    $ps = $pdo->prepare("SELECT * FROM matchs WHERE id=$id AND state=1") ;
    $ps->execute() ;

    $et = $ps -> fetch() ;


    if (empty($et)) {
        $ps = $pdo->prepare("SELECT * FROM matchs WHERE court=1 AND state=2 ORDER BY 'hour' DESC") ;
        $ps->execute() ;

        $et = $ps -> fetch() ;

        if (empty($et)) {
    
            $et = [] ;
        }
    }

?>

<!--==========-->

<?php include("../../includes/partials/header.php") ?>

<!--==========-->

<div class="container">

    <h3 class="text-center">
        Table 1 - <?php echo($et['hour']) ?>
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

                <img src="../../assets/img/players/<?php echo($etBlue['picture'])?>" class="card-img-top" width="320" height=320 alt="">

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

        
        <td>

            <!--<img src="../../assets/img/table.jpg" class="img-fluid" alt="Responsive image">-->
            <iframe width="450" height="318" src="https://www.youtube.com/embed/SlomarPy4oo" frameborder="2" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"></iframe>

            <br />
            <br />

            <!-- Partie à refresh -->
            <table class="table table-warning table-bordered">

                <?php

                    $ps = $pdo->prepare("SELECT score FROM matchs WHERE id=$id") ;
                    $ps->execute() ;

                    $json = $ps -> fetch() ;

                    $json_clear = json_decode($json['score']) ;
                
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
                            <span class="badge badge-secondary">Service</span>
                        </th>
                        <td width=10%><?php echo($json_clear->round1->red)?></td>
                        <td width=10%><?php echo($json_clear->round2->red)?></td>
                        <td width=10%><?php echo($json_clear->round3->red)?></td>
                        <td width=10%><?php echo($json_clear->round4->red)?></td>
                        <td width=10%><?php echo($json_clear->round5->red)?></td>
                    </tr>

                </tbody>

            </table>
            <!-- Fin de partie -->

            <?php #Affichage etat du match
                if ( $et['state'] == 1) {
                    echo("<h3 class='text-success text-center'>En cours</h3>");
                }
                elseif ( $et['state'] == 2) {
                    echo("<h3 class='text-danger text-center'>Terminé</h3>");
                }
            ?>

        </td>


        <!-- Affichage joueur rouge -->
        <td>

            <div class="card bg-danger mb-3" style="width: 18rem;">

                <img src="../../assets/img/players/<?php echo($etRed['picture'])?>" class="card-img-top" width="320" height=320 alt="">

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
