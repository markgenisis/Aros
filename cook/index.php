<?php
 include "../include/dbconn.php";
 if($_SESSION['ACCESS_TYPE']!='3'){
	header("location:../");
	die();
	}
?>
<!DOCTYPE html>
<html>
<title>AROS</title>
<meta charset="UTF-8">
<link rel="shortcut icon" href="images/logo.jpg" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/w3.css">
<link rel="stylesheet" type="text/css" href="../google/fafa.css">
<link rel="stylesheet" type="text/css" href="../js/jquery.min.js">
<link rel="stylesheet" type="text/css" href="../js/jquery.js"> 

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<style>
.bar-item:hover{
	border-bottom:2px solid #fff !important;
}
.w3-bar-item{
	border-bottom:2px solid #9c27b0 !important;
}
@media screen and (min-width: 1025px) {
	/*For High Resolution Computers*/
   .left_menu_container, .putahe_container, .order_container{
	  border-right:1px solid #ddd;
	  max-height:565px;
	  min-height:565px;
	  overflow-y:auto;
   }
   #putahe_img{
	   margin:0px 20px;
   }
}
@media screen and (min-width: 668px) and (max-width: 1024px) {
	/*For ipad*/
   .left_menu_container, .putahe_container, .order_container{
	   border-right:1px solid #ddd;
	   max-height:673px;
	   min-height:673px;
	  overflow-y:auto;
   }
}
@media screen and (min-width:569px) and (max-width: 667px) {
	/*For iphone 6*/
   .left_menu_container{
	   font-size:12px;
	   border-right:1px solid #ddd;
	   max-height:280px;
	   min-height:280px;
	   overflow-y:auto;
   }
}
@media screen and (min-width:768px) and (max-height:575px){
	.left_menu_container, .putahe_container, .order_container{
	   font-size:10px;
	   border-right:1px solid #ddd;
	   max-height:479px;
	   min-height:479px;
	   overflow-y:auto;
   }
   #putahe_img{
   }
}
body {
    height: 100vh !important;
}

</style>
<script language="javascript" type="text/javascript">
$(document).ready(function () {
  $("#menuimage").change(function(){
			readURL(this);
		});
	loadgetOrders();
	setInterval(getOrders,5000);
});
function order_list(){
		$('#list_of_orders').removeClass('w3-animate-right w3-hide-small ');
		$('#center_putahe').addClass('w3-hide-small');
		$('#orderListBtn').addClass('w3-hide');

		//return true;
	}
function order_list_rev(){
		$('#list_of_orders').addClass('w3-animate-right w3-hide-small ');
		$('#center_putahe').removeClass('w3-hide-small');
		$('#orderListBtn').removeClass('w3-hide');

		//return true;
	}
	
$(function() {

    var $sidebar   = $("#orderListBtn"), 
        $window    = $(window),
        offset     = $sidebar.offset(),
        topPadding = 50;

    $window.scroll(function() {
        if ($window.scrollTop() > offset.top) {
            $sidebar.stop().animate({
                marginTop: $window.scrollTop() - offset.top + topPadding
            });
        } else {
            $sidebar.stop().animate({
                marginTop: 0
            });
        }
    });
    
});
	
 
  function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#img_preview_on_select').attr('src', e.target.result);
				$('#new_menu_container').addClass('w3-half');
				$('#preview_container').addClass('w3-rest');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
	
	function getOrders(){
		var dddata = $('#dddata').val();
		var orderCounter = $("#orderCounter").val();
		//alert(orderCounter);
			//console.log(orderCounter);
		$.ajax({
			url:'orders.php',
			type:'GET',
			success:function(data){
				if(orderCounter == dddata){
					alert("asdasdad");
				}else{
					$('#dddata').prop("value",data);
					$("#ordersAppending").html(data);
				}
			}
		})
	}
	function loadgetOrders(){
		var dddata = $('#dddata').val();
				console.log(dddata);
		$.ajax({
			url:'orders.php',
			type:'GET',
			success:function(data){
				if(data == dddata){
					alert("asdasdad");
				}else{
					$('#dddata').prop("value",data);
					$("#ordersAppending").html(data);
				}
			}
		})
	}


</script>
<body >
<!---------TOP NAV ------>
	<div class="w3-row">
		<div class="banner w3-container">
			<div><h2 class="w3-wide" style="margin-bottom:0px;"><strong class="w3-text-purple " style="text-shadow:1px 1px 0 #444">AROS</strong> <small class="w3-right w3-hide-medium w3-hide-small">Automated Restaurant Ordering System</small></h2>
			
			</div>
		</div>
		<div class="w3-row" id="menu_bar" >
			<div class="w3-row" style=''>
				<div class="w3-bar w3-purple w3-card-2" >
				  <a href="#" class="w3-bar-item w3-button w3-text-white w3-hover-none w3-hover-text-white bar-item w3-hide-small">ORDERS</a>
				  <a href="#" class="w3-bar-item w3-button w3-text-white w3-hover-none w3-hover-text-white bar-item w3-hide-medium w3-hide-large"><i class="fa fa-user fa-1x"></i></a>
				  <div class="w3-dropdown-hover w3-hide-medium w3-hide-large">
					  <button class="w3-button">Admin Menu <i class="fa fa-caret-down fa-lg"></i></button>
					  <div class="w3-dropdown-content w3-bar-block w3-border">
						<a href="#" class="w3-bar-item w3-button w3-small">PASTA</a>
						<a href="#" class="w3-bar-item w3-button w3-small">PIZZA</a>
						<a href="#" class="w3-bar-item w3-button w3-small">COMBO MEAL</a>
					  </div>
					</div>
				  <a href="logout.php" class="w3-bar-item w3-button w3-text-white w3-hover-none w3-hover-text-white bar-item w3-hide-small w3-right">Logout</a>
				</div>
			</div>
		</div>
	</div>
<!---------TOP NAV ------>



<!--------- MEnu Container ------>
<div class="w3-container">
	<div class="w3-row">
		<input type="hidden" value="" id="dddata"/>
		<div id="ordersAppending"></div>
	</div>
</div>
<!--------- MEnu Container ------>
<script type="application/javascript" src="../js/actions.js"></script>
</body>
</html>