<?php

    $id = 2;

    require_once('../controllers/database.php') ;

    $ps = $pdo->prepare("SELECT * FROM matchs WHERE id=$id") ;
    $ps->execute() ;

    $et = $ps -> fetch() ;

?>

<!--==========-->

<?php include("../includes/partials/header.php") ?>

<!--==========-->

<div class="container">

    <h3 class="text-center">
        Table 1 - <?php echo($et['hour']) ?>
    </h3>

    <?php

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

        <td>

            <div class="card bg-primary mb-3" style="width: 18rem;">

                <img src="../assets/img/players/<?php echo($etBlue['picture'])?>" class="card-img-top" width="320" height=320 alt="">

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

        <td>

            <img src="../assets/img/table.jpg" class="img-fluid" alt="Responsive image">

            <br />
            <br />

            <table class="table table-warning table-bordered">
                <tbody>
                    <tr>
                        <th scope="row">
                            <?php echo($etBlue['surname'])?>
                        </th>
                        <td>11</td>
                        <td>5</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <?php echo($etRed['surname'])?>
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
                if ( $et['state'] == 0) {
                    echo("<h3 class='text-success text-center'>En cours</h3>");
                }
                elseif ( $et['state'] == 1) {
                    echo("<h3 class='text-danger text-center'>Terminé</h3>");
                }
            ?>

        </td>

        <td>

            <div class="card bg-danger mb-3" style="width: 18rem;">

                <img src="../assets/img/players/<?php echo($etRed['picture'])?>" class="card-img-top" width="320" height=320 alt="">

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

    </table>

</div>

