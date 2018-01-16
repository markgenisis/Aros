<?php
include "../include/dbconn.php";
$total=0;
?><link rel="stylesheet" href="../css/w3.css">
<html>
<body style="width:400px;" onLoad="window.print();"> 
 <table class="w3-table w3-white" style="font-size:12px; width:400px; border:1px solid;">
<tr>
  <th width="5%">Qty</th>
  <th  width="60%">Menu</th>
  <th class=" ">Price</th>
  
</tr>

             
            <?php $sql=$mysqli->query("select * from orders where tableID='{$_GET['billout']}' and paid='0' and status='1'");
			while($row=mysqli_fetch_assoc($sql)){
			 ?>
           <tr>
           <td><?php echo $row['quantity']; ?> </td>
           <td> <?php getMenu($row['menuID']); ?></td>
           <td> <span class='w3-right'><?php echo number_format((getPrice($row['menuID'])*$row['quantity']),2); ?></span></td>
           <!-- <td> <span ><img src="../images/<?php echo getStatus($row['status']); ?>" width="25"></span></td> -->
            <?php $total+= (getPrice($row['menuID'])*$row['quantity']);} ?>
            
            </tr>
         <?php //} ?>  
        
</table>
 <hr>
            <div class="w3-right w3-text-blue-gray">Total: Php <?php echo number_format($total,2); ?></div>
            </body>