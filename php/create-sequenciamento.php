<?php
/**
 * Created by PhpStorm.
 * User: gustavoromito
 * Date: 11/10/15
 * Time: 12:23
 */
include('uploadFile.php');
include("databaseManager.php");

$upload_return = uploadNewFile($_FILES, "uploadEletro");
echo $upload_return;
?>