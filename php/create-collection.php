<?php
/**
 * Created by PhpStorm.
 * User: gustavoromito
 * Date: 16/8/15
 * Time: 21:39
 */
require('databaseManager.php');

$title= $_POST["title"];
$cod = $_POST["codigo"];
$date= $_POST["date"];

$mysqli = new mysqli($servername, $username, $password, $dbname);

if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//---------------------------------------------------------
// Insert user at Users table

/* Prepare an insert statement */
$query = "INSERT INTO Animal (id, nome, data_coletado, numero_smrp) values (NULL, ?, ?, ?)";
$stmt = $mysqli->prepare($query);
if (!$stmt->bind_param("sss", $title, $date, $cod)) {
    echo returnJSON("100", "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error, array());
    exit;
}



/* Execute the statement */
if (!$stmt->execute()) {
    echo returnJSON("100", "Execute failed: (" . $stmt->errno . ") " . $stmt->error, array());
    exit;
}
echo returnJSON("200", "Coleta criada com sucesso!", array());
$mysqli->close();
?>