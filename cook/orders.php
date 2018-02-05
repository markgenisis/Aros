    <?php
	date_default_timezone_set("Asia/Manila");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aros";

$mysqli = new mysqli($servername, $username, $password,$dbname);
require("../include/functions.php");
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