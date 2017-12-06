<?php
 include "../include/dbconn.php";
 if($_SESSION['ACCESS_TYPE']!='1'){
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
				  <a href="#" class="w3-bar-item w3-button w3-text-white w3-hover-none w3-hover-text-white bar-item w3-hide-small">ADMINISTRATOR PAGE</a>
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
	<div class="w3-row">
		<!--- Side Menu List -->
		<div class="w3-quarter m3 w3-container w3-padding left_menu_container w3-bar-block w3-hide-small">
			<h3 class="w3-hide-small w3-hide-medium"><strong class="w3-border-bottom">Admin Menu</strong></h3>
			<strong class="w3-border-bottom w3-hide-large">Menu Categories</strong>
			 <div class="w3-block">
				<a href="?addcategory" class="w3-bar-item w3-button">ADD/VIEW CATEGORY</a>
				<a href="?addmenu" class="w3-bar-item w3-button">ADD/VIEW MENUS</a>
                <a href="?addtables" class="w3-bar-item w3-button">ADD TABLES</a> 
				<a href="?addwaiter" class="w3-bar-item w3-button">ADD WAITERS</a>
                <!-- <a href="?addcashier" class="w3-bar-item w3-button">ADD CASHIERS</a> -->
			</div>
		</div>
		<!--- Side Menu List -->
		
		<!--- PUTAHE Container -->
		<div class="w3-col m8 w3-padding" id="center_putahe">
			<div class="w3-row-padding">
           <!--
           <div class="w3-third" >
					<div class="w3-row">
						<div style="border:1px dashed #909090;padding:0px 20px; margin-top:5%" >
							<div class="">
								<p style="font-size:1.2em;text-align:"><i><strong>Chicken Sisig</strong></i></p>
							</div>
							<div style="height:100%; width:100%">
							  <img src="../images/sisig.jpg" width="100%"/>
								<div class="w3-purple w3-text-shadow" style="width: 100%;text-align: center;padding: 5px 0;text-shadow:1px 1px 0 #444">&#x20B1; 2,000.00</div>
							</div>
							<div class="" style="position:relative;top:7px">
								<button class="w3-btn w3-teal w3-block">Add to Orders</button>
							</div>
						</div>
					</div>
				</div> 
           -->
            <?php
			if(isset($_GET['addcategory'])){
			?>
				<div class="w3-container">
                	<div class="w3-container w3-purple">
                    	<h4><span class="fa fa-plus"></span> ADD CATEGORY</h4>
                    </div>
                    <div class="w3-container w3-card-4 w3-padding">
                    	<div id="alertMSG"></div>
                    	<label>Category Name:</label>
                    	<input type="text" placeholder="CATEGORY NAME" class="w3-input" id="categoryname" >
                        <input type="button" class="w3-btn w3-green w3-margin-top" value="ADD CATEGORY" onClick="addCategory()"  >
                    </div>
                </div>
                <div class="w3-container w3-margin-top ">
                	<div class="w3-container w3-blue-grey ">
                    	<h4 class="w3-text-white">LIST OF CATEGORY</h4>
                    </div>
                    <div class="w3-container w3-card-4 w3-padding">
                    	<ul class="w3-ul w3-hoverable">
                         <?php
						 	$cat=$mysqli->query("select * from categories");
							while($row=mysqli_fetch_assoc($cat)){
						 ?>
                          <li><?php echo $row['category']; ?> <span class="w3-badge w3-green" style="border-radius: 15px; right:180px;  position:absolute; cursor:pointer;" onClick="location='?cat=<?php echo $row['id']; ?>'"><span class="fa fa-eye"></span> View Menus</span></li> 
                          <?php } ?>
                        </ul>
                    </div>
                </div>
			<?php } ?>
            
             <?php
			if(isset($_GET['addmenu'])){
			?>
            	<div class="w3-container">
                	<div class="w3-container w3-purple">
                    	<h4><span class="fa fa-plus"></span>  ADD MENU</h4>
                        <span class="w3-badge w3-green" style="border-radius: 15px; right:160px; top:115px; position:absolute; cursor:pointer;" onClick="location='?viewmenu'"><span class="fa fa-eye"></span> View Menus</span>
                    </div>
                    <div class="w3-container w3-card-4 w3-padding">
                    	<div id="alertMSG"></div>
						<div class="" id="new_menu_container">
						<form onsubmit="add_menu()" action="javascript:void(0);" method="post" enctype="multipart/form-data">
							<label>Category Name:</label>
							<select class="w3-input" id="catID" required />
								<option selected disabled value="">Select Menu Category</option>
								<?php
									$cat=$mysqli->query("select * from categories");
									while($row=mysqli_fetch_assoc($cat)){
								?>
									<option value="<?php echo $row['id']; ?>"><?php echo $row['category']; ?></option>
								<?php } ?>
							</select>
							<label>Menu Name:</label>
							<input type="text" class="w3-input" id="menuname" required />
							<label>Price:</label>
							<input type="text" class="w3-input" id="menuprice" required />
							<label>Image:</label>
							<input type="file" class="w3-input" id="menuimage" required />
							<input type="submit" class="w3-btn w3-green w3-margin-top" value="ADD MENU">
						</form>
						</div>
						<div class="w3-container" id="preview_container">
							<img id="img_preview_on_select"  width="100%" src=""/>
						</div>
                    </div>
                </div>
            <?php } 
			if(isset($_GET['viewmenu'])){
			?>	    
                <div class="w3-container w3-margin-top">
                	<div class="w3-container w3-purple">
                    	<h4>VIEW MENU by Category</h4>
                    </div>
                    <div class="w3-container w3-card-4 w3-padding">
                    	<div id="alertMSG"></div>
						
                        <?php
							$cat=$mysqli->query("select * from categories");
							while($row=mysqli_fetch_assoc($cat)){
						?>
                        <div class="w3-quarter w3-padding">
                        	<div style="cursor:pointer;" onClick="location='?cat=<?php echo $row['id']; ?>'">
                        		<img src="../images/logo.jpg" style="width:100%" >
                            	<center><label><?php echo strtoupper($row['category']); ?></label></center>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            <?php }if(isset($_GET['cat'])){
			?>	    
                <div class="w3-container w3-margin-top">
                	<div class="w3-container w3-purple">
                    	<h4><span class="fa fa-list-alt"></span> <?php getCategory($_GET['cat']); ?></h4>
                    </div>
                    <div class="w3-container w3-card-4 w3-padding">
                    	<div id="alertMSG"></div>
						
                        <?php
							$cat=$mysqli->query("select * from menu where category='{$_GET['cat']}'");
							while($row=mysqli_fetch_assoc($cat)){
						?>
                        <div class="w3-quarter w3-padding" style="height:260px;" id="menu_<?php echo $row['id']; ?>">
                        	<div style="cursor:pointer; border: solid 1px #000; border-radius: 15px; "  >
                        		<img src="../images/<?php echo $row['image']; ?>" style="width:100%; height:180px;" >
                               <center><label class="w3-block w3-purple">Php <?php echo number_format($row['price'],2); ?></label></center>
                            	<center><label><?php echo strtoupper($row['menu']); ?></label></center>
                                <span class="w3-badge w3-green fa fa-pencil" style="border-radius:25px; height:20px; padding-top:2px; position:relative; top:-235px; right:-118px;" onclick="document.getElementById('editmenu_<?php echo $row['id']; ?>').style.display='block'"></span><span class="w3-badge fa fa-trash w3-red" style="border-radius:25px; height:20px; padding-top:2px; position:relative; top:-235px; right:-120px;" onClick="deleteMenu(<?php echo $row['id']; ?>);"></span>
                            </div>
                        </div>
                        
                        <!-- Trigger/Open the Modal --> 
                            
                            <!-- The Modal -->
                            <div id="editmenu_<?php echo $row['id']; ?>" class="w3-modal">
                              <div class="w3-modal-content  w3-animate-zoom">
                                <div class="w3-container w3-purple">
                                  <span onclick="document.getElementById('editmenu_<?php echo $row['id']; ?>').style.display='none'" 
                                  class="w3-button w3-display-topright">&times;</span>
                                  <p>EDIT MENU: <?php echo $row['menu']; ?></p> 
                                </div>
                                <div class="w3-container w3-white">
                                		<div class="" id="new_menu_container">
                                		<div id="editMSG_<?php echo $row['id']; ?>"></div>
                                        <form onsubmit="edit_menu(<?php echo $row['id']; ?>)" action="javascript:void(0);" method="post" enctype="multipart/form-data">
                                            <label>Category Name:</label>
                                            <select class="w3-input" id="catID" required />
                                                <option selected disabled value="">Select Menu Category</option>
                                                <?php
                                                    $cat=$mysqli->query("select * from categories");
                                                    while($rows=mysqli_fetch_assoc($cat)){
                                                ?>
                                                    <option <?php if($row['category']==$rows['id']) echo "selected"; ?> value="<?php echo $rows['id']; ?>"><?php echo $rows['category']; ?></option>
                                                <?php } ?>
                                            </select>
                                            <label>Menu Name:</label>
                                            <input type="text" class="w3-input" id="menuname" value="<?php echo $row['menu']; ?>" required />
                                            <label>Price:</label>
                                            <input type="text" class="w3-input" id="menuprice" value="<?php echo $row['price']; ?>" required />
                                            <label>Image:</label>
                                            <input type="file" class="w3-input" id="menuimage"  required />
                                            <input type="submit" class="w3-btn w3-green w3-margin-top" value="ADD MENU">
                                        </form>
                                        </div>
                                        <div class="w3-container" id="preview_container">
                                            <img id="img_preview_on_select"  width="100%" src=" "/>
                                        </div>
                                </div>
                              </div>
                            </div>
                        
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>		 
            
              <?php
			if(isset($_GET['addtables'])){
			?>
            	<div class="w3-container">
                	<div class="w3-container w3-purple">
                    	<h4><span class="fa fa-plus"></span> ADD TABLES</h4>
                    </div>
                    <div class="w3-container w3-card-4 w3-padding">
                    	<div id="alertMSG"></div>
                    	
                        <label>Table Number:</label>
                        <input type="text" class="w3-input" id="tablenumber" >
                        <input type="button" class="w3-btn w3-green w3-margin-top" value="ADD TABLE" onClick="addTable()"  >
                    </div>
                    
                    
                </div>
                 <div class="w3-container w3-margin-top ">
                	<div class="w3-container w3-blue-grey ">
                    	<h4 class="w3-text-white">LIST OF TABLES</h4>
                    </div>
                    <div class="w3-container w3-card-4 w3-padding">
                    	<ul class="w3-ul w3-hoverable">
                         <?php
						 	$cat=$mysqli->query("select * from tables");
							while($row=mysqli_fetch_assoc($cat)){
						 ?>
                          <li># <?php echo $row['tablenumber']; ?></li> 
                          <?php } ?>
                        </ul>
                    </div>
                </div>
            <?php } ?>	 
            
            
             <?php
			if(isset($_GET['addwaiter'])){
			?>
            	<div class="w3-container">
                	<div class="w3-container w3-purple">
                    	<h4><span class="fa fa-plus"></span> ADD WAITER</h4>
                    </div>
                    <div class="w3-container w3-card-4 w3-padding">
                    	<div id="alertMSG"></div>
                    	 
                        <label>Name:</label>
                        <input type="text" class="w3-input" id="waitername" >
                        <label>Surname:</label>
                        <input type="text" class="w3-input" id="waitersurname" >
                       
                        <label class=""><strong>Account Info:</strong></label>
                         <hr>
                        <label>Username:</label>
                        <input type="text" id="waiterusername" class="w3-input" >
                        <label>Password:</label>
                        <input type="password" id="waiterpassword" class="w3-input" >
                        <input type="button" class="w3-btn w3-green w3-margin-top" value="ADD WAITER" onClick="addWaiter()"  >
                    </div>
                </div>
            <?php } ?>	 
			</div>
		</div>
		<!--- PUTAHE Container -->
		
		 
		
	</div>
<!--------- MEnu Container ------>
<script type="application/javascript" src="../js/actions.js"></script>
</body>
</html> >>>