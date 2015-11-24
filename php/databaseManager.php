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

//// Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);
//
//// Check connection
//if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//}
//echo "Connected successfully";
//$conn->close();


function getAllUsers() {
    global $servername;
    global $username;
    global $password;
    global $dbname;

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

function getAllPublications() {
    global $servername;
    global $username;
    global $password;
    global $dbname;

// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM Publicacao";
    $result = $conn->query($sql);

    $conn->close();
    return $result;
}

function getAllRoles() {
    global $servername;
    global $username;
    global $password;
    global $dbname;

// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM Role WHERE 1";
    $result = $conn->query($sql);

    $conn->close();
    return $result;
}

function getRoleName($role_id) {
    global $servername;
    global $username;
    global $password;
    global $dbname;
// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM Role WHERE id = " . $role_id;
    $result = $conn->query($sql);

    if (!$result) return;
    if ($row = $result->fetch_assoc()) {
        $conn->close();
        return $row['descricao'];
    }
    $conn->close();
    return "Não especificado.";
}

function getUserDetails($user_id)
{
    global $servername;
    global $username;
    global $password;
    global $dbname;

// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM Usuario WHERE id = " . $user_id;
    $result = $conn->query($sql);

    if ($row = $result->fetch_assoc()) {
        $conn->close();
        return $row;
    }
    $conn->close();
    return null;
}

function returnJSON($status, $message, $fields) {
    $arr = array("status" => $status, "message" => $message, "fields" => $fields);
    return json_encode($arr);
}

function hashPassword($password) {
    // A higher "cost" is more secure but consumes more processing power
    $cost = 10;

// Create a random salt
    $salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');

// Prefix information about the hash so PHP knows how to verify it later.
// "$2a$" Means we're using the Blowfish algorithm. The following two digits are the cost parameter.
    $salt = sprintf("$2a$%02d$", $cost) . $salt;

// Value:
// $2a$10$eImiTXuWVxfM37uY4JANjQ==

// Hash the password with the salt
    $hash = crypt($password, $salt);
    return $hash;
}

function validatePassword($user_input, $hashPassword) {
    if ( hash_equals($hashPassword, crypt($user_input, $hashPassword)) ) {
        return true;
    }
    return false;
}
?>