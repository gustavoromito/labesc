<?php
/**
 * Created by PhpStorm.
 * User: gustavoromito
 * Date: 12/16/15
 * Time: 00:11
 */

require('databaseManager.php');
$user_id = $_POST["user_id"];

$user = getUserDetails($user_id);

$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$name = $first_name . " " . $last_name;
$active = true;
$birthDate = $_POST["birthDate"];
$role_id = $_POST["role_id"];
$email = $_POST["email"];
$lattes = $_POST["lattes"];
$profile_pic = $_POST["profile_pic"];
$professor_id = $_POST["professor_id"];
$area_atuacao = $_POST["area_atuacao"];

if (empty($profile_pic)) {
    $profile_pic = $user['profile_pic'];
}

$mysqli = new mysqli($servername, $username, $password, $dbname);

if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
/* Prepare an insert statement */
$query = "UPDATE Usuario SET professor_id =?, primeiro_nome =?, sobrenome =?, nome =?, dataNascimento =?, role_id =?, email =?, lattes =?, profile_pic =?, area_atuacao =? WHERE id = " . $user_id;
$stmt = $mysqli->prepare($query);
if (!$stmt->bind_param("ssssssssss",$professor_id, $first_name, $last_name, $name, $birthDate, $role_id, $email, $lattes, $profile_pic, $area_atuacao)) {
    echo returnJSON("100", "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error, array());
    exit;
}



/* Execute the statement */
if (!$stmt->execute()) {
    echo returnJSON("100", "Execute failed: (" . $stmt->errno . ") " . $stmt->error, array());
    exit;
}
echo returnJSON("200", "Usuário atualizado com sucesso!", array());

$mysqli->close();
?>