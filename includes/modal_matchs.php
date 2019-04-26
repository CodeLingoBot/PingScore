<?php

    require_once('../../controllers/database.php') ;

    $player_blue = $pdo->prepare("SELECT * from players WHERE id != 0");
    $player_blue->execute();

    $player_red = $pdo->prepare("SELECT * from players WHERE id != 0");
    $player_red->execute();

    $court = $pdo->prepare("SELECT * from court");
    $court->execute();

?>

<div id="add_data_Modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="titre">Ajouter un match</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="insert_form">
                    <label>Entrer l'heure du match</label>
                    <input type="time" name="hour" id="hour" class="form-control" required />
                    <br />
                    <label>Selectionner le nom du joueur bleu</label>
                    <select name="blue_player" id="blue_player" class="form-control" required>
                        <option selected disabled>Choisir un joueur</option>
                        <?php while($data_blue = $player_blue->fetch()) { ?>
                            <option value="<?php echo($data_blue['id']) ?>" >
                                <?php echo($data_blue['surname']) ?>
                            </option>
                        <?php } ?>
                    </select>
                    <br />
                    <label>Selectionner le nom du joueur rouge</label>
                    <select name="red_player" id="red_player" class="form-control" required>
                        <option selected disabled>Choisir un joueur</option>
                        <?php while($data_red = $player_red->fetch()) { ?>
                            <option value="<?php echo($data_red['id']) ?>" >
                                <?php echo($data_red['surname']) ?>
                            </option>
                        <?php } ?>
                    </select>
                    <br />
                    <label>Selectionner l'état du match</label>
                    <select name="state" id="state" class="form-control" required>
                        <option disabled>Choisir un état</option>
                        <option selected value="0">À venir</option>
                        <option value="1">En cours</option>
                        <option value="2">Terminé</option>
                    </select>
                    <br />
                    <input type="hidden" name="id" id="id"/>
                    <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />
                    <input type="hidden" name="del" id="del" value="Del" class="btn btn-danger" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>