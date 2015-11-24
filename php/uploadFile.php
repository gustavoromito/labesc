<?php
/**
 * Created by PhpStorm.
 * User: gustavoromito
 * Date: 11/10/15
 * Time: 11:47
 */
$target_dir = "files/sequenciamentos";

function checkDirectory($file_name) {
    global $target_dir;
    if (!file_exists($target_dir))
    {
        mkdir($target_dir, 0777, true);
    }
    if (file_exists($target_dir . "/" . $file_name))
    {
        echo $file_name . " already exists. ";
        exit;
    }

}

function uploadNewFile($FILES, $name) {
    global $target_dir;
    if ($FILES[$name]["error"] > 0)
    {
        return "Error: " . $FILES[$name]["error"];
    } else {
        $Random_Number      = rand(0, 99999);
        $file_name = basename($FILES[$name]["name"]) . "_" . $Random_Number;
        $target_file = $target_dir . "/" . $file_name;
        checkDirectory($file_name);
        if (move_uploaded_file($FILES[$name]["tmp_name"], $target_file)) {
            return "Successo. " . $target_dir . $FILES[$name]["name"];
        } else {
            return "Não foi possível submeter seu arquivo.";
        }
    }
}


