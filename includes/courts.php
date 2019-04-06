<div class="col-sm">

            <?php

                require_once('../controllers/database.php') ;

                $ps = $pdo->prepare("SELECT m.court, j.surname, m.hour, m.score FROM matchs m INNER JOIN players j ON (j.id = m.blue_player OR j.id = m.red_player) AND m.court=$nb AND m.state=1") ;
                $result = $ps->execute() ;
                $et = $ps -> fetchAll() ;  
                
                if (empty($et)) {
                    $et= [
                        [ 
                            'surname'=>'',
                            'hour'=>'',
                            'score'=>'{"round1": {"red": 0, "blue": 0}, "round2": {"red": 0, "blue": 0}, "round3": {"red": 0, "blue": 0}, "round4": {"red": 0, "blue": 0}, "round5": {"red": 0, "blue": 0}}'
                        ],
                        [
                            'surname'=>'',
                            'hour'=>'',
                            'score'=>'{"round1": {"red": 0, "blue": 0}, "round2": {"red": 0, "blue": 0}, "round3": {"red": 0, "blue": 0}, "round4": {"red": 0, "blue": 0}, "round5": {"red": 0, "blue": 0}}'
                        ]
                        ] ;
                }


                ######################

                $json = json_decode($et[0]['score']);

            ?>

            <a href="tables/table<?php echo($nb)?>.php" style="text-decoration:none;">
                <table class="table table-info">

                    <thead>
                        Table <?php echo($nb)?> - <?php echo($et[0]['hour'])?>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">
                                <?php echo($et[0]['surname'])?>
                            </th>
                            <td width=10%><?php echo($json->round1->blue)?></td>
                            <td width=10%><?php echo($json->round2->blue)?></td>
                            <td width=10%><?php echo($json->round3->blue)?></td>
                            <td width=10%><?php echo($json->round4->blue)?></td>
                            <td width=10%><?php echo($json->round5->blue)?></td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <?php echo($et[1]['surname'])?>
                            </th>
                            <td width=10%><?php echo($json->round1->red)?></td>
                            <td width=10%><?php echo($json->round2->red)?></td>
                            <td width=10%><?php echo($json->round3->red)?></td>
                            <td width=10%><?php echo($json->round4->red)?></td>
                            <td width=10%><?php echo($json->round5->red)?></td>
                        </tr>
                    </tbody>
                </table>
            </a>
        </div>