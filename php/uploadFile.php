<?php
/**
 * Created by PhpStorm.
 * User: gustavoromito
 * Date: 11/10/15
 * Time: 11:47
 */
include('databaseManager.php');
$target_dir = "uploads/sequenciamentos/";
$name = "FileInput";

function checkDirectory($file_name) {
    global $target_dir;
    if (file_exists($target_dir . "/" . $file_name)) {
        echo returnJSON("100", $file_name . " already exists. ", array());
        exit;
    }

}

if ($_FILES[$name]["error"] > 0)
{
    die(returnJSON("100", "Error: " . $_FILES[$name]["error"], array()));
} else {
    $Random_Number      = rand(0, 99999);
    $file_name = basename($_FILES[$name]["name"]) . "_" . $Random_Number;
    $target_file = $target_dir . $file_name;
    checkDirectory($file_name);
    if (move_uploaded_file($_FILES[$name]["tmp_name"], $target_file)) {
//        echo  "<p id='sequenciamento'>" . $target_dir . $_FILES[$name]["name"] . "</p>";
        die(returnJSON("200", "Sucesso uploading arquivo", array()));
    } else {
        die (returnJSON("100", "Não foi possível submeter seu arquivo.", array()));
    }
}
?>
