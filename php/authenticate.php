<?php
/**
 * Created by PhpStorm.
 * User: gustavoromito
 * Date: 11/30/15
 * Time: 23:52
 */

$userIsLogged = false;
if(!isset($_COOKIE['labesctoken']) && isset($_COOKIE['labescid'])) {
    $userIsLogged = true;
    $token=$_COOKIE["labesctoken"];
    $token_email=$_COOKIE["labescid"];
}

?>