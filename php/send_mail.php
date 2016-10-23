<?php
/**
 * Created by PhpStorm.
 * User: gustavoromito
 * Date: 6/28/16
 * Time: 7:13 PM
 */
require('databaseManager.php');


$to_email = "guromito@gmail.com";
$subject = "Email de Contato Site Labesc";

$name = $_POST['name'];
$from_email = $_POST['email'];
$comments = $_POST['comments'];

$str = "Nome : " . $name ."
        <br> E-mail: ". $from_email . "
        <br><br>Comentários: <br>" . $comments;

$to = $to_email;
$body = $str;
$headers = "From: Labesc <do_not_reply@labesc.com.br>\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
$headers .= "X-Mailer: php\r\n";

if (mail($to, $subject, $body, $headers)) {
    echo returnJSON('200', 'Obrigado pelo seu comentário. Iremos respondê-lo assim que possível', array());
} else {
    echo returnJSON('100', 'Erro: não foi possível enviar seu email.', array());
}