<?php

// This function grabs all of the photos from the database.

function getPhotos($album_id) {
	require 'database.php';
	$q = "SELECT id, tn_src FROM gs_photo WHERE album_id='$album_id' ORDER BY id desc";
	
	$result = $mysqli->query($q) or die($mysqli_error($mysqli));
	
	if($result) {
		while($row = $result->fetch_object()) {
			$tn_src = $row->tn_src;
			$src = $row->src;
			$id = $row->id;
		
//			print '<li>
//                     <a href="review_image.php?id=' . $id . '">
//                      <img src="' . $tn_src . '" alt="images" id="' . $id . '" />
//                    </a>
//                   </li>';

                        
print '<li style="height:100px;">                      
<img src="' . $path_to_thumbs_directory.$tn_src . '" alt="images" height="80"/><br>
<img src="delete.png" class="del" style="cursor:pointer;float:right" id="' . $id . '" title="ลบ" alt="ลบ"/>
</li>';
                        
			print "\n";
		}
	}
}

function getDeletePhotos() {
	require 'database.php';
	$q = "SELECT id, tn_src FROM gs_photo ORDER BY id desc";
	
	$result = $mysqli->query($q) or die($mysqli_error($mysqli));
	
	if($result) {
		while($row = $result->fetch_object()) {
			$tn_src = $row->tn_src;
			$src = $row->src;
			$id = $row->id;
		
			print '<li><img src="' . $tn_src . '" alt="images" id="' . $id . '" /></li>';
			print "\n";
		}
	}
	
}

// When the user clicks on an image to view the description, this function will grab that specific
// image's information from the database.

function getChosenPhoto($the_selected_id) {
    require 'database.php';
    $id = $the_selected_id;

    $q = "SELECT description, src FROM gs_photo Where id = $id LIMIT 1";

    $result = $mysqli->query($q) or die("there was a problem");

    if($result) {
        while ($row  = $result->fetch_object()) {
            echo '<img src="' . $row->src . '" alt="image" /><br />';
            echo '<p id="description">' . $row->description . '</p>';
        }
    } else die("There was some problem");
    
}

// This function will take the image that you uploaded, and create a thumbnail.

function createThumbnail($filename) {
	
	require 'config.php';
	
	$filename = "$filename";

	if(preg_match('/[.]jpg$/', $filename)) {
		$im = imagecreatefromjpeg($path_to_image_directory . $filename);
	} else if (preg_match('/[.]gif$/', $filename)) {
		$im = imagecreatefromgif($path_to_image_directory . $filename);
	} else if (preg_match('/[.]png$/', $filename)) {
		$im = imagecreatefrompng($path_to_image_directory . $filename);
	}
	
	$ox = imagesx($im);
	$oy = imagesy($im);
	
	$nx = $final_width_of_image;
	$ny = floor($oy * ($final_width_of_image / $ox));
	
	$nm = imagecreatetruecolor($nx, $ny);
	
	imagecopyresized($nm, $im, 0,0,0,0,$nx,$ny,$ox,$oy);
	
	if(!file_exists($path_to_thumbs_directory)) {
		if(!mkdir($path_to_thumbs_directory)) {
			die("There was a problem.");
		}
	}

	imagejpeg($nm, $path_to_thumbs_directory . $filename);
	
	//header("location: index.php");
}
	
?>