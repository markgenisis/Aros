<?php
include "dbconn.php";
$alert=0;
if(!isset($_SESSION['old_data'])){
	$_SESSION['old_data']=array();
}
if(sizeof($_SESSION['old_data'])==0){
	$getData=$mysqli->query("select * from orders where tableID='{$_SESSION['table_num']}' and waiterID='{$_SESSION['ACCESS_ID']}' and status !='1'");
	while($r=mysqli_fetch_assoc($getData)){
		
		if(!in_array($r['id'],$_SESSION['old_data'])){
			array_push($_SESSION['old_data'],$r['id']);
		}
	}
}else{
	$getData=$mysqli->query("select * from orders where tableID='{$_SESSION['table_num']}' and waiterID='{$_SESSION['ACCESS_ID']}' and status ='1'");
	while($r=mysqli_fetch_assoc($getData)){
		if(in_array($r['id'],$_SESSION['old_data'])){
			$alert++;
			$key=array_search($r['id'],$_SESSION['old_data']);
			unset($_SESSION['old_data'][$key]);
		}
	}
}
//print_r($_SESSION['old_data']);
echo $alert;