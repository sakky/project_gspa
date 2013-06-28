<?php


require 'database.php';

$id = $_POST['id'];


$q = "SELECT description, tn_src, src FROM gs_photo Where id = $id LIMIT 1";

$result = $mysqli->query($q) or die("there was a problem");

if($result) {
    while ($row  = $result->fetch_object()) {
        //print $path_to_image_directory.$row->src;
        unlink($path_to_image_directory.$row->src);
        unlink($path_to_thumbs_directory.$row->tn_src);
    }
} else die("There was some problem");


$q = "DELETE from gs_photo WHERE id = $id";

$result = $mysqli->query($q) or die("There was a problem!");
if($result) header("location: index.php");

?>