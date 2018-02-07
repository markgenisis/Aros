<?php
 include "../include/dbconn.php";
	if($_SESSION['ACCESS_TYPE']!='2'){
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
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
					//alert("asdasdad");
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
					//alert("asdasdad");
				}else{
					$('#dddata').prop("value",data);
					$("#ordersAppending").html(data);
				}
			}
		})
	}


</script>
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
	/*Medium Screens*/
	.left_menu_container, .putahe_container, .order_container{
	   font-size:10px;
	   border-right:1px solid #ddd;
	   max-height:479px;
	   min-height:479px;
	   overflow-y:auto;
   }
   #putahe_img{
	  
   }
   #list_of_orders{
   }
}
body {
    height: 100vh !important;
}

</style>
<script language="javascript" type="text/javascript">
$(document).ready(function () {
$(window).on('load resize', function () {
	  var w = $(window).width();
	  if (w <= 768 && w >= 601) {
		  $('#list_of_orders').removeClass('w3-quarter');
		  $('#list_of_orders').addClass('w3-hide');
		  $('#center_putahe').removeClass('w3-half');
		  $('#center_putahe').removeClass('w3-rest');
		  // alert(w);
		  var preferredHeight = 768;
			//Base font size for the page
			var fontsize = 18;

			var displayHeight = $(window).height();
			var percentage = displayHeight / preferredHeight;
			var newFontSize = Math.floor(fontsize * percentage) - 1;
		  $('#add_order_btn').css("font-size",newFontSize);
		}
		else {
		 // alert(w);
		  $('#list_of_orders').removeClass('w3-hide');
		  $('#list_of_orders').addClass('w3-quarter');
		  $('#center_putahe').addClass('w3-half');
		  $('#center_putahe').addClass('w3-rest');
		  $('#add_order_btn').css('font-size','12px');
		}
});
});
function order_list(){
	$('#list_of_orders').removeClass('w3-hide w3-animate-right w3-hide-small ');
	$('#center_putahe').addClass('w3-hide-small w3-hide-medium');
	$('#orderListBtn').addClass('w3-hide');

	//return true;
}
function order_list_rev(){
	$('#list_of_orders').addClass('w3-hide w3-animate-right w3-hide-small ');
	$('#center_putahe').removeClass('w3-hide-small w3-hide-medium');
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
	
$(window).bind('scroll', function () {
	var scrolled = $(window).scrollTop();
	//alert(scrolled);
    if ($(window).scrollTop() > 50) {
		
        $('#menu_bar').addClass('w3-top');
    } else {
        $('#menu_bar').removeClass('w3-top');
    }
});
</script>
<body onLoad="update();" class="w3-black" style="color:yellow !important;">
<!---------TOP NAV ------>
	<div class="w3-row">
		<div class="banner w3-container">
			<div><h2 class="w3-wide" style="margin-bottom:0px;"><strong class="w3-text-purple " style="text-shadow:1px 1px 0 #444">AROS</strong> <small class="w3-right w3-hide-medium w3-hide-small">Automated Restaurant Ordering System</small></h2>
			
			</div>
		</div>
		<div class="w3-row" id="menu_bar" >
			<div class="w3-row" style=''>
				<div class="w3-bar w3-purple w3-card-2" >
                 <a href="./" class="w3-bar-item w3-button w3-text-white w3-hover-none w3-hover-text-white bar-item w3-hide-small">Home</a>
                 <a href="?orders" class="w3-bar-item w3-button w3-text-white w3-hover-none w3-hover-text-white bar-item w3-hide-small">Orders</a>
                  <a href="?billing" class="w3-bar-item w3-button w3-text-white w3-hover-none w3-hover-text-white bar-item w3-hide-small">Billing</a>
                  <a href="?reports" class="w3-bar-item w3-button w3-text-white w3-hover-none w3-hover-text-white bar-item w3-hide-small">Reports</a>
                
				  <!-- <a href="#" class="w3-bar-item w3-button w3-text-white w3-hover-none w3-hover-text-white bar-item w3-hide-small">Christorey Opao</a>-->
				  <a href="#" class="w3-bar-item w3-button w3-text-white w3-hover-none w3-hover-text-white bar-item w3-hide-medium w3-hide-large"><i class="fa fa-user fa-1x"></i></a>
				  <div class="w3-dropdown-hover w3-hide-medium w3-hide-large">
					  <button class="w3-button">MENU CATEGORY <i class="fa fa-caret-down fa-lg"></i></button>
					  <div class="w3-dropdown-content w3-bar-block w3-border">
						<?php $categories=$mysqli->query("select * from categories");
						  while($cat=mysqli_fetch_assoc($categories)){
						?>
						<a href="#" class="w3-bar-item w3-button w3-small"><?php echo $cat['category'];?></a>
						<?php } ?>
						
					  </div>
					</div>
				  <a href="logout.php" class="w3-bar-item w3-button w3-text-white w3-hover-none w3-hover-text-white bar-item w3-hide-small w3-right">Logout</a>
				</div>
			</div>
		</div>
	</div>
<!---------TOP NAV ------>



<!--------- MEnu Container ------>
	<div class="w3-row">
    <?php if(isset($_GET['billing']) || isset($_GET['reports'])){ ?>
		<!--- Side Menu List -->
		<div class="w3-col s4 w3-container w3-padding left_menu_container w3-bar-block w3-hide-small">
        <?php if(isset($_GET['billing'])){ ?>
			<h3 class="w3-hide-small w3-hide-medium"><strong class="w3-border-bottom">ORDER LISTS</strong></h3>
			<strong class="w3-border-bottom w3-hide-large">ORDER LISTS</strong>
			 <div class="w3-block">
			<!--	<?php
	$tables=array(); $orderID=array(); $x=0;$i=0;
		$orders=$mysqli->query("select * from orders where paid = '0' and status ='1' order by date asc");
		while($row=mysqli_fetch_assoc($orders)){ 
				if(!in_array($row['tableID'],$tables)){
					array_push($tables,$row['tableID']);	 
					$i++;
				}$orderID[$i-1][$x]=$row['id'];
				$x++;
		}
					foreach($tables as $key => $val){
						?>
						<a href="?order=<?php echo $val;?>" class="w3-bar-item w3-button w3-small">Table #: <span class="w3-badge"><?php echo $val;?></span></a>
						<?php } ?>
                        
                        -->
                    <?php
						$orderID=$mysqli->query("select * from orderID where status='0' order by date asc");
						while($row=mysqli_fetch_assoc($orderID)){
					?>    
                    <a href="?order=<?php echo $row['orderID'];?>&tbl=<?php echo $row['tableNum']; ?>" class="w3-bar-item w3-button w3-small">Table #: <span class="w3-badge"><?php echo $row['tableNum'];?></span></a>
                    <?php } ?>
			</div>
            <?php }else if(isset($_GET['reports'])){ ?>
            <div class="w3-row">
            <div class="w3-half">
            <label>Month:</label>
            <select class="w3-input " id="month">
            	<option ></option>
                <option >January</option>
                <option >February</option>
                <option >March</option>
                <option >April</option>
                <option >May</option>
                <option >June</option>
                <option >July</option>
                <option >August</option>
                <option >September</option>
                <option >October</option>
                <option >November</option>
                <option >December</option>
            </select>
            </div>
             <div class="w3-third w3-margin-left">
            <label>Year:</label>
            <select class="w3-input" id="year">
            	<option ></option>
                <?php
				 for($x=2018; $x<=2035; $x++){
				?>
                <option ><?php echo $x; ?></option>
                <?php } ?>
            </select>
            
            </div>
            
            <button class="w3-btn w3-purple" style="margin-top:25px; margin-left:5px;" onClick="reportSearch()"><span class="fa fa-search w3-right" ></span></button>
           </div>
            <hr>
            <div id="reportsresult"></div>
            <?php } else{ ?>
            
            <?php } ?>
		</div>
		<!--- Side Menu List -->
		
		 
		
		<!--- PUTAHE Container -->
		<div class="w3-hide-large w3-right" >
			<a href="javascript:void(0);" style="position:absolute;z-index:9999999;top:25%;right:20px;" class="w3-btn w3-small w3-teal w3-hover-opacity" id="orderListBtn" onclick="order_list()"><i class="fa fa-list-ol"></i></a>
		</div>
		<?php
			if(isset($_GET['order'])){
				$total=0;
		?>
		<div class="w3-col w3-right s4 w3-hide-small order_container w3-padding" id="list_of_orders">
        
        <h3 class="w3-hide-small w3-hide-medium"><strong class="w3-border-bottom">Table #: &nbsp;&nbsp; <?php echo $_GET['tbl']; ?></strong></h3>
			<h3 class="w3-hide-small w3-hide-medium"><strong class="w3-border-bottom">Orders:</strong></h3>
			<strong class="w3-border-bottom w3-hide-large">Orders</strong><a href="javascript:void(0);" class="w3-hide-large w3-right" onclick="order_list_rev()" style="text-decoration:none;">X</a>
			 <table class="w3-table w3-white" style="font-size:12px;">
<tr>
  <th width="5%">Qty</th>
  <th  width="60%">Menu</th>
  <th class=" ">Price</th>
  <th class="w3-right">Status</th>
</tr>
</table>
            <ul class="w3-ul w3-hoverable">
            <?php $sql=$mysqli->query("select * from orders where orderID='{$_GET['order']}' and paid='0' and status='1'");
			while($row=mysqli_fetch_assoc($sql)){
			 ?>
            <li> <span class="w3-badge"><?php echo $row['quantity']; ?> </span> <?php getMenu($row['menuID']); ?> <span class='w3-right'><?php echo number_format((getPrice($row['menuID'])*$row['quantity']),2); ?> <span ><img src="../images/<?php echo getStatus($row['status']); ?>" width="25"></span></span></li>
            <?php $total+= (getPrice($row['menuID'])*$row['quantity']);} ?>
            </ul>
         <?php }if(isset($total) && $total>0){ ?>  
         <hr>
            <div class="w3-left"><a class="w3-btn w3-purple" target="_new" href="billout.php?billout=<?php echo $_GET['order']; ?>"  >Bill Out</a>&nbsp; <a class="w3-btn w3-green"    onclick="document.getElementById('paidpanel').style.display='block'" >Mark as Paid</a></div><div class="w3-right w3-text-blue-gray">Total: Php <?php  echo number_format($total,2); ?></div>
           <!-- The Modal -->
            <div id="paidpanel" class="w3-modal">
              <div class="w3-modal-content" style="max-width:400px;">
                 
                 	<header class="w3-container w3-teal"> 
                      <span onclick="document.getElementById('paidpanel').style.display='none'" 
                      class="w3-button w3-display-topright">&times;</span>
                      <h3>Payment for <?php echo $_GET['order']; ?></h3>
                    </header>
                   
                  <div class="w3-container">
                  <div id="message"></div>
                 	<label>Amount Paid:</label>
                    <input type="number" class="w3-input" id="amountPayment" >
                    <input type="hidden" id="total" value="<?php echo $total; ?>" >
                    <input type="hidden" value="<?php echo $_GET['order']; ?>" id="orderID" >
                 <input type="button" class="w3-btn w3-green w3-margin-top" value="Confirm Payment" onClick="orderPayment();">
                </div>
              </div>
            </div>
           </div>
            <?php }else{ ?>
            	<div class="w3-col s4 w3-center w3-margin-left"><div id="dailyReport"></div></div>
            <?php } ?>
		
		<!--- PUTAHE Container -->
		<?php }else{ ?> 
        <div class="w3-col m12">
        <div id="ordersAppending"></div>
        </div>
        <?php } ?>
	</div>
<!--------- MEnu Container ------>

<script type="application/javascript" src="../js/jquery.min.js"></script>
<script type="application/javascript" src="../js/jquery.js"></script>
<script type="application/javascript" src="../js/actions.js"></script>

</body>
</html>