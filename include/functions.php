<?php // Check connection
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
function getStatus($x){
	global $mysqli;
	switch($x){
		case 1:
			return "served.png";
			break;
		case 0:
			return "waiting.png";
			break;
		case 2:
			return "cooking.png";
			break;
		case 3:
			return "notavail.png";
			break;
	}
}
function getWaiterName($x){
	global $mysqli;
	$cat=$mysqli->query("select * from waiters where accountID='$x'");	
	while($row=mysqli_fetch_assoc($cat)){
	return $row['name'];
	}
}
?>