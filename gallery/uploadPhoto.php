<?php

require 'config.php';
require 'functions.php';
require 'database.php';



if(isset($_FILES['fupload'])) {

	$filename = $_FILES['fupload']['name'];
	$source = $_FILES['fupload']['tmp_name'];	
	$target = $path_to_image_directory . $filename;
	$title = addslashes($_POST['title']);
	$description = addslashes($_POST['description']);	
	$src = 'images/' . $filename;
	$tn_src = 'images/tn/' . $filename;	
	
	if(preg_match('/[.](jpg)|(gif)|(png)|(jpeg)$/', $filename)) {
	
		move_uploaded_file($source, $target);	
		
		$q = "INSERT into gs_photo(title, description, src, tn_src) VALUES('$title', '$description', '$src', '$tn_src')";
		
		$result = $mysqli->query($q) or die(mysqli_error($mysqli));
		
		if($result) {
			echo "success! Your file has been uploaded";
		}
		
		createThumbnail($filename);
		
	}  // end preg_match
}     

?>