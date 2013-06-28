<?php

$cfg = require '../protected/config/main.php';
//print '<pre>';
//print_r($cfg['components']['db']);

if (preg_match("/^mysql:host=(\w.*);dbname=(\w.*)/i", $cfg['components']['db']['connectionString'],$match))
{
    //print_r($match);    
}
//$db_name = "myphotos";
//$db_server = "localhost";
//$db_user = "root";
//$db_pass = "";

$db_name = "gspa";
$db_server = $match[1];

//print '<pre>';
//print_r($cfg['components']['db']);

$db_user = $cfg['components']['db']["username"];
$db_pass = $cfg['components']['db']["password"];

//print($db_server.','. $db_user.','. $db_pass.','. $db_name);
$mysqli = new MySQLi($db_server, $db_user, $db_pass, $db_name) or die(mysqli_error());



$final_width_of_image = 100;

$path_to_image_directory = '../uploads/gallery/';
$path_to_thumbs_directory = '../uploads/gallery/tn/';

if (!is_dir($path_to_thumbs_directory))
{
    mkdir($path_to_thumbs_directory,777);
}

?>