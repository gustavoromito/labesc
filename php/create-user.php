<?php
/**
 * Created by PhpStorm.
 * User: gustavoromito
 * Date: 11/8/15
 * Time: 21:39
 */
require('databaseManager.php');
require('hashing.php');

$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$name = $first_name . " " . $last_name;
$active = true;
$birthDate = $_POST["birthDate"];
$role_id = $_POST["role_id"];
$email = $_POST["email"];
$user_password = $_POST["password"];
$lattes = $_POST["lattes"];
$profile_pic = $_POST["profile_pic"];

$hashPassword = create_hash(stripslashes($user_password));

$mysqli = new mysqli($servername, $username, $password, $dbname);

if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT email FROM Usuario WHERE email = '".$email."'";
if ($result = $mysqli->query($query)) {
    if(mysqli_num_rows($result)==0)
    {
        //---------------------------------------------------------
        // Insert user at Users table

        /* Prepare an insert statement */
        $query = "INSERT INTO Usuario (id, primeiro_nome, sobrenome, nome, ativo, dataNascimento, membroDesde, role_id, email, password, lattes, profile_pic) values (NULL, ?, ?, ?, ?, ?, NULL, ?, ?, ?, ?, ?)";
        $stmt = $mysqli->prepare($query);
        if (!$stmt->bind_param("ssssssssss", $first_name, $last_name, $name, $active, $birthDate, $role_id, $email, $hashPassword, $lattes, $profile_pic)) {
            echo returnJSON("100", "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error, array());
            exit;
        }



        /* Execute the statement */
        if (!$stmt->execute()) {
            echo returnJSON("100", "Execute failed: (" . $stmt->errno . ") " . $stmt->error, array());
            exit;
        }


        echo returnJSON("200", "Usuário criado com sucesso!", array());
    }
    else // user already registered
    {
        echo returnJSON("100", "Email já cadastrado", array());
    }
    /* free result set */
    $result->close();
}
else {
    echo returnJSON("100", 'Could not run query: ' . $mysqli->error, array());
    exit;
}
$mysqli->close();
?>