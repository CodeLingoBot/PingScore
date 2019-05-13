<?php

$num_table = 1 ;

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


           <table class="table table-dark table-borderless" id="match">

                <?php #Traitement du score + comptage des sets

                    $json_clear = json_decode($et['score']) ;

                    $set_blue = 0 ;
                    $set_red = 0 ;
                    for ($i=1; $i <=5 ; $i++) {
                        $round = "round".$i ;
                        if ($json_clear->$round->state == "2") {
                            if ($json_clear->$round->red > $json_clear->$round->blue) {
                                $set_red++ ;
                            }else{
                                $set_blue++ ;
                            }
                        }
                    }

                ?>

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

                <tbody>

                    <tr>
                        <th scope="row">
                            <?php echo($etBlue['surname'])?>
                        </th>
                        <td width=10% class="font-weight-bold" id="set"><?php echo($set_blue) ?></td>
                        <td width=10% <?php if ($json_clear->round1->state == "2") { echo("class='text-dark'"); }?>> <?php echo($json_clear->round1->blue)?></td>
                        <td width=10% <?php if ($json_clear->round2->state == "2") { echo("class='text-dark'"); }?>> <?php echo($json_clear->round2->blue)?></td>
                        <td width=10% <?php if ($json_clear->round3->state == "2") { echo("class='text-dark'"); }?>> <?php echo($json_clear->round3->blue)?></td>
                        <td width=10% <?php if ($json_clear->round4->state == "2") { echo("class='text-dark'"); }?>> <?php echo($json_clear->round4->blue)?></td>
                        <td width=10% <?php if ($json_clear->round5->state == "2") { echo("class='text-dark'"); }?>> <?php echo($json_clear->round5->blue)?></td>
                    </tr>

                    <tr>
                        <th scope="row">
                            <?php echo($etRed['surname'])?>
                        </th>
                        <td width=10% class="font-weight-bold" id="set"><?php echo($set_red) ?></td>
                        <td width=10% <?php if ($json_clear->round1->state == "2") { echo("class='text-dark'"); }?>> <?php echo($json_clear->round1->red)?></td>
                        <td width=10% <?php if ($json_clear->round2->state == "2") { echo("class='text-dark'"); }?>> <?php echo($json_clear->round2->red)?></td>
                        <td width=10% <?php if ($json_clear->round3->state == "2") { echo("class='text-dark'"); }?>> <?php echo($json_clear->round3->red)?></td>
                        <td width=10% <?php if ($json_clear->round4->state == "2") { echo("class='text-dark'"); }?>> <?php echo($json_clear->round4->red)?></td>
                        <td width=10% <?php if ($json_clear->round5->state == "2") { echo("class='text-dark'"); }?>> <?php echo($json_clear->round5->red)?></td>
                    </tr>

                </tbody>

            </table>