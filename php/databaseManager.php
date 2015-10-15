<?php
/**
 * Created by PhpStorm.
 * User: gustavoromito
 * Date: 10/14/15
 * Time: 09:59
 */
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "labesc";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
$conn->close();


function getAllUsers() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "labesc";

// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM Usuario";
    $result = $conn->query($sql);

    $conn->close();
    return $result;
}
?>