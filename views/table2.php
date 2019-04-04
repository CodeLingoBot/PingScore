<?php

    $id = 2;

    require_once('../controllers/database.php') ;

    $ps = $pdo->prepare("SELECT * FROM matchs WHERE ID=$id") ;
    $ps->execute() ;

    $et = $ps -> fetch() ;

?>

<!--==========-->

<?php include("../include/partials/header.php") ?>

<!--==========-->

<div class="container">

    <h3 class="text-center">
        Table 1 - <?php echo($et['HOUR']) ?>
    </h3>

    <?php

        $blue = $et['BLUE_PLAYER'];

        $psBlue = $pdo->prepare("SELECT * FROM players WHERE ID=$blue") ;
        $psBlue->execute() ;

        $etBlue = $psBlue -> fetch() ;

        ######################

        $red = $et['RED_PLAYER'];

        $psRed = $pdo->prepare("SELECT * FROM players WHERE ID=$red") ;
        $psRed->execute() ;

        $etRed = $psRed -> fetch();
    ?>

    <table class="table table-secondary">

        <td>

            <div class="card bg-primary mb-3" style="width: 18rem;">

                <img src="../assets/img/players/<?php echo($etBlue['PICTURE'])?>" class="card-img-top" width="320" height=320 alt="">

                <div class="card-body">
                    <h5 class="card-title">
                        <?php echo($etBlue['NAME']) ?>
                        <?php echo($etBlue['SURNAME']) ?>
                    </h5>
                </div>

                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        Cat. <?php echo($etBlue['CAT']) ?>
                    </li>
                    <li class="list-group-item">
                        <?php echo($etBlue['CLUB']) ?>
                    </li>
                </ul>
                    
            </div>

        </td>

        <td>

            <img src="../assets/img/table.jpg" class="img-fluid" alt="Responsive image">

            <br />
            <br />

            <table class="table table-warning table-bordered">
                <tbody>
                    <tr>
                        <th scope="row">
                            <?php echo($etBlue['SURNAME'])?>
                        </th>
                        <td>11</td>
                        <td>5</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <?php echo($etRed['SURNAME'])?>
                            <span class="badge badge-secondary">Service</span>
                        </th>
                        <td>8</td>
                        <td>3</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>

            <?php 
                if ( $et['STATE'] == 0) {
                    echo("<h3 class='text-success text-center'>En cours</h3>");
                }
                elseif ( $et['STATE'] == 1) {
                    echo("<h3 class='text-danger text-center'>Terminé</h3>");
                }
            ?>

        </td>

        <td>

            <div class="card bg-danger mb-3" style="width: 18rem;">

                <img src="../assets/img/players/<?php echo($etRed['PICTURE'])?>" class="card-img-top" width="320" height=320 alt="">

                <div class="card-body">
                    <h5 class="card-title">
                        <?php echo($etRed['NAME']) ?>
                        <?php echo($etRed['SURNAME']) ?>
                    </h5>
                </div>

                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        Cat. <?php echo($etRed['CAT']) ?>
                    </li>
                    <li class="list-group-item">
                        <?php echo($etRed['CLUB']) ?>
                    </li>
                </ul>
                        
            </div>

        </td>

    </table>

</div>

