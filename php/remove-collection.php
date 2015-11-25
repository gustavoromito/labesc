<?php
/**
 * Created by PhpStorm.
 * User: gustavoromito
 * Date: 11/8/15
 * Time: 21:39
 */
require('databaseManager.php');

$id= $_POST["id"];

$mysqli = new mysqli($servername, $username, $password, $dbname);

if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//---------------------------------------------------------
// Insert user at Users table

/* Prepare an insert statement */
$query = "DELETE FROM Animal WHERE id=".$id;

$check = $mysqli->query($query);

if(!$check){
	echo returnJSON('100', 'Could not run query: '. $mysqli->error, array());
	exit;
}
echo returnJSON('200', 'Success', array());