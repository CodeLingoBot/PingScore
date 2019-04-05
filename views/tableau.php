<!--==========-->

<?php include("../include/partials/header.php") ?>

<!--==========-->

<div class="container">

    <div class="row">

        <div class="col-sm">

            <?php

                require_once('../controllers/database.php') ;

                $ps = $pdo->prepare("SELECT m.TABLES, j.SURNAME, m.HOUR, m.SCORE FROM matchs m INNER JOIN players j ON (j.id = m.BLUE_PLAYER OR j.id = m.RED_PLAYER) AND m.TABLES=1") ;
                $ps->execute() ;
                $et = $ps -> fetchAll() ;

                ######################

                $json = json_decode($et[0]['SCORE'])

            ?>

            <table class="table table-secondary">

                <thead>
                    Table 1 - <?php echo($et[0]['HOUR'])?>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">
                            <?php echo($et[0]['SURNAME'])?>
                        </th>
                        <td width=10%><?php echo($json->round1->blue)?></td>
                        <td width=10%><?php echo($json->round2->blue)?></td>
                        <td width=10%><?php echo($json->round3->blue)?></td>
                        <td width=10%><?php echo($json->round4->blue)?></td>
                        <td width=10%><?php echo($json->round5->blue)?></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <?php echo($et[1]['SURNAME'])?>
                        </th>
                        <td width=10%><?php echo($json->round1->red)?></td>
                        <td width=10%><?php echo($json->round2->red)?></td>
                        <td width=10%><?php echo($json->round3->red)?></td>
                        <td width=10%><?php echo($json->round4->red)?></td>
                        <td width=10%><?php echo($json->round5->red)?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="col-sm">

            <?php

                require_once('../controllers/database.php') ;

                $ps = $pdo->prepare("SELECT m.TABLES, j.SURNAME, m.HOUR, m.SCORE FROM matchs m INNER JOIN players j ON (j.id = m.BLUE_PLAYER OR j.id = m.RED_PLAYER) AND m.TABLES=2") ;
                $ps->execute() ;
                $et = $ps -> fetchAll() ;

                ######################

                $json = json_decode($et[0]['SCORE'])

            ?>

            <table class="table table-secondary">

                <thead>
                    Table 2 - <?php echo($et[0]['HOUR'])?>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">
                            <?php echo($et[0]['SURNAME'])?>
                        </th>
                        <td width=10%><?php echo($json->round1->blue)?></td>
                        <td width=10%><?php echo($json->round2->blue)?></td>
                        <td width=10%><?php echo($json->round3->blue)?></td>
                        <td width=10%><?php echo($json->round4->blue)?></td>
                        <td width=10%><?php echo($json->round5->blue)?></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <?php echo($et[1]['SURNAME'])?>
                        </th>
                        <td width=10%><?php echo($json->round1->red)?></td>
                        <td width=10%><?php echo($json->round2->red)?></td>
                        <td width=10%><?php echo($json->round3->red)?></td>
                        <td width=10%><?php echo($json->round4->red)?></td>
                        <td width=10%><?php echo($json->round5->red)?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="col-sm">

            <?php

                require_once('../controllers/database.php') ;

                $ps = $pdo->prepare("SELECT m.TABLES, j.SURNAME, m.HOUR, m.SCORE FROM matchs m INNER JOIN players j ON (j.id = m.BLUE_PLAYER OR j.id = m.RED_PLAYER) AND m.TABLES=3") ;
                $ps->execute() ;
                $et = $ps -> fetchAll() ;

                ######################

                $json = json_decode($et[0]['SCORE'])

            ?>

            <table class="table table-secondary">

                <thead>
                    Table 3 - <?php echo($et[0]['HOUR'])?>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">
                            <?php echo($et[0]['SURNAME'])?>
                        </th>
                        <td width=10%><?php echo($json->round1->blue)?></td>
                        <td width=10%><?php echo($json->round2->blue)?></td>
                        <td width=10%><?php echo($json->round3->blue)?></td>
                        <td width=10%><?php echo($json->round4->blue)?></td>
                        <td width=10%><?php echo($json->round5->blue)?></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <?php echo($et[1]['SURNAME'])?>
                        </th>
                        <td width=10%><?php echo($json->round1->red)?></td>
                        <td width=10%><?php echo($json->round2->red)?></td>
                        <td width=10%><?php echo($json->round3->red)?></td>
                        <td width=10%><?php echo($json->round4->red)?></td>
                        <td width=10%><?php echo($json->round5->red)?></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>


    <div class="row">

        <div class="col-sm">

            <?php

                require_once('../controllers/database.php') ;

                $ps = $pdo->prepare("SELECT m.TABLES, j.SURNAME, m.HOUR, m.SCORE FROM matchs m INNER JOIN players j ON (j.id = m.BLUE_PLAYER OR j.id = m.RED_PLAYER) AND m.TABLES=4") ;
                $ps->execute() ;
                $et = $ps -> fetchAll() ;

                ######################

                $json = json_decode($et[0]['SCORE'])

            ?>

            <table class="table table-secondary">

                <thead>
                    Table 4 - <?php echo($et[0]['HOUR'])?>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">
                            <?php echo($et[0]['SURNAME'])?>
                        </th>
                        <td width=10%><?php echo($json->round1->blue)?></td>
                        <td width=10%><?php echo($json->round2->blue)?></td>
                        <td width=10%><?php echo($json->round3->blue)?></td>
                        <td width=10%><?php echo($json->round4->blue)?></td>
                        <td width=10%><?php echo($json->round5->blue)?></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <?php echo($et[1]['SURNAME'])?>
                        </th>
                        <td width=10%><?php echo($json->round1->red)?></td>
                        <td width=10%><?php echo($json->round2->red)?></td>
                        <td width=10%><?php echo($json->round3->red)?></td>
                        <td width=10%><?php echo($json->round4->red)?></td>
                        <td width=10%><?php echo($json->round5->red)?></td>
                    </tr>
                </tbody>
            </table>
            </div>

        </div>

        <div class="col-sm">

            <?php

                require_once('../controllers/database.php') ;

                $ps = $pdo->prepare("SELECT m.TABLES, j.SURNAME, m.HOUR, m.SCORE FROM matchs m INNER JOIN players j ON (j.id = m.BLUE_PLAYER OR j.id = m.RED_PLAYER) AND m.TABLES=5") ;
                $ps->execute() ;
                $et = $ps -> fetchAll() ;

                ######################

                $json = json_decode($et[0]['SCORE'])

            ?>

            <table class="table table-secondary">

                <thead>
                    Table 5 - <?php echo($et[0]['HOUR'])?>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">
                            <?php echo($et[0]['SURNAME'])?>
                        </th>
                        <td width=10%><?php echo($json->round1->blue)?></td>
                        <td width=10%><?php echo($json->round2->blue)?></td>
                        <td width=10%><?php echo($json->round3->blue)?></td>
                        <td width=10%><?php echo($json->round4->blue)?></td>
                        <td width=10%><?php echo($json->round5->blue)?></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <?php echo($et[1]['SURNAME'])?>
                        </th>
                        <td width=10%><?php echo($json->round1->red)?></td>
                        <td width=10%><?php echo($json->round2->red)?></td>
                        <td width=10%><?php echo($json->round3->red)?></td>
                        <td width=10%><?php echo($json->round4->red)?></td>
                        <td width=10%><?php echo($json->round5->red)?></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
    
</div>