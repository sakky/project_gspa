<?php

if (!$_GET['id']) {
header("location: index.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />

	<title>Image Review</title>
	<script type="text/javascript" src="js/jquery-1.2.6.pack.js"></script>
	<script type="text/javascript" src="js/jquery.livequery.pack.js"></script>
	
	<script type="text/javascript">
	
	$(function() {
        
		$('#description').click(function() {
            var originalelement = this;
            var currentText = $(this).text();

			$(this).fadeOut(100).before('<textarea id="input" cols="40" rows="12">' + currentText + '</textarea>');
		
		    $('#input').livequery('change', function() {
	            var id = <?php echo $_GET['id'] ?>;
			    var thisparam = this;
                var newText = $(this).val();
                
                if (newText == '') {
                   newText = 'Please enter a description'; 
                }
                          
	            $.ajax({
	                type: 'post',
	                url: 'updatePhoto.php',
	                data: 'id=' + id + '&description=' + newText,
	    
	                success: function() {
                        $(thisparam).remove();
	                    $(originalelement).text(newText).fadeIn(1000);
	                }
	           });
                
		    });
		});
	});
	
	</script>
	
	<style type="text/css">
    img {
      width: 400px;
    }

    input {
     display: block;
    }

    div#title {
    height: 40px;
    
    }

    #title h1, #title input {
      margin: 0; padding: 0;
    }
	</style>
	
</head>

<body>

    <?php
    
    require 'functions.php';
    require 'database.php';
    
    getChosenPhoto($_GET['id']);
    
    ?>

    <form method="post" action="delete.php">
        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>"/>
        <p><input type="submit" value="Delete This Photo" /></p>
        <p><a href="index.php">Back</a></p>
    </form>

</body>
</html>