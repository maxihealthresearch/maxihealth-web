<?php
// this function will take uploaded file and move it to the specified directory
// but first will check for already existing file and if necessary will rename the new one, returning the full
// path to the uploaded file
// if there is nothing to do, will return $default_return_value
function upload_file ($field_name, $directory, $fname = null, $overwrite = false, $default_return_value = '', $server_selected = '') {
	if (is_string($field_name))
		$file_object = $_FILES[$field_name];
	else
		$file_object = $field_name;
	
	if (!is_uploaded_file($file_object['tmp_name'])) {
		if ($server_selected && file_exists($directory.$server_selected)) {
			return $server_selected;
		}
		
		if ($default_return_value !== null)
			return $default_return_value;
		else {
			echo "No file selected to upload";
			exit;
		}
	}
	preg_match("/(.*)\.([^.]+)/", $file_object['name'], $chunks);
	if (is_array($chunks) && count($chunks) == 3) {
		$filename = $chunks[1];
		$fileext = $chunks[2];
	} else {
		$filename = $file_object['name'];
		$fileext = '';
	}

	// make sure $directory ends in /
	if ($directory{strlen($directory) - 1} != DIRECTORY_SEPARATOR)
		$directory .= DIRECTORY_SEPARATOR;
	if (!is_dir($directory)) {
		// ?
		echo "Directory to upload file to was not found! File was not uploaded!";
		exit;
		return $default_return_value;
	}
	if (!is_writable($directory)) {
		echo "The specified directory ($directory) is not writeable";
		exit;
	}
	if (!is_readable($file_object['tmp_name'])) {
		echo "Unable to read from source file!";
		exit;
	}

	if ($fname)
		$new_name = $fname;
	else
		$new_name = $filename.".".$fileext;

	if ($overwrite)
		@unlink($directory.$new_name);
	else
		if (file_exists($directory.$new_name))
		{
			$i = 1;
			do {
				$new_name = $filename."(".$i.").".$fileext;
				$i++;
			} while (file_exists($directory.$new_name) && $i < 100);
		}

	if (!file_exists($directory.$new_name))
	{
		if (!move_uploaded_file($file_object['tmp_name'], $directory.$new_name)) {
			echo "Unable to move the file to the specified directory!";
			exit;
		}
		return $new_name;
	} else {
		echo "100 files with same name found! File was not uploaded!";
		exit;
		return $default_return_value;
	}
}

function create_thumbnail ($file, $out_file = '', $max_height = 58, $max_width=-1, $out_format='jpeg', $cropped=false, $preserveAR = true, $allowEnlargment = true) {
	if (!file_exists($file)) {
		return FALSE;
	}
	if ($out_file == '') {
		$path = dirname($file).DIRECTORY_SEPARATOR;
		$fname = basename($file);
		//echo $fname." ";
		$fname = preg_replace("/\.[\.]+/", '.jpeg', $fname);
		//echo $fname;
		//exit;
		$out_file = $path."t_".$fname;
	}
	/*if (file_exists($out_file))	{
		die ('Thumb output file exists');
		return FALSE;
	}*/

	if (!function_exists(imagecreatetruecolor)) {
		die ('There seems to be a problem with GD');
		return FALSE;
	}

	list($original_width, $original_height, $image_type) = getimagesize($file);
	//die ($original_width." ".$image_type);

	$aspect_ratio = $original_width / $original_height;

	if ($cropped) {
		$new_aspect_ratio = $max_width / $max_height;
		$src_left = 0;
		$src_top = 0;
		$src_width = $original_width;
		$src_height = $original_height;
		$new_width = $max_width;
		$new_height = $max_height;
		if ($aspect_ratio < ($max_width / $max_height)) {
			$src_height = $src_width / $new_aspect_ratio;
			$src_top = ($original_height - $src_height) / 2;
		} else  {
			$src_width = $src_height * $new_aspect_ratio;
			$src_left = ($original_width - $max_width) / 2;
		}
		//die ($src_width. " ". $src_height." ".$src_left." ".$src_top);
	} else {
		if ($max_height < 0 && $max_width < 0) { // what thumnbail if no size has been specified?!
			copy($file, $out_file);
			return basename ($out_file);
		}
		if ($preserveAR) {
			if ($max_height > 0 && $max_width > 0) {
				if ($aspect_ratio > ($max_width / $max_height))
					$max_height = - 1;
				else
					$max_width = -1;
			}
			if ($max_height < 0) { // constrain only to max_width
				if ($allowEnlargment)
					$new_width = $max_width;
				else
					$new_width = min ($original_width, $max_width);
				$new_height = $new_width / $aspect_ratio;
			} elseif ($max_width < 0) { // constrain only to max_height
				if ($allowEnlargment)
					$new_height = $max_height;
				else
					$new_height = min($original_height, $max_height);
				$new_width = $new_height * $aspect_ratio;
			}
		} else {
			$new_width = $max_width;
			$new_height = $max_height;
		}
	}

	// ok, now let's see what is the image
	/*$ext = explode ('.', $file);
	$ext = strtolower($ext[count($ext) - 1]);
	if ($ext == 'jpeg' || $ext == 'jpg')
		$original_img = imagecreatefromjpeg($file);
	elseif ($ext == 'gif')
		$original_img = imagecreatefromgif($file);
	elseif ($ext == 'png')
		$original_img = imagecreatefrompng($file);
	else {
		die ("Unknown extension");
		return FALSE;
	}*/

	switch ($image_type) {
		case 1: $original_img = imagecreatefromgif($file); break;
		case 2: $original_img = imagecreatefromjpeg($file); break;
		case 3: $original_img = imagecreatefrompng($file); break;
		default: return false;
	}
	//die ($ext);

	$resized_img = imagecreatetruecolor($new_width,$new_height);

	if ($image_type != 2 ) { // png or gif
		$transparent_index = imagecolortransparent($original_img);
		if ($image_type == 3) { // png
			 // Turn off transparency blending (temporarily)
			imagealphablending($resized_img, false);
			// Create a new transparent color for image
			$color = imagecolorallocatealpha($resized_img, 255, 255, 255, 127);
			// Completely fill the background of the new image with allocated color.
			imagefill($resized_img, 0, 0, $color);
			// Restore transparency blending
			imagesavealpha($resized_img, true);
		} elseif ($transparent_index > 0) { //
			// Get the original image's transparent color's RGB values
			$trnprt_color = imagecolorsforindex($original_img, $transparent_index);
			// Allocate the same color in the new image resource
			//$transparent_index = imagecolorallocate($resized_img, $trnprt_color['red'], $trnprt_color['green'], $trnprt_color['blue']);
			$transparent_index = imagecolorallocatealpha($resized_img, $trnprt_color['red'], $trnprt_color['green'], $trnprt_color['blue'], $trnprt_color['alpha']);
			// Completely fill the background of the new image with allocated color.
			imagefill($resized_img, 0, 0, $transparent_index);
			// Set the background color for new image to transparent
			imagecolortransparent($resized_img, $transparent_index);
		}
	}

	if (!$cropped) {
		if (!imagecopyresampled($resized_img, $original_img, 0, 0, 0, 0, $new_width, $new_height, $original_width, $original_height)) die ('no copy...');
	} else {
		if (!imagecopyresampled($resized_img, $original_img, 0, 0, $src_left, $src_top, $max_width, $max_height, $src_width, $src_height)) die ("no copy...");
	}
	
	switch ($out_format) {
		case 'jpeg' : imagejpeg($resized_img, $out_file); break;
		case 'gif'  : imagegif($resized_img, $out_file); break;
		case 'png' : imagepng ($resized_img, $out_file); break;
		default : die ('unknown output format'); return false;
	}
	imagedestroy($original_img);
	imagedestroy($resized_img);

	return basename($out_file);
}

?>