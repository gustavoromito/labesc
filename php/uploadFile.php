<?php
/**
 * Created by PhpStorm.
 * User: gustavoromito
 * Date: 11/10/15
 * Time: 11:47
 */
include('databaseManager.php');
$target_dir = "uploads/sequenciamentos";

function checkDirectory($file_name) {
    global $target_dir;
    if (file_exists($target_dir . "/" . $file_name))
    {
        echo returnJSON("100", $file_name . " already exists. ", array());
        exit;
    }

}

function uploadNewFile($FILES, $name) {
    global $target_dir;
    if ($FILES[$name]["error"] > 0)
    {
        return returnJSON("100", "Error: " . $FILES[$name]["error"], array());
    } else {
        $Random_Number      = rand(0, 99999);
        $file_name = basename($FILES[$name]["name"]) . "_" . $Random_Number;
        $target_file = $target_dir . "/" . $file_name;
        checkDirectory($file_name);
        if (move_uploaded_file($FILES[$name]["tmp_name"], $target_file)) {
            return  "<p id='sequenciamento'>" . $target_dir . $FILES[$name]["name"] . "</p>";
        } else {
            return returnJSON("100", "Não foi possível submeter seu arquivo.", array());
        }
    }
}
?>
