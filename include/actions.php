<?php 
include "dbconn.php";

if(isset($_POST['username'])){
	$username=$_POST['username'];
	$password=md5($_POST['password']);
	$log=$mysqli->query("select * from accounts");
	while($row=mysqli_fetch_assoc($log)){
		if($row['username']==$username && $row['password']==$password){
			 
				echo $row['type'];
				$_SESSION['ACCESS_TYPE']=$row['type'];
				$_SESSION['ACCESS_ID']=$row['id'];
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
	$sel=$mysqli->query("select * from orderid where tableNum='{$_SESSION['table_num']}' and status='0'");
	$num=mysqli_num_rows($sel);
	$ordID=mysqli_fetch_assoc($sel);
	if(!$num){
	unset($_SESSION['ORDER_ID']);
	}else{
	$_SESSION['ORDER_ID']=$ordID['orderID'];}
	 unset($_SESSION['old_data']);
	echo $_SESSION['table_num'];
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
if(isset($_POST['confirmOrder'])){
	$orderID=$_SESSION['table_num']."-".date("m-d@H:i",time());
	$now=time();
	$sel=$mysqli->query("select * from orderid where tableNum='{$_SESSION['table_num']}' and status='0'");
	$num=mysqli_num_rows($sel);
	$ordID=mysqli_fetch_assoc($sel);
	if(!$num){
		$insert=$mysqli->query("insert into orderid values ('NULL','$orderID','{$_SESSION['ACCESS_ID']}','{$_SESSION['table_num']}','$now','0','0')");
		$_SESSION['ORDER_ID']=$orderID;
	}else{
	$_SESSION['ORDER_ID']=$ordID['orderID'];}
	foreach($_SESSION['orders'] as $key => $val){
		$ord=explode(",",$val);
		$date=time();
		$insert=$mysqli->query("insert into orders values ('NULL','{$_SESSION['ORDER_ID']}','{$_SESSION['ACCESS_ID']}','{$ord[0]}','{$ord[2]}','{$ord[1]}','0','0','$date');") or die();
	}	
	unset($_SESSION['orders']);
}
if(isset($_POST['served'])){
	$menus=explode(",",$_POST['served']);
	foreach($menus as $key => $val){
		$update=$mysqli->query("update orders set status='1' where id='$val'") or die(mysqli_error());
	}
	if($update){
		echo "SUCCESS";
	}
}
if(isset($_POST['removeDBOrder'])){
	$id=$_POST['removeDBOrder'];
	$del=$mysqli->query("delete from orders where id='$id'") or die();
}
if(isset($_POST['ids'])){
	//echo $_POST['ids']." - ".$_POST['verify'];
	$ids=explode(",",$_POST['ids']);
	$checked=explode(",",$_POST['verify']);
	foreach($ids as $key => $men){
		if(in_array($men,$checked)){
			$update=$mysqli->query("update orders set status='2' where id='$men'") or die();
		}else{
			$update=$mysqli->query("update orders set status='3' where id='$men'") or die();
		}
	}
	
}
if(isset($_POST['payment'])){
	$orderID=$_POST['ordID'];
	$payment=$_POST['payment'];
	
	$sql=$mysqli->query("update orders set paid='1' where orderID='$orderID'");
	$orders=$mysqli->query("update orderid set `status`='1', `total`='$payment' where orderID='$orderID'");
	if($sql && $orders){
		echo "SUCCESS";
	}
}
if(isset($_POST['year'])){
	$month=$_POST['month'];
	$year=$_POST['year'];
	$date=array(); 
	$reports=$mysqli->query("select * from orderid");
	while($mon=mysqli_fetch_assoc($reports)){
		 
		if(date("F Y",$mon['date'])==$month." ".$year){ 
			if(!in_array(date("F d, Y",$mon['date']),$date)){
				array_push($date,date("F d, Y",$mon['date']));
			}
		}
		
        
		 
	}
	foreach($date as $key=> $val){
	 ?>
     
	<button class="w3-bar-item w3-button w3-small" onclick="dailyReports(<?php echo strtotime($val); ?>);"><?php echo $val; ?></button>  
	  
     <?php }
}
if(isset($_POST['daily'])){
	?>
    	<table class="w3-table w3-striped w3-bordered">
        <tr>
        	<th>Waiter ID</th>
            <th>Table Number</th>
            <th>Total Amount Paid</th>
        </tr>
    <?php
	$total=0;
	$daily=$mysqli->query("select * from orderid");
	while($row=mysqli_fetch_assoc($daily)){
		if(date("M d, Y",$_POST['daily'])==date("M d, Y",$row['date'])){
		?>
        <tr>
        	<td><?php echo $row['waiter'] ?></td>
            <td class="w3-center"><?php echo $row['tableNum'] ?></td>
            <td class="w3-right"><?php echo number_format($row['total'],2); ?></td>
        </tr>
        <?php	$total+=$row['total'];
		}
	} ?>
    <tr>
    	<td></td>
        <td class="">TOTAL:</td>
        <td class="w3-right">P <?php echo number_format($total,2); ?></td>
    </tr>
    </table>
    <?php
}