<?php
date_default_timezone_set("Asia/Manila");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aros";

$mysqli = new mysqli($servername, $username, $password,$dbname);
//$conn = mysql_connect($servername, $username, $password);
//$con = mysqli_connect($servername, $username, $password,$dbname);
 
session_start();

// Check connection
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
function getCategory($x){
	global $mysqli;
	$cat=$mysqli->query("select * from categories where id='$x'");	
	while($row=mysqli_fetch_assoc($cat)){
	echo $row['category'];
	}
}
function getMenu($x){
	global $mysqli;
	$cat=$mysqli->query("select * from menu where id='$x'");	
	while($row=mysqli_fetch_assoc($cat)){
	echo $row['menu'];
	}
}
function getPrice($x){
	global $mysqli;
	$cat=$mysqli->query("select * from menu where id='$x'");	
	while($row=mysqli_fetch_assoc($cat)){
	return $row['price'];
	}
}