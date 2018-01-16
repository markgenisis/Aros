<?php
	include "dbconn.php";
?>
<table class="w3-table w3-white" style="font-size:12px;">
<tr>
  <th width="5%">Qty</th>
  <th  width="60%">Menu</th>
  <th class=" ">Price</th>
  <th class="w3-right">Status</th>
</tr>
</table>
<ul class="w3-ul w3-hoverable">
			  <!-- FOR PULLING
              <li>Order #1 <span class="w3-badge">3pcs</span> <span class='w3-right'>100.00 <a href='javascript:void(0);'><i class="fa fa-remove fa-fx w3-hover-text-red"></i></a> </span></li> -->
              <?php
			  $total=0; $servedNum=0;
			  if(isset($_SESSION['table_num'])){
			  $orders=$mysqli->query("select * from orders where tableID='{$_SESSION['table_num']}' and paid='0' and waiterID='{$_SESSION['ACCESS_ID']}'");
			  $num=mysqli_num_rows($orders);
			  while($or=mysqli_fetch_assoc($orders)){ ?>
				  <li class="w3-text-deep-purple"> <span class="w3-badge"><?php echo $or['quantity']; ?> </span> <?php getMenu($or['menuID']); ?> <span class='w3-right'><?php echo number_format((getPrice($or['menuID'])*$or['quantity']),2); ?> <span ><img src="../images/<?php echo getStatus($or['status']); ?>" width="25"></span><?php if($or['status'] == '3'){ ?> <a href='javascript:void(0);' onClick="removeDBOrder(<?php echo $or['id']; ?>) ;"><i class="fa fa-remove fa-fx w3-hover-text-red"></i></a><?php } ?></span></li>
			<?php  $total=$total+getPrice($or['menuID'])*$or['quantity']; if($or['status']=='1'){$servedNum++;}  }
			//  print_r($_SESSION['orders']);
			  if(isset($_SESSION['orders'])){
			  	foreach($_SESSION['orders'] as $key => $val){
			  		$order=explode(",",$val);
					
					if($order[2]==$_SESSION['table_num']){
			  ?>
              		<li> <span class="w3-badge"><?php echo $order[1]; ?> </span> <?php getMenu($order[0]); ?> <span class='w3-right'><?php echo number_format((getPrice($order[0])*$order[1]),2); ?> <a href='javascript:void(0);' onClick="removeOrder(<?php echo $key; ?>)"><i class="fa fa-remove fa-fx w3-hover-text-red"></i></a>  <span ><img src="../images/<?php echo getStatus($or['status']); ?>" width="25"></span></span></li>
              <?php $total=$total+getPrice($order[0])*$order[1]; } } }
			  
			  }
			  ?>
			</ul>
             <hr>
            <div class="w3-left"><button class="w3-btn w3-purple" onClick="confirmOrder();" id="confirmOrderBtn" disabled>Confirm Orders</button>&nbsp;<?php if($servedNum){if($num == $servedNum){?><button class="w3-btn w3-green">Bill Out</button><?php } }?></div><div class="w3-right w3-text-blue-gray">Total: Php <?php echo number_format($total,2); ?></div>