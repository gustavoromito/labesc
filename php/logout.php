<?php
/**
 * Created by PhpStorm.
 * User: gustavoromito
 * Date: 12/15/15
 * Time: 22:20
 */

$host = explode('.', $_SERVER['HTTP_HOST']);

while ($host) {
    $domain = '.' . implode('.', $host);

    foreach ($_COOKIE as $name => $value) {
        setcookie($name, '', 1, '/', $domain);
    }

    array_shift($host);
}

if (isset($_SERVER['HTTP_COOKIE']))
{
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time()-1000);
        setcookie($name, '', time()-1000, '/');
    }
    header('Location: ../pages');
}
?>