<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<meta name="author" content="" />
	<link rel="stylesheet" href="css/default.css" />
	<script type="text/javascript" src="js/jquery-1.2.6.pack.js"></script>
	<title>Delete A Photo</title>
	
	<script type="text/javascript">
	$(function() {
		$('img').click(function() {
		   	var id = $(this).attr('id');
		   	var thisparam = $(this);
			   	
			$.ajax({
				type: 'post',
				url: 'delete.php',
				data: 'id=' + id,
				
				success: function() {
		
					$(thisparam).parent('li').fadeOut('slow');
                    $('#result').remove();
					var response = '<div id="result"><h4>Success. The image has now been removed! </h4>';
					response += '<a href="index.php">Return to Home Page</a></div>';
					
					$('body').append(response);
				}
			});
		});
	})
	</script>
</head>

<body>
	<h1>Click on a Photo to Delete It.</h1>
	<ul>
		<?php
		require 'functions.php';
		getDeletePhotos();
		?>
	</ul>
</body>
</html>