<?php

require 'database.php';

$id = $_POST['id'];
$d = addslashes($_POST['description']);

if ($d == '') $d = 'Click here to enter a description.';

$q = "UPDATE gs_photo SET description='$d' WHERE id = $id"; 

$result = $mysqli->query($q) or die('There was a problem updating this information.');

if($result) echo "Your photo has been successfully updated.";

?>