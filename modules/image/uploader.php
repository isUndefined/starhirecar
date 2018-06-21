<?php
/*
 * jQuery File Upload Plugin PHP Example 5.14
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */

error_reporting(E_ALL | E_STRICT);
require('../../engine/uploader/UploadHandler.php');
$upload_dir = !empty($_GET['upload_dir']) ? $_GET['upload_dir'] : "";
$max_number_of_files = !empty($_GET['max_number_of_files']) ? $_GET['max_number_of_files'] : 10;
$options = array(
    'upload_dir' => $_SERVER['DOCUMENT_ROOT'].'/uploads/'.$upload_dir,
    'upload_url' => 'http://'.$_SERVER['HTTP_HOST'].'/uploads/'.$upload_dir,
	'image_versions' => array(),
	'max_number_of_files' => 
);
$upload_handler = new UploadHandler($options);
