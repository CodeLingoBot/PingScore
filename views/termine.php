<!--==========-->

<?php include("../includes/partials/header.php") ?>

<!--==========-->

<h3 class="text-center">Live scoring : *nom de la compétition*</h3>

<div class="container shadow p-3 mb-5 bg-light rounded">

<h3 class="card text-white bg-info mb-3 text-center">Tableau des matchs terminés</h3>

    <?php
        require_once ('../controllers/database.php');
        $req = "SELECT m.*,  j1.surname AS j1_surname, j1.name AS j1_name, j1.cat AS j1_cat, j2.surname AS j2_surname, j2.name AS j2_name, j2.cat AS j2_cat FROM matchs m INNER JOIN players j1 ON (j1.id = m.blue_player) INNER JOIN players j2 ON (j2.id = m.red_player) WHERE m.state = 2";
        $ps = $pdo -> prepare($req);
        $ps -> execute();

        while( $et = $ps -> fetch() ) { 

            $json = json_decode($et['score']);

    ?>

            <table class="table table-dark table-borderless" id="termine">

                <thead>
                    <!--Table <?php #echo($et['courts'])?> - --><?php echo($et['hour'])?>
                    <?php if ($et['j1_cat'] == $et['j2_cat']) { 
                        $cat = $et['j1_cat'] ; 
                        echo(" - Cat. ".$cat) ; 
                    } ?>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">
                            <?php echo($et['j1_name'].' '.$et['j1_surname'])?>
                            <?php if ($et['j1_cat'] != $et['j2_cat']) { $cat = $et['j1_cat']; echo( "  Cat. ".$cat); } ?>
                        </th>
                        <td width=10%><?php echo($json->round1->blue)?></td>
                        <td width=10%><?php echo($json->round2->blue)?></td>
                        <td width=10%><?php echo($json->round3->blue)?></td>
                        <td width=10%><?php echo($json->round4->blue)?></td>
                        <td width=10%><?php echo($json->round5->blue)?></td>
                    </tr>
                    <tr>
                        <th scope="row">
                        <?php echo($et['j2_name'].' '.$et['j2_surname'])?>
                        <?php if ($et['j1_cat'] != $et['j2_cat']) { $cat = $et['j2_cat']; echo( "  Cat. ".$cat); } ?>
                        </th>
                        <td width=10%><?php echo($json->round1->red)?></td>
                        <td width=10%><?php echo($json->round2->red)?></td>
                        <td width=10%><?php echo($json->round3->red)?></td>
                        <td width=10%><?php echo($json->round4->red)?></td>
                        <td width=10%><?php echo($json->round5->red)?></td>
                    </tr>
                </tbody>
            </table>

    <?php } ?>

    <br />

</div>