<?php
	include "dbconn.php";
?>
<ul class="w3-ul w3-hoverable">
			  <!-- FOR PULLING
              <li>Order #1 <span class="w3-badge">3pcs</span> <span class='w3-right'>100.00 <a href='javascript:void(0);'><i class="fa fa-remove fa-fx w3-hover-text-red"></i></a> </span></li> -->
              <?php
			  $total=0;
			  $orders=$mysqli->query("select * from orders where tableID='{$_SESSION['table_num']}' and paid='0' and waiterID='{$_SESSION['ACCESS_ID']}'");
			  while($or=mysqli_fetch_assoc($orders)){ ?>
				  <li class="w3-text-deep-purple"> <span class="w3-badge"><?php echo $or['quantity']; ?> </span> <?php getMenu($or['menuID']); ?> <span class='w3-right'><?php echo number_format((getPrice($or['menuID'])*$or['quantity']),2); ?> <a href='javascript:void(0);' onClick="removeDBOrder(<?php echo $key; ?>)"><i class="fa fa-remove fa-fx w3-hover-text-red"></i></a> </span></li>
			<?php  $total=$total+getPrice($or['menuID'])*$or['quantity'];  }
			//  print_r($_SESSION['orders']);
			  if(isset($_SESSION['orders'])){
			  	foreach($_SESSION['orders'] as $key => $val){
			  		$order=explode(",",$val);
					
					if($order[2]==$_SESSION['table_num']){
			  ?>
              		<li> <span class="w3-badge"><?php echo $order[1]; ?> </span> <?php getMenu($order[0]); ?> <span class='w3-right'><?php echo number_format((getPrice($order[0])*$order[1]),2); ?> <a href='javascript:void(0);' onClick="removeOrder(<?php echo $key; ?>)"><i class="fa fa-remove fa-fx w3-hover-text-red"></i></a> </span></li>
              <?php $total=$total+getPrice($order[0])*$order[1]; } } }?>
			</ul>
             <hr>
            <div class="w3-left"><button class="w3-btn w3-purple" onClick="confirmOrder();" id="confirmOrderBtn" disabled>Confirm Orders</button></div><div class="w3-right w3-text-blue-gray">Total: Php <?php echo number_format($total,2); ?></div>