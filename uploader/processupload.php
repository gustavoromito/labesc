<?php

if(isset($_FILES["FileInput"]) && $_FILES["FileInput"]["error"]== UPLOAD_ERR_OK)
{
	############ Edit settings ##############
	$UploadDirectory	= '../uploads/sequenciamentos/'; //specify upload directory ends with / (slash)
	##########################################
	
	/*
	Note : You will run into errors or blank page if "memory_limit" or "upload_max_filesize" is set to low in "php.ini". 
	Open "php.ini" file, and search for "memory_limit" or "upload_max_filesize" limit 
	and set them adequately, also check "post_max_size".
	*/
	
	//check if this is an ajax request
	if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])){
		die();
	}
	
	
	//Is file size is less than allowed size.
	if ($_FILES["FileInput"]["size"] > 10242880) {
		die("File size is too big!");
	}
	
	//allowed file type Server side check
	$mimes = array("image/png", 'image/gif','image/jpeg', 'image/pjpeg', "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet", "application/excel", "application/vnd.ms-excel", "application/x-excel", "application/x-msexcel", "application/pdf");
	if (!in_array(strtolower($_FILES['FileInput']['type']), $mimes)) {
		die("Formato não permitido!");
	}
	
	$File_Name          = strtolower($_FILES['FileInput']['name']);
	$File_Ext           = substr($File_Name, strrpos($File_Name, '.')); //get file extention
	$Random_Number      = rand(0, 9999999999); //Random number to be added to name.
	$NewFileName 		= "file_".$Random_Number.$File_Ext; //new file name
//	error_reporting(E_ALL);
//	echo exec('whoami');

	if(move_uploaded_file($_FILES['FileInput']['tmp_name'], $UploadDirectory.$NewFileName ))
	   {
		$actual_link = "http://$_SERVER[HTTP_HOST]" . substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], '/') + 1);
		die('Successo: <a target="_blank" href="'.$actual_link.$UploadDirectory.$NewFileName.'">'.$actual_link.$UploadDirectory.$NewFileName.'</a><div id="link" style="display:none" link="'.$actual_link.$UploadDirectory.$NewFileName.'"></div>');
	}else{
		die('error uploading File!');
	}
	
}
else
{
	die('Something wrong with upload! Is "upload_max_filesize" set correctly?');
}