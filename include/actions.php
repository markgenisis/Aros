<?php
session_start();
include "dbconn.php";

if(isset($_POST['username'])){
	$username=$_POST['username'];
	$password=md5($_POST['password']);
	$log=$mysqli->query("select * from accounts");
	while($row=mysqli_fetch_assoc($log)){
		if($row['username']==$username && $row['password']==$password){
			 
				echo $row['type'];
				$_SESSION['ACCESS_TYPE']=$row['type'];
				die();
			 
		}
	}
	echo "ERROR";
}
if(isset($_POST['categoryName'])){
	$category=$_POST['categoryName'];
	$Ins=$mysqli->query("insert into categories values ('NULL','$category')") or die();
	if($Ins){
		echo "SUCCESS";
	}
}
if(isset($_POST['tableNum'])){
	$table=$_POST['tableNum'];
	$ins=$mysqli->query("insert into tables values ('NULL','$table')") or die();
	if($ins){
	echo "SUCCESS";
	}
}
if(isset($_POST['waitUsername'])){
	$name=$_POST['waitName'];
	$surname=$_POST['waitSurname'];
	$username=$_POST['waitUsername'];
	$password=md5($_POST['waitPassword']);
	
	$accnt=$mysqli->query("insert into accounts values ('NULL','$username','$password','4')");
	if($accnt){
		$getId=$mysqli->query("select * from accounts where username='$username' and password='$password' and type='4'");
		while($accID=mysqli_fetch_assoc($getId)){
			$inWait=$mysqli->query("insert into waiters values ('NULL','$name','$surname','{$accID['id']}')") or die(mysqli_error());
			if($inWait){
				echo "SUCCESS";
			}
		}
	}
}



//adding menuf
if(isset($_POST['new_menu_name'])){
	//echo "<pre>",print_r($_POST),"</pre>";
	//echo "<pre>",print_r($_FILES),"</pre>";
	
	$menu_cat_id = $_POST['menu_cat_id'];
	$menu_name = $_POST['new_menu_name'];
	$menu_price = $_POST['menu_price'];
	$menu_img_name = $_FILES['new_menu_img']['name'];
	$tmp_src = $_FILES['new_menu_img']['tmp_name'];
	$destination = "../images/";
	
	$check = mysqli_num_rows($mysqli->query("select * from menu where menu='$menu_name' and category='$menu_cat_id'"));
	if($check > 0){
		echo "DUPLICATE";
	}else{
		if(move_uploaded_file($tmp_src,$destination.$menu_img_name)){
			$insert=$mysqli->query("insert into menu values ('NULL','$menu_name','$menu_price','$menu_cat_id','$menu_img_name','1')");
			if($insert){
				echo "SUCCESS";
			}else{
				mysqli_error();
			}
		}else{
			mysqli_error();
		}
	}
	
}
//edit menuf
if(isset($_POST['editnew_menu_name'])){
    //echo "<pre>",print_r($_POST),"</pre>";
    //echo "<pre>",print_r($_FILES),"</pre>";
    $id=$_POST['id'];
    $menu_cat_id = $_POST['editmenu_cat_id'];
    $menu_name = $_POST['editnew_menu_name'];
    $menu_price = $_POST['editmenu_price'];
    
    
    if(isset($_FILES['editnew_menu_img']['name'])){ 
        $menu_img_name = $_FILES['editnew_menu_img']['name'];
        $tmp_src = $_FILES['editnew_menu_img']['tmp_name'];
        $destination = "../images/";
        if(move_uploaded_file($tmp_src,$destination.$menu_img_name)){
            $insert=$mysqli->query("update menu set `menu`='$menu_name',`price`='$menu_price',`category`='$menu_cat_id',`image`='$menu_img_name' where id='$id'");
            if($insert){
                echo "SUCCESS";
            }else{
                mysqli_error();
            }
        }else{
            mysqli_error();
        }
    }else{
        $insert=$mysqli->query("update menu set `menu`='$menu_name',`price`='$menu_price',`category`='$menu_cat_id' where id='$id'");
        if($insert){
            echo "SUCCESS";
        }else{
            mysqli_error();
        }
    }
    
    
}
if(isset($_POST['delMenu'])){
	$id=$_POST['delMenu'];
	$del=$mysqli->query("delete from menu where id='$id'") or die();
	if($del){
		echo "SUCCESS";
	}
}
if(isset($_POST['setTable'])){
	$_SESSION['table_num']=$_POST['setTable'];
}
if(isset($_POST['removeOrder'])){
	unset($_SESSION['orders'][$_POST['removeOrder']]);
}
if(isset($_POST['menu_id'])){
	if(!isset($_SESSION['orders'])){
		$_SESSION['orders'] = array();
	}
		array_push($_SESSION['orders'], $_POST['menu_id'].",".$_POST['quantity'].",".$_POST['table_Num']);
	 
	print_r($_SESSION['orders']);
}
