<?php
//TODO: Ajouter fonctionnalité Del User
//TODO: dans la modal users voir pour auto select le role lors d'une edition

require_once '../host_db.php';

$connect = mysqli_connect($host, $user, $pass, $db);
if(!empty($_POST)){
    $output = '';
    $message = '';
    $username = mysqli_real_escape_string($connect, $_POST["username"]);
    $password = mysqli_real_escape_string($connect, $_POST["password"]);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $role = mysqli_real_escape_string($connect, $_POST["role"]);

    if($_POST["id"] != ''){
        $query = "UPDATE users SET username='$username', password='$password', role='$role' WHERE id='".$_POST["id"]."'";
    } else {
        $query = "INSERT INTO users(username, password, role) VALUES('$username', '$password', '$role');";
    }
    if(mysqli_query($connect, $query)){
        $select_query = "SELECT * FROM users";
        $result = mysqli_query($connect, $select_query);
        $output .= '    
                <!-- Toastr CSS -->
                <link rel="stylesheet" type="text/css" href="../../vendor/toastr/build/toastr.min.css"/>
                <table id="" class="table table-hover table-responsive-lg dataTable">
                <thead>
                <tr>
                    <th>USERNAME</th>
                    <th>RÔLE</th>
                    <th>ACTION</th>
                </tr>
                </thead>
                <tbody>
    ';
        while($row = mysqli_fetch_array($result))
        {
            $output .= '
        <tr>
            <td>' . $row["username"] . '</td>
            <td>' . $row["role"] . '</td>
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