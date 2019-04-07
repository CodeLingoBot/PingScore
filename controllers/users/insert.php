<?php
//TODO: Ajouter fonctionnalité Del Referee
//TODO: INSERT dans la db ne fonctionne pas
//TODO: voir pour decrypter le mot de passe des arbitre https://stackoverflow.com/questions/16600708/how-do-you-encrypt-and-decrypt-a-php-string

$connect = mysqli_connect("localhost", "root", "root", "PI_aspcn");
if(!empty($_POST)){
    $output = '';
    $message = '';
    $username = mysqli_real_escape_string($connect, $_POST["username"]);
    $password = mysqli_real_escape_string($connect, $_POST["password"]);
    if($_POST["id"] != ''){
        $query = "UPDATE users SET username='$username', password='$password' WHERE id='".$_POST["id"]."'";
        $message = $_POST['username'] . '\'s Informations Updated';
    } else {
        $query = "INSERT INTO users(username, password) VALUES('$username', '$password');";
        $message = $_POST['username'] . '\'s Informations Inserted';
    }
    if(mysqli_query($connect, $query)){
        $select_query = "SELECT * FROM users ORDER BY id ASC";
        $result = mysqli_query($connect, $select_query);
        $output .= '    
                <!-- Toastr CSS -->
                <link rel="stylesheet" type="text/css" href="../../vendor/toastr/build/toastr.min.css"/>
                <table id="dataTable" class="table table-hover table-responsive-lg">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>USERNAME</th>
                    <th>PASSWORD</th>
                </tr>
                </thead>
                <tbody>
    ';
        while($row = mysqli_fetch_array($result))
        {
            $output .= '
        <tr>
            <td>' . $row["id"] . '</td>
            <td>' . $row["username"] . '</td>
            <td>' . $row["password"] . '</td>
            <td><input type="button" name="edit" value="Edit" id="'.$row["id"] .'" class="btn btn-info btn-xs edit_data" /></td>
        </tr>
    ';
        }
        $output .= '</table>    
        <!-- Scripts for this page -->
        <script src="../../assets/js/dataTable.js"></script>
    ';
    }
    echo $output;
}