<div class="col-sm">

    <?php

        require_once('../../controllers/database.php') ;

        $ps = $pdo->prepare("SELECT m.*, c.match_id, j1.surname AS j1_surname, j1.name AS j1_name, j1.cat AS j1_cat, j2.surname AS j2_surname, j2.name AS j2_name, j2.cat AS j2_cat FROM matchs m INNER JOIN courts c INNER JOIN players j1 ON (j1.id = m.blue_player) INNER JOIN players j2 ON (j2.id = m.red_player) WHERE m.id=c.match_id AND c.id=$nb") ;
        $et = $ps->execute() ;
        $et = $ps -> fetch() ;
        
        if (empty($et)) {
            $et= [
            
                'hour'=>'**:**',
                'score'=>'{
                            "round1": {"red": 0, "blue": 0, "state" : 0}, 
                            "round2": {"red": 0, "blue": 0, "state" : 0}, 
                            "round3": {"red": 0, "blue": 0, "state" : 0}, 
                            "round4": {"red": 0, "blue": 0, "state" : 0}, 
                            "round5": {"red": 0, "blue": 0, "state" : 0}
                        }',

                'j1_name'=>'',
                'j1_surname'=>'',
                'j1_cat'=>'*',
              
                'j2_name'=>'',
                'j2_surname'=>'',
                'j2_cat'=>'*',

                'vide'=>1, 
                
                ] ;
        }


        ######################

        $json = json_decode($et['score']);

        $set_blue = 0 ;
        $set_red = 0 ;
        for ($j=1; $j <=5 ; $j++) { 
            $round = "round".$j ;
            if ($json->$round->state == "2") {
                if ($json->$round->red > $json->$round->blue) {
                    $set_red++ ;
                }else{
                    $set_blue++ ;
                }
            }
        }
    ?>

    <?php 
    if (isset($et['vide'])) {
        echo("<a href='' style='text-decoration:none' class='text-danger'>") ;
    }else{
        echo("<a href='../../controllers/arbitration/select_match.php?table=".intval($nb)."' style='text-decoration:none' class='text-danger'>") ;
    }
    ?>

            <table class="table table-dark table-borderless" id="tableau">

                <thead>
                    Table <?php echo($nb)?> - <?php echo( substr($et['hour'],0,5) ) ?>
                    <?php if ($et['j1_cat'] == $et['j2_cat']) { 
                        $cat = $et['j1_cat'] ; 
                        echo(" - Cl. ".$cat) ; 
                    }else{
                        $cat = $et['j1_cat']."&".$et['j2_cat'] ;
                        echo(" - Cl. ".$cat) ;
                    } ?>
                </thead>

                <tbody>
                    <tr>
                        <th scope="row">
                            <?php echo($et['j1_name']." ".$et['j1_surname'])?>
                            <?php #if ($et[0]['cat'] != $et[1]['cat']) { $cat = $et[0]['cat']; echo( "  Cat. ".$cat); } ?>
                        </th>
                        <td width=10% class="font-weight-bold" id="set"><?php echo($set_blue) ?></td>
                        <td width=10% <?php if ($json->round1->state == "2") { echo("class='text-dark'"); }?>> <?php echo($json->round1->blue)?></td>
                        <td width=10% <?php if ($json->round2->state == "2") { echo("class='text-dark'"); }?>> <?php echo($json->round2->blue)?></td>
                        <td width=10% <?php if ($json->round3->state == "2") { echo("class='text-dark'"); }?>> <?php echo($json->round3->blue)?></td>
                        <td width=10% <?php if ($json->round4->state == "2") { echo("class='text-dark'"); }?>> <?php echo($json->round4->blue)?></td>
                        <td width=10% <?php if ($json->round5->state == "2") { echo("class='text-dark'"); }?>> <?php echo($json->round5->blue)?></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <?php echo($et['j2_name']." ".$et['j2_surname'])?>
                            <?php #if ($et[0]['cat'] != $et[1]['cat']) { $cat = $et[1]['cat']; echo( "  Cat. ".$cat); } ?>
                        </th>
                        <td width=10% class="font-weight-bold" id="set"><?php echo($set_red) ?></td>
                        <td width=10% <?php if ($json->round1->state == "2") { echo("class='text-dark'"); }?>><?php echo($json->round1->red)?></td>
                        <td width=10% <?php if ($json->round2->state == "2") { echo("class='text-dark'"); }?>><?php echo($json->round2->red)?></td>
                        <td width=10% <?php if ($json->round3->state == "2") { echo("class='text-dark'"); }?>><?php echo($json->round3->red)?></td>
                        <td width=10% <?php if ($json->round4->state == "2") { echo("class='text-dark'"); }?>><?php echo($json->round4->red)?></td>
                        <td width=10% <?php if ($json->round5->state == "2") { echo("class='text-dark'"); }?>><?php echo($json->round5->red)?></td>
                    </tr>
                </tbody>
            </table>
        </a>

</div>