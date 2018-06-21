<?php

// Register Events
Event_AddEvent('','EventUpload','image');
Event_AddEvent('ajaxuploadtodb','EventAjaxUploadToDb','image');
Event_AddEvent('removeimage','EventRemoveImage','image');


// Execute Events
Event_RunEvents();

function UploadConfig(){
	############ Configuration ##############
	return array(
		'thumb_square_size'      => (!empty($_POST['thumb_square_size']) ? $_POST['thumb_square_size'] : 200), //Thumbnails will be cropped to 200x200 pixels
		'max_image_size'         => 1140, //Maximum image size (height and width)
		'thumb_prefix'           => "thumb_", //Normal thumb Prefix
		'destination'			 => '/uploads/'.(!empty($_POST['upload_dir']) ? $_POST['upload_dir'] : ''),
		'destination_folder'     => $_SERVER['DOCUMENT_ROOT'].'/uploads/'.(!empty($_POST['upload_dir']) ? $_POST['upload_dir'] : ''), //upload directory ends with / (slash)
		'jpeg_quality'           => 95, //jpeg quality
		'personal_width'         => (!empty($_POST['personal_width']) ? $_POST['personal_width'] : null),
		'personal_height'        => (!empty($_POST['personal_height']) ? $_POST['personal_height'] : null),
		'upload_type'        	 => (!empty($_POST['upload_type']) and $_POST['upload_type']=="html" ? $_POST['upload_type'] : "ajax"),
	);
	##########################################
}

//continue only if $_POST is set and it is a Ajax request
function EventUpload(){
	global $config;
	
	//Init config
	$aConfig = UploadConfig();
	$thumb_square_size = $aConfig['thumb_square_size'];
	$max_image_size = $aConfig['max_image_size'];
	$thumb_prefix = $aConfig['thumb_prefix'];
	$destination = $aConfig['destination'];
	$destination_folder = $aConfig['destination_folder'];
	$jpeg_quality = $aConfig['jpeg_quality'];
	$personal_width = $aConfig['personal_width'];
	$personal_height = $aConfig['personal_height'];
	$sUploadType = $aConfig['upload_type'];
	
		if(isset($_POST) && $sUploadType=="ajax" && (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest')){
			die('Hacking atempt!');
		}

		// check $_FILES['ImageFile'] not empty
		if(!isset($_FILES['image_file']) || !is_uploaded_file($_FILES['image_file']['tmp_name'])){
			die('Image file is Missing!'); // output error when above checks fail.
		}
		
		//get uploaded file info before we proceed
		$image_name = $_FILES['image_file']['name']; //file name
		$image_size = $_FILES['image_file']['size']; //file size
		$image_temp = $_FILES['image_file']['tmp_name']; //file temp

		$image_size_info    = getimagesize($image_temp); //gets image size info from valid image file
		
		if($image_size_info){
			$image_width        = $image_size_info[0]; //image width
			$image_height       = $image_size_info[1]; //image height
			$image_type         = $image_size_info['mime']; //image type
		}else{
			die("Make sure image file is valid!");
		}
		
		if($personal_width and $personal_height){
			$desired_width   = $personal_width;
			$desired_height  = $personal_height;
		} else {
			$desired_width   = $image_width;
			$desired_height  = $image_height;
		}

		
		//switch statement below checks allowed image type 
		//as well as creates new image from given file 
		switch($image_type){
			case 'image/png':
				$image_res =  imagecreatefrompng($image_temp); break;
			case 'image/gif':
				$image_res =  imagecreatefromgif($image_temp); break;           
			case 'image/jpeg': case 'image/pjpeg':  case 'image/jpg':
				$image_res = imagecreatefromjpeg($image_temp); break;
			default:
				$image_res = false;
		}

		if($image_res){
			//Get file extension and name to construct new file name 
			$image_info = pathinfo($image_name);
			$image_extension = strtolower($image_info["extension"]); //image extension
			$image_name_only = strtolower($image_info["filename"]);//file name only, no extension
			
			//create a random name for new image (Eg: fileName_293749.jpg) ;
			$new_file_name   = func_generator() . '.' . $image_extension;
			
			//folder path to save resized images and thumbnails
			$thumb_save_folder  = $destination_folder . $thumb_prefix . $new_file_name; 
			$image_save_folder  = $destination_folder . $new_file_name;
			$crop_save_folder   = $destination_folder . 'crop_'.$new_file_name;
			
			//call normal_resize_image() function to proportionally resize image
			if(normal_resize_image($image_res, $image_save_folder, $image_type, $max_image_size, $image_width, $image_height, $jpeg_quality))
			{
				//call crop_image_square() function to create square thumbnails if is defined
			
				if($thumb_square_size != "false"){
					if(!crop_image_square($image_res, $thumb_save_folder, $image_type, $thumb_square_size, $image_width, $image_height, $jpeg_quality))
					{
						die('Error Creating thumbnail');
					}
				}
				if(!crop_image_fit($image_res, $crop_save_folder, $image_type, $max_image_size, $image_width, $image_height, $desired_width, $desired_height, $jpeg_quality)){
					die('Error creating resize!');
				}
				/* We have succesfully resized and created thumbnail image
				We can now output image to user's browser or store information in the database*/
				/*echo '<div align="center">';
				echo '<img src="uploads/'.$thumb_prefix . $new_file_name.'" alt="Thumbnail">';
				echo '<br />';
				echo '<img src="uploads/'. $new_file_name.'" alt="Resized Image">';
				echo '</div>';*/
				$result = array('img_origin_src'=> $destination . $new_file_name);
				if($thumb_square_size != "false"){
					$result['img_thumb_src'] = $destination . $thumb_prefix . $new_file_name;
				}
				$result['img_crop_src'] = $destination . "crop_" . $new_file_name;
				
				if($sUploadType=="ajax"){
					echo json_encode($result);
				} else {
					return $result;
				}
			}
			
			imagedestroy($image_res); //freeup memory
		}
}

#####  This function will proportionally resize image ##### 
function normal_resize_image($source, $destination, $image_type, $max_size, $image_width, $image_height, $quality){
    
    if($image_width <= 0 || $image_height <= 0){return false;} //return false if nothing to resize
    
    //do not resize if image is smaller than max size
    if($image_width <= $max_size && $image_height <= $max_size){
        if(save_image($source, $destination, $image_type, $quality)){
            return true;
        }
    }
    
    //Construct a proportional size of new image
    $image_scale    = min($max_size/$image_width, $max_size/$image_height);
    $new_width      = ceil($image_scale * $image_width);
    $new_height     = ceil($image_scale * $image_height);
    
    $new_canvas     = imagecreatetruecolor( $new_width, $new_height ); //Create a new true color image
    
    //Copy and resize part of an image with resampling
    if(imagecopyresampled($new_canvas, $source, 0, 0, 0, 0, $new_width, $new_height, $image_width, $image_height)){
        save_image($new_canvas, $destination, $image_type, $quality); //save resized image
    }

    return true;
}

##### This function corps image to create exact square, no matter what its original size! ######
function crop_image_square($source, $destination, $image_type, $square_size, $image_width, $image_height, $quality){
    if($image_width <= 0 || $image_height <= 0){return false;} //return false if nothing to resize
    
    if( $image_width > $image_height )
    {
        $y_offset = 0;
        $x_offset = ($image_width - $image_height) / 2;
        $s_size     = $image_width - ($x_offset * 2);
    }else{
        $x_offset = 0;
        $y_offset = ($image_height - $image_width) / 2;
        $s_size = $image_height - ($y_offset * 2);
    }
    $new_canvas = imagecreatetruecolor( $square_size, $square_size); //Create a new true color image
    
    //Copy and resize part of an image with resampling
    if(imagecopyresampled($new_canvas, $source, 0, 0, $x_offset, $y_offset, $square_size, $square_size, $s_size, $s_size)){
        save_image($new_canvas, $destination, $image_type, $quality);
    }

    return true;
}

##### Saves image resource to file ##### 
function save_image($source, $destination, $image_type, $quality){

    switch(strtolower($image_type)){//determine mime type
        case 'image/png': 
            imagepng($source, $destination); return true; //save png file
            break;
        case 'image/gif': 
            imagegif($source, $destination); return true; //save gif file
            break;          
        case 'image/jpeg': case 'image/pjpeg':
            imagejpeg($source, $destination, $quality); return true; //save jpeg file
            break;
        default: return false;
    }
}

function crop_image_fit($source_gdim, $image_save_folder, $image_type, $max_image_size, $image_width, $image_height, $desired_width, $desired_height, $jpeg_quality){
	
	/*
	 * Crop-to-fit PHP-GD
	 * http://salman-w.blogspot.com/2009/04/crop-to-fit-image-using-aspphp.html
	 *
	 * Resize and center crop an arbitrary size image to fixed width and height
	 * e.g. convert a large portrait/landscape image to a small square thumbnail
	 */

	$source_path = $_FILES['image_file']['tmp_name'];

	/*
	 * Add file validation code here
	 */


	$source_aspect_ratio = $image_width / $image_height;
	$desired_aspect_ratio = $desired_width / $desired_height;

	if ($source_aspect_ratio > $desired_aspect_ratio) {
		/*
		 * Triggered when source image is wider
		 */
		$temp_height = $desired_height;
		$temp_width = ( int ) ($desired_height * $source_aspect_ratio);
	} else {
		/*
		 * Triggered otherwise (i.e. source image is similar or taller)
		 */
		$temp_width = $desired_width;
		$temp_height = ( int ) ($desired_width / $source_aspect_ratio);
	}

	/*
	 * Resize the image into a temporary GD image
	 */

	$temp_gdim = imagecreatetruecolor($temp_width, $temp_height);
	imagecopyresampled(
		$temp_gdim,
		$source_gdim,
		0, 0,
		0, 0,
		$temp_width, $temp_height,
		$image_width, $image_height
	);

	/*
	 * Copy cropped region from temporary image into the desired GD image
	 */
	$x0 = ($temp_width - $desired_width) / 2;
	$y0 = ($temp_height - $desired_height) / 2;
	$desired_gdim = imagecreatetruecolor($desired_width, $desired_height);
	imagecopy(
		$desired_gdim,
		$temp_gdim,
		0, 0,
		$x0, $y0,
		$desired_width, $desired_height
	);


	save_image($desired_gdim, $image_save_folder, $image_type, $jpeg_quality);
	
	return true;
}

function EventAjaxUploadToDb(){
	header_json();
	$a = json_encode(array('foo'=>'bar'));
	echo $a;
}

function EventRemoveImage(){
	header_json();
	$sImage = getRequestStr('image');
	$aParams = getRequest('params',array());
	if($sImage){
		
		if($aParams){
			$aImage = explode('/',$sImage);
			$sFilename = end($aImage);
			$dir = dirname($sImage);
			foreach($aParams as $sParam){
				unlink($_SERVER['DOCUMENT_ROOT'].$dir.'/'.$sParam.'_'.$sFilename);
			}
		}
	
		unlink($_SERVER['DOCUMENT_ROOT'].$sImage);
		echo json_encode(array('error'=>false));
	} else {
		echo json_encode(array('error'=>true));
	}
}

?>