<!--==========-->

    <?php 
        include_once '../../includes/partials/header_panel.html'; 
        require_once('../../controllers/database.php') ;
    ?>

<!--==========-->

<div class="container shadow p-3 mb-5 bg-light rounded">

    <!--Association match-->
    <h3 class="card text-white bg-info mb-3 text-center">Nouveau match</h3>
    
    <div class="card mb-3"> 

    <?php #Récupération matchs à venir

        $match = $pdo->prepare("SELECT id, blue_player, red_player, hour FROM matchs WHERE state=0") ;
        $match->execute() ;

        $table = $pdo->prepare("SELECT id FROM court") ;
        $table->execute() ;

    ?> 

        <form>
            <div class="form-row">

                <!--Affichage tables libres-->
                <div class="col">
                    <select class="form-control form-control-lg" id="table">

                        <?php while( $data = $table -> fetch() ) { ?>
                            <option><?php echo('Table '.$data['id'])?></option>
                        <?php } ?>

                    </select>
                </div>
                <!--Fin affichage tables libres-->

                <!--Affichage match à venir-->
                <div class="col">
                    <select class="form-control form-control-lg" id="match">

                        <?php while( $data = $match -> fetch() ) { ?>
                            <option><?php echo($data['hour'].' - '.$data['blue_player'].' - '.$data['red_player'])?></option>
                        <?php } ?>

                    </select>
                </div>
                <!--Fin affichage match à venir-->

                <div class="col">
                    <button type="submit" class="btn btn-lg btn-primary">Valider</button>
                </div>

            </div>
        </form>

    </div>
    <!--Fin association match-->

    <!--Affichage match en cours sur table-->
    <h3 class="card text-white bg-info mb-3 text-center">Accéder aux matchs en cours</h3>

    <div class='row'>

        <?php

            $nb_lignes = $pdo->prepare("SELECT COUNT(*) FROM court") ;
            $nb_lignes->execute() ;
            $nb_lignes = $nb_lignes->fetch() ;

            #var_dump($nb_lignes) ;

            $nb_lignes = intval( $nb_lignes['COUNT(*)'] ) + 1 ;    

        ?>

        <!-- Partie à refresh -->
        <?php
            for ($i=1; $i < $nb_lignes ; $i++) {
                
                #$tab = array(3, 5, 8, 11, 14, 17);
                $tab = array(3, 5, 7, 9, 11, 13, 15, 17);
            
                if (in_array($i, $tab) ){
                    echo("
                    </div>

                    <div class='row'>");
                };

                $nb = $i;
                require("../../includes/courts_referee.php");

            } ; 
        
        ?>
        <!-- Fin de partie à refresh -->

    </div>
    <!--Fin affichage match en cours sur table-->

</div>