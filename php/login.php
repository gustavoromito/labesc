<?php
/**
 * Created by PhpStorm.
 * User: gustavoromito
 * Date: 11/25/15
 * Time: 09:37
 */
require("databaseManager.php");
require("hashing.php");

$Email=$_POST["email"];
$pass = $_POST["password"];

$mysqli = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT * FROM Usuario WHERE email = '".$Email."'";
$result = $mysqli->query($sql);

if (!$result) {
    echo returnJSON("100", 'Could not run query: ' . $mysqli->error, array());
    exit;
}

$num_rows = mysqli_num_rows($result);
if($num_rows>0)
{

    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $hash = $row['password'];
    $entered = stripslashes($pass);

    if(validate_password($entered, $hash))
    {
        // valid
        // CREATE TOKEN TO THIS USER
        $token = md5(uniqid(mt_rand(), true));
        $tid = $row['id'];

        $query = "INSERT INTO Tokens (`token`,`owner_id`) VALUES ('$token', '$tid')";
        $result = $mysqli->query($query);

        if (!$result) {
            echo returnJSON("100", 'Could not run query: ' . $mysqli->error, array());
            exit;
        }
        //--
        echo returnJSON("200", "Login sucesso.", array('token' => $token, 'user_id' => $row['id']));
        //--

    }
    else
    {
        // invalid
        echo returnJSON("171", "Senha ou e-mail incorretos!", array());
    }
}
else
    echo returnJSON("171", "Falha no login! Este e-mail não está registrado como uma conta válida.", array());
?>