<?php

require 'config.php';
require 'functions.php';
require 'database.php';

$id = $_POST['album_id'];

if(isset($_FILES['fupload'])) {
    //print '<pre>';
    //print_r($_FILES['fupload']);
    //$filename = addslashes($_FILES['fupload']['name']);
    if (preg_match("/image\/(\w.*)/",$_FILES['fupload']['type'], $match))
    {
        //print_r($match);
    }
    if ($match[1]=='jpeg') $match[1] = 'jpg';

    $filename = 'photo_'.date('YmdHis').rand(0,99).".".$match[1];
    $source = $_FILES['fupload']['tmp_name'];    
    $target = $path_to_image_directory . $filename;
    $description = addslashes($_POST['description']);    
    //$src = $path_to_image_directory . $filename;
    //$tn_src = $path_to_thumbs_directory  . $filename;    
    $src = $filename;
    $tn_src = $filename;    
    
    
    // Validates the form input
    
    //if(strlen($_POST['description']) < 4) 
    //$error['description'] = '<p class="alert">Please enter a description for your photo. </p>';
    
    if($filename == '' || !preg_match('/[.](jpg)|(gif)|(png)|(jpeg)$/', $filename)) 
    $error['no_file'] = '<p class="alert">กรุณาเลือกรูปภาพเพื่ออัพโหลด! </p>';
    
    if(!$error) {
        move_uploaded_file($source, $target);    
        
        $q = "INSERT into gs_photo(description, src, tn_src ,album_id) VALUES('$description', '$src', '$tn_src', '$id')";
        $result = $mysqli->query($q) or die(mysqli_error($mysqli));
        
        if($result) {
            //echo "Success! Your file has been uploaded";
        }
        
        createThumbnail($filename);
        header("location: index.php?album_id=".$id);
        
    }  // end preg_match
}     

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" href="css/default.css" />
	<title>My Photos</title>
	<script type="text/javascript" src="js/jquery-1.2.6.pack.js"></script>
	<script type="text/javascript">
	$(function() {
		$('.del').click(function() {
		   	var id = $(this).attr('id');
		   	var thisparam = $(this);
			   	
			$.ajax({
				type: 'post',
				url: 'delete.php',
				data: 'id=' + id,
				
				success: function() {
		
					$(thisparam).parent('li').fadeOut('slow');
                                        $('#result').remove();
					var response = '<div id="result"><h4>ลบรูปภาพเรียบร้อยแล้ว! </h4>';
					
					$('body').append(response);
				}
			});
		});
	})
        
        function waitUpload()
        {
            document.getElementById('btn_upload').style.display = 'none';
            document.getElementById('show_waiting').style.display = '';
            
        }
	</script>

</head>

<body>
    <h5>ประมวลภาพ</h5>
    <ul><?php getPhotos($_GET['album_id']); ?></ul>

    <!--h3>อัพโหลดรูปภาพ</h3-->
    <div style="clear:both">
    <form enctype="multipart/form-data" method="post" action="index.php?album_id=<?=$_GET['album_id'];?>">
        <input type="hidden" name="album_id" value="<?=$_GET['album_id'];?>"/>
        <!--input type="hidden" name="MAX_FILE_SIZE" value="2000000" /-->
	    <p><input type="file" name="fupload" />
<!--	    
	    <p><label for="description">รายละเอียดรูป: </label>
	    <textarea rows="6" cols="50" id="description" name="description"></textarea></p>
-->	    
	    <input type="submit" value="อัพโหลด" name="submit" id="btn_upload" onclick="waitUpload();"/>
            <div id="show_waiting" style="display:none;">กำลังอัพโหลด..</div>
            </p>
    </form>

    <?php
    if ($error['no_file']) echo $error['no_file'];
    if ($error['description']) echo $error['description'];
    ?>
    </div>

</body>
</html>