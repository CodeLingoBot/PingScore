<div class="col-sm">

    <?php

        require_once('../controllers/database.php') ;

        $ps = $pdo->prepare("SELECT m.court, j.name, j.surname, j.cat, m.hour, m.score FROM matchs m INNER JOIN players j ON (j.id = m.blue_player OR j.id = m.red_player) AND m.court=$nb AND m.state=1") ;
        $result = $ps->execute() ;
        $et = $ps -> fetchAll() ;
        
        if (empty($et)) {
            $et= [
                [ 
                    'name'=>'',
                    'surname'=>'',
                    'cat'=>'*',
                    'hour'=>'**:**',
                    'score'=>'{"round1": {"red": 0, "blue": 0, "state" : 0}, "round2": {"red": 0, "blue": 0, "state" : 0}, "round3": {"red": 0, "blue": 0, "state" : 0}, "round4": {"red": 0, "blue": 0, "state" : 0}, "round5": {"red": 0, "blue": 0, "state" : 0}}'
                ],
                [
                    'name'=>'',
                    'surname'=>'',
                    'cat'=>'*',
                    'hour'=>'**:**',
                ]
                ] ;
        }


        ######################

        $json = json_decode($et[0]['score']);

    ?>

        <a href="table.php?table=<?php echo($nb)?>" style="text-decoration:none" class="text-danger">

            <table class="table table-info">

                <thead>
                    Table <?php echo($nb)?> - <?php echo( substr($et[0]['hour'],0,5) ) ?>
                    <?php if ($et[0]['cat'] == $et[1]['cat']) { 
                        $cat = $et[0]['cat'] ; 
                        echo(" - Cat. ".$cat) ; 
                    } ?>
                </thead>

                <tbody>
                    <tr>
                        <th scope="row">
                            <?php echo($et[0]['name']." ".$et[0]['surname'])?>
                            <?php #if ($et[0]['cat'] != $et[1]['cat']) { $cat = $et[0]['cat']; echo( "  Cat. ".$cat); } ?>
                        </th>
                        <td width=10% <?php if ($json->round1->state == "1") { echo("class='text-danger'"); }?>> <?php echo($json->round1->blue)?></td>
                        <td width=10% <?php if ($json->round2->state == "1") { echo("class='text-danger'"); }?>> <?php echo($json->round2->blue)?></td>
                        <td width=10% <?php if ($json->round3->state == "1") { echo("class='text-danger'"); }?>> <?php echo($json->round3->blue)?></td>
                        <td width=10% <?php if ($json->round4->state == "1") { echo("class='text-danger'"); }?>> <?php echo($json->round4->blue)?></td>
                        <td width=10% <?php if ($json->round5->state == "1") { echo("class='text-danger'"); }?>> <?php echo($json->round5->blue)?></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <?php echo($et[1]['name']." ".$et[1]['surname'])?>
                            <?php #if ($et[0]['cat'] != $et[1]['cat']) { $cat = $et[1]['cat']; echo( "  Cat. ".$cat); } ?>
                        </th>
                        <td width=10% <?php if ($json->round1->state == "1") { echo("class='text-danger'"); }?>><?php echo($json->round1->red)?></td>
                        <td width=10% <?php if ($json->round2->state == "1") { echo("class='text-danger'"); }?>><?php echo($json->round2->red)?></td>
                        <td width=10% <?php if ($json->round3->state == "1") { echo("class='text-danger'"); }?>><?php echo($json->round3->red)?></td>
                        <td width=10% <?php if ($json->round4->state == "1") { echo("class='text-danger'"); }?>><?php echo($json->round4->red)?></td>
                        <td width=10% <?php if ($json->round5->state == "1") { echo("class='text-danger'"); }?>><?php echo($json->round5->red)?></td>
                    </tr>
                </tbody>
            </table>
        </a>

</div>