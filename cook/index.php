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
    <?php
	$tables=array(); $orderID=array(); $x=0;$i=0;
		$orders=$mysqli->query("select * from orders where status ='2' order by date asc");
		while($row=mysqli_fetch_assoc($orders)){ 
				if(!in_array($row['tableID'],$tables)){
					array_push($tables,$row['tableID']);	 
					$i++;
				}$orderID[$i-1][$x]=$row['id'];
				$x++;
		}
		//print_r($orderID);
	foreach($tables as $key => $val){
	?>
		 <div class="w3-col m3 l3"   >
         	<div class="w3-margin w3-padding-small" style="border:purple 5px double; background:black;">
                 <h4 class="w3-text-white"  >TABLE #: <?php echo $val; ?>  </h4>
                 <hr>
                 	<table class="w3-table w3-white" style="font-size:12px;">
<tr>
  <th>Menu</th>
  <th class="w3-right">Qty</th>
</tr>
</table>
                     <ul class="w3-ul w3-text-white" style="font-size:12px;  ">
                        <?php 
							foreach($orderID[$key] as $p => $v){
								$menuID=$mysqli->query("select * from orders where id='$v'");
								while($mID=mysqli_fetch_assoc($menuID)){
						?>
                        <li><?php echo getMenu($mID['menuID']); ?><span class="w3-right"><?php echo $mID['quantity']; ?> <input type="checkbox" class="w3-radio" style="margin-top:-8px;" name="menuorder" value="<?php echo $mID['id']; ?>"></span></li>
                        <?php } } ?>
                     </ul>
                 <hr>
             <button class="w3-btn w3-purple w3-button w3-block" style="height:30px; padding-top:3px;" onClick="serveOrder();">Serve</button>    
            </div>
        </div>  
	<?php } ?>	
    
    <!-- VERIFY -->
    <?php
	$tables=array(); $orderID=array(); $x=0;$i=0;
		$orders=$mysqli->query("select * from orders where status = '0' and status !='1' order by date asc");
		while($row=mysqli_fetch_assoc($orders)){ 
				if(!in_array($row['tableID'],$tables)){
					array_push($tables,$row['tableID']);	 
					$i++;
				}$orderID[$i-1][$x]=$row['id'];
				$x++;
		}
		//print_r($orderID);
	foreach($tables as $key => $val){
	?>
		 <div class="w3-col m3 l3"   >
         	<div class="w3-margin w3-padding-small" style="border:purple 5px double; background:black;">
                 <h4 class="w3-text-white"  >TABLE #: <?php echo $val; ?>  </h4>
                 <hr>
                 <div class="w3-panel w3-blue-gray w3-round" id="messge" style="padding:3px;">
                 	<span onclick="this.parentElement.style.display='none'" style="position:relative; padding:0px; padding-right:5px; top:-5px; background:none;" class="w3-button w3-right w3-display-topright">&times;</span>
                 	 Check the box if the Order is available. 
                 </div>
                 
                 	<table class="w3-table w3-white" style="font-size:12px;">
<tr>
  <th>Menu</th>
  <th class="w3-right">Status</th>
</tr>
</table>
                     <ul class="w3-ul w3-text-white" style="font-size:12px;  ">
                        <?php 
							foreach($orderID[$key] as $p => $v){
								$menuID=$mysqli->query("select * from orders where id='$v'");
								while($mID=mysqli_fetch_assoc($menuID)){
						?>
                        <li><?php echo getMenu($mID['menuID']); ?><span class="w3-right"><?php //echo $mID['quantity']; ?> <input type="checkbox" class="w3-radio" style="margin-top:-8px;" name="<?php echo $val; ?>_statusOrder" value="<?php echo $mID['id']; ?>"></span></li>
                        <?php } } ?>
                     </ul>
                 <hr><?php $ids= implode(",",$orderID[$key]); echo $ids; ?>
                <input type="hidden" id="<?php echo $val; ?>_ids"  value="<?php echo $ids; ?>" >
             <button class="w3-btn w3-green w3-button w3-block" style="height:30px; padding-top:3px;" onClick="verifyOrder(<?php echo $val; ?>);">VERIFY ORDER</button>    
            </div>
        </div>  
	<?php } ?>	
    <!-- VERIFY -->
	</div>
</div>
<!--------- MEnu Container ------>
<script type="application/javascript" src="../js/actions.js"></script>
</body>
</html>