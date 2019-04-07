<!--==========-->

<?php include("../includes/partials/header.php") ?>

<!--==========-->

<h3 class="text-center">Tableau des matchs terminés</h3>

<div class="container bg-light">

    <?php
        require_once ('../controllers/database.php');
        $req = "SELECT m.court, j1.surname AS blue, j2.surname AS red, m.hour, m.score FROM matchs m INNER JOIN players j1 ON (j1.id = m.blue_player) INNER JOIN players j2 ON (j2.id = m.red_player) WHERE (CONVERT(`state` USING utf8) LIKE '%2%') ORDER BY m.`hour` DESC";
        $ps = $pdo -> prepare($req);
        $ps -> execute();

        while( $et = $ps -> fetch() ) { 

            $json = json_decode($et['score']);

    ?>

            <table class="table table-secondary">

                <thead>
                    Table <?php echo($et['court'])?> - <?php echo($et['hour'])?>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">
                            <?php echo($et['blue'])?>
                        </th>
                        <td width=10%><?php echo($json->round1->blue)?></td>
                        <td width=10%><?php echo($json->round2->blue)?></td>
                        <td width=10%><?php echo($json->round3->blue)?></td>
                        <td width=10%><?php echo($json->round4->blue)?></td>
                        <td width=10%><?php echo($json->round5->blue)?></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <?php echo($et['red'])?>
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