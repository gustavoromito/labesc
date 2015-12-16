<?php
/**
 * Created by PhpStorm.
 * User: gustavoromito
 * Date: 11/30/15
 * Time: 23:52
 */

$userIsLogged = false;
$logged_user_id;
$token;
if(isset($_COOKIE['labesctoken']) && isset($_COOKIE['labescid'])) {
    $userIsLogged = true;
    $token=$_COOKIE["labesctoken"];
    $logged_user_id=$_COOKIE["labescid"];
}

?>