<?php
/**
 * Created by PhpStorm.
 * User: gustavoromito
 * Date: 11/8/15
 * Time: 21:39
 */
require('databaseManager.php');

$title= $_POST["title"];
$doi = $_POST["doi"];
$date = $_POST["date"];
$user_id= $_POST["user_id"];

$mysqli = new mysqli($servername, $username, $password, $dbname);

if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//---------------------------------------------------------
// Insert user at Users table

/* Prepare an insert statement */
$query = "INSERT INTO Publicacao (id, title, DOI, data, user_id) values (NULL, ?, ?, ?, ?)";
$stmt = $mysqli->prepare($query);
if (!$stmt->bind_param("ssss", $title, $doi, $date, $user_id)) {
    echo returnJSON("100", "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error, array());
    exit;
}



/* Execute the statement */
if (!$stmt->execute()) {
    echo returnJSON("100", "Execute failed: (" . $stmt->errno . ") " . $stmt->error, array());
    exit;
}
echo returnJSON("200", "Publicação criada com sucesso!", array());
$mysqli->close();
?>