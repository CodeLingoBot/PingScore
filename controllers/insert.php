<?php //TODO : REECRIRE CE FICIHIER + voir pour les toasts + voir dataTable => ø ...


$connect = mysqli_connect("localhost", "root", "root", "PI_aspcn");
if(!empty($_POST))
{
    $output = '';
    $message = '';
    $surname = mysqli_real_escape_string($connect, $_POST["surname"]);
    $name = mysqli_real_escape_string($connect, $_POST["name"]);
    $cat = mysqli_real_escape_string($connect, $_POST["cat"]);
    $club = mysqli_real_escape_string($connect, $_POST["club"]);
    $rank = mysqli_real_escape_string($connect, $_POST["rank"]);
    if($_POST["id"] != '')
    {
        $query = "
UPDATE players
SET surname='$surname',
name='$name',
cat='$cat',
club = '$club',
rank = '$rank'
WHERE id='".$_POST["id"]."'";
        $message = 'Data Updated';
    }
    else
    {
        $query = "
INSERT INTO players(surname, name, cat, club, rank)
VALUES('$surname', '$name', '$cat', '$club', '$rank');
";
        $message = 'Data Inserted';
    }
    if(mysqli_query($connect, $query))
    {
        $output .= '<label class="text-success">' . $message . '</label>';
        $select_query = "SELECT * FROM players ORDER BY id ASC";
        $result = mysqli_query($connect, $select_query);
        $output .= '
<table id="table_joueurs" class="table table-hover table-responsive-lg">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>NOM</th>
                    <th>PRÉNOM</th>
                    <th>CATÉGORIE</th>
                    <th>CLUB</th>
                    <th>CLASSEMENT</th>
                    <th>PHOTO</th>
                    <th>ACTION</th>

                </tr>
                </thead>
                <tbody>
    ';
        while($row = mysqli_fetch_array($result))
        {
            $output .= '
        <tr>
            <td>' . $row["id"] . '</td>
            <td>' . $row["surname"] . '</td>
            <td>' . $row["name"] . '</td>
            <td>' . $row["cat"] . '</td>
            <td>' . $row["club"] . '</td>
            <td>' . $row["rank"] . '</td>
            <td>' . $row['picture'] . '</td>
            <td><input type="button" name="edit" value="Edit" id="'.$row["id"] .'" class="btn btn-info btn-xs edit_data" /></td>
        </tr>
    ';
        }
        $output .= '</table>';
    }
    echo $output;
}