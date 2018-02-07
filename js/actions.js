// JavaScript Document
function logmein(){
	var username=$("#username").val();
	var password=$("#password").val();
	
	if(username ==""){
		$("#loginFormCon").effect("shake");
		$("#loading_on_login").show().html("<div class='w3-panel w3-red w3-padding'>Enter a Username.</div>");
		setTimeout(function(){$("#loading_on_login").hide("slow");},2000);
		document.getElementById("username").focus();
		return false;
	}else if(password==""){
		$("#loginFormCon").effect("shake");
		$("#loading_on_login").show().html("<div class='w3-panel w3-red w3-padding'>Enter a Password.</div>");
		setTimeout(function(){$("#loading_on_login").hide("slow");},2000);
		document.getElementById("password").focus();
		return false;
	}else{
		var data="username="+username+"&password="+password;
		$.ajax({
			type: "POST",
			url: "include/actions.php",
			data: data,
			success: function(data){
				console.log(data);
				if(data == "1"){
					location="admin/";
				}else if(data == "2"){
					location="cashier/";
				}else if(data == "3"){
					location="cook/";
				}else if(data == "4"){
					location="waiter/";
				}
				else if(data=="ERROR"){
					$("#loginFormCon").effect("shake");
					$("#loading_on_login").show().html("<div class='w3-panel w3-red w3-padding'>ACCESS DENIED!</div>");
					setTimeout(function(){$("#loading_on_login").hide("slow");},2000);
					document.getElementById("password").focus();
				}
			}
		});
	}
}
///////////////////////////////
function addCategory(){
	var categoryName=$("#categoryname").val();
	if(categoryName==""){
		$("#alertMSG").show().html("<div class='w3-panel w3-red w3-padding'>Please enter Category Name.</div>");
		setTimeout(function(){$("#alertMSG").hide("slow");},2000);
		document.getElementById("categoryname").focus();
	}
	else{
		$.ajax({
			type: "POST",
			url: "../include/actions.php",
			data: "categoryName="+categoryName,
			success: function(data){
				console.log(data);
				if(data=="SUCCESS"){
					$("#alertMSG").show().html("<div class='w3-panel w3-green w3-padding'><b>SUCCESS!</b> Category Name has been added.</div>");
					setTimeout(function(){$("#alertMSG").hide("slow");},2000);
					setTimeout(function(){location.reload();},3000);
				}
			}
		});
	}
}
///////////////////////////////
function addMenu(){
	var menuname=$("#menuname").val();
	var catId=$("#catID").val();
	var menuprice=$("#menuprice").val();
	var menuimage=$("#menuimage").val();
}
///////////////////////////////
function addTable(){
	var tablenumber=$("#tablenumber").val();
	if(tablenumber==""){
		$("#alertMSG").show().html("<div class='w3-panel w3-red w3-padding'>Please enter Table Number.</div>");
		setTimeout(function(){$("#alertMSG").hide("slow");},2000);
		document.getElementById("tablenumber").focus();
	}else{
		$.ajax({
			type: "POST",
			url: "../include/actions.php",
			data: "tableNum="+tablenumber,
			success: function(data){
				console.log(data);
				if(data=="SUCCESS"){
					$("#alertMSG").show().html("<div class='w3-panel w3-green w3-padding'><b>SUCCESS!</b> Table Number has been added.</div>");
					setTimeout(function(){$("#alertMSG").hide("slow");},2000);
					setTimeout(function(){location.reload();},3000);
				}
			}
		});
	}
}
//////////////////////////////////
function addWaiter(){
	var name=$("#waitername").val();
	var surname=$("#waitersurname").val();
	var username=$("#waiterusername").val();
	var password=$("#waiterpassword").val();
	if(name==""){
		$("#alertMSG").show().html("<div class='w3-panel w3-red w3-padding'>Please enter Name of the waiter.</div>");
		setTimeout(function(){$("#alertMSG").hide("slow");},2000);
		document.getElementById("waitername").focus();
	}else if(surname==""){
		$("#alertMSG").show().html("<div class='w3-panel w3-red w3-padding'>Please enter Surname of the waiter.</div>");
		setTimeout(function(){$("#alertMSG").hide("slow");},2000);
		document.getElementById("waitersurname").focus();
	}else if(username==""){
		$("#alertMSG").show().html("<div class='w3-panel w3-red w3-padding'>Please enter Username.</div>");
		setTimeout(function(){$("#alertMSG").hide("slow");},2000);
		document.getElementById("waiterusername").focus();
	}else if(password==""){
		$("#alertMSG").show().html("<div class='w3-panel w3-red w3-padding'>Please enter Password.</div>");
		setTimeout(function(){$("#alertMSG").hide("slow");},2000);
		document.getElementById("waiterpassword").focus();
	}else{
		$.ajax({
			type: "POST",
			url: "../include/actions.php",
			data: "waitName="+name+"&waitSurname="+surname+"&waitUsername="+username+"&waitPassword="+password,
			success: function(data){
				console.log(data);
				if(data=="SUCCESS"){
					$("#alertMSG").show().html("<div class='w3-panel w3-green w3-padding'><b>SUCCESS!</b> Waiter has been added.</div>");
					setTimeout(function(){$("#alertMSG").hide("slow");},2000);
					setTimeout(function(){location.reload();},3000);
				}
			}
		});
	}
}



//adding menu
function add_menu(){
	var fd = new FormData();
	var cat_id = $('#catID').val();
	var menu_name = $('#menuname').val();
	var menu_price = $('#menuprice').val();
	fd.append('menu_cat_id',cat_id);
	fd.append('new_menu_name',menu_name);
	fd.append('menu_price',menu_price);

	
	$.ajax({
		url:"../include/actions.php",
		type:'post',
		cache:false,
		contentType:false,
		processData:false,
		data:fd,
		beforeSend:function(){
			
		},
		success:function(data){
			console.log(data);
			if(data=="SUCCESS"){
				$("#alertMSG").fadeIn('slow').html("<div class='w3-panel w3-green w3-padding'><b>SUCCESS!</b> Menu has been added.</div>");
				setTimeout(function(){$("#alertMSG").hide("fast");},2000);
				setTimeout(function(){location.reload();},3000);
			}else if(data == "DUPLICATE"){
				$("#alertMSG").fadeIn('slow').html("<div class='w3-panel w3-blue w3-padding'><b>DUPLICATE FOUND</b> Entry already exists in database.</div>");
				setTimeout(function(){$("#alertMSG").hide("fast");},2000);
				setTimeout(function(){location.reload();},3000);
			}else{
				$("#alertMSG").fadeIn('slow').html("<div class='w3-panel w3-red w3-padding'><b>ERROR!</b> Please try again.</div>");
				setTimeout(function(){$("#alertMSG").hide("fast");},2000);
				setTimeout(function(){location.reload();},3000);
			}
		}
	});

}
function deleteMenu(x){
	if(confirm("Do you want to delete this menu?")){
		$.ajax({
			type: "POST",
			url: "../include/actions.php",
			data: "delMenu="+x,
			success: function(data){
				console.log(data);
				if(data=="SUCCESS"){
					setTimeout(function(){$("#menu_"+x).hide("fast");},1000);
				}
			}
		});
	}
}
function edit_menu(x){
	var fd = new FormData();
	//var file_data = $('#menuimage'+x).get(0).files[0];
	var cat_id = $('#catID'+x).val();
	var menu_name = $('#menuname'+x).val();
	var menu_price = $('#menuprice'+x).val();
	//fd.append('editnew_menu_img',file_data);
	fd.append('editmenu_cat_id',cat_id);
	fd.append('editnew_menu_name',menu_name);
	fd.append('editmenu_price',menu_price);
	fd.append('id',x);

	
	$.ajax({
		url:"../include/actions.php",
		type:'post',
		cache:false,
		contentType:false,
		processData:false,
		data:fd,
		beforeSend:function(){
			
		},
		success:function(data){
			console.log(data);
			if(data=="SUCCESS"){
				$("#editMSG_"+x).fadeIn('slow').html("<div class='w3-panel w3-green w3-padding'><b>SUCCESS!</b> Menu has been edited.</div>");
				setTimeout(function(){$("#editMSG_"+x).hide("fast");},2000);
				//setTimeout(function(){location.reload();},3000);
			}else if(data == "DUPLICATE"){
				$("#editMSG_"+x).fadeIn('slow').html("<div class='w3-panel w3-blue w3-padding'><b>DUPLICATE FOUND</b> Entry already exists in database.</div>");
				setTimeout(function(){$("#editMSG_"+x).hide("fast");},2000);
				//setTimeout(function(){location.reload();},3000);
			}else{
				$("#editMSG_"+x).fadeIn('slow').html("<div class='w3-panel w3-red w3-padding'><b>ERROR!</b> Please try again.</div>");
				setTimeout(function(){$("#editMSG_"+x).hide("fast");},2000);
				//setTimeout(function(){location.reload();},3000);
			}
		}
	});

}
function setTable(){
	var table=$("#table_number").val();
	$.ajax({
			type: "POST",
			url: "../include/actions.php",
			data:"setTable="+table,
			success: function(data){
				console.log(data)
				 $.get("../include/orderID.php", function(data) { 
					$("#orderID").html(data); 
				}); 
				$.get("../include/orders.php", function(data) {
					$("#orderDiv").html(data); 
				});
				
				checkOrders();
			}
		});
}
function addOrder(id){
	//alert(id);
	var menu=$("#menu_id_"+id).val();
	var quantity=$("#quantity_"+id).val();
	var tableNum=$("#table_number").val();
	if(tableNum==""){
		alert("Select a Table Number");
		return false;
	}else{
		$.ajax({
			type: "POST",
			url: "../include/actions.php",
			data:"menu_id="+menu+"&quantity="+quantity+"&table_Num="+tableNum,
			success: function(data){
				//alert(data);
				console.log(data)
				$("#menu_"+id).hide();
				
				$.get("../include/orders.php", function(data) {
					$("#orderDiv").html(data);
					$("#confirmOrderBtn").removeAttr("disabled","disabled");
				});
				
			}
		});
	}
}
function removeOrder(x){
	 if(confirm("Do you want to remove this order?")){
	$.ajax({
			type: "POST",
			url: "../include/actions.php",
			data:"removeOrder="+x,
			success: function(data){
				location.reload();
			}
		});
	 }
}
function confirmOrder(){
	$.ajax({
			type: "POST",
			url: "../include/actions.php",
			data:"confirmOrder=true",
			success: function(data){
				//location.reload();
				console.log(data);
				$.get("../include/orders.php", function(data) {
					$("#orderDiv").html(data); 
				});
				$.get("../include/orderID.php", function(data) { 
					$("#orderID").html(data); 
				});
				checkOrders();
			}
		});
	 
}
function serveOrder(){  
           var served = [];
		   var orderID=$("#order_ID").val();
            $.each($("input[name='menuorder']:checked"), function(){            
                served.push($(this).val());
            });
           // alert("My favourite sports are: " + favorite.join(", "));
       $.ajax({
			type: "POST"  ,
			url:"../include/actions.php",
			data: "served="+served+"&orderID="+orderID,
			success: function(data){
				console.log(orderID);
				//location.reload();
			}
		});
}
function update() {
    $.get("../include/orders.php", function(data) {
					$("#orderDiv").html(data);
				});
    
}
function checkOrders() {
    $.get("../include/checkOrder.php", function(data) {
					//$("#orderDiv").html(data);
					console.log(data);
					if(data>=1){
						alert("Some Menu are ready to serve!");
						$.get("../include/orders.php", function(data) {
							$("#orderDiv").html(data);
						});
					}
				});
	window.setTimeout("checkOrders();", 15000);
    
}
function verifyOrder(x){
	var ids=$("#"+x+"_ids").val();
	var served = [];
            $.each($("input[name='"+x+"_statusOrder']:checked"), function(){            
                served.push($(this).val());
            });
	 $.ajax({
			type: "POST"  ,
			url:"../include/actions.php",
			data: "verify="+served+"&ids="+ids,
			success: function(data){
				console.log(data);
				location.reload();
				
			}
		});
}
function removeDBOrder(id){
	 $.ajax({
			type: "POST"  ,
			url:"../include/actions.php",
			data: "removeDBOrder="+id,
			success: function(data){
				console.log(data);
				$.get("../include/orders.php", function(data) {
					$("#orderDiv").html(data); 
				});
			}
		});
}
function orderPayment(){
	var orderID=$("#orderID").val();
	var amountPayment=$("#amountPayment").val();
	var total=$("#total").val();
	if(total > amountPayment){
		alert("Amount of Payment is insuficient.");
		return false;
	}else if(amountPayment > total){
		$("#message").show().html("<div class='w3-panel w3-green w3-padding'>Change: Php "+ (amountPayment-total) +"</div>");
		console.log(amountPayment-total);
		setTimeout(function(){$("#message").hide();},2000);
		setTimeout(function(){
			var tot=amountPayment-total;
			$.ajax({
				type: "POST",
				url: "../include/actions.php",
				data: "ordID="+orderID+"&payment="+total,
				success: function(data){
						if(data=="SUCCESS"){
						location="./";
						}
				}
			});
		},5000);
	}else{
		$.ajax({
			type: "POST",
			url: "../include/actions.php",
			data: "ordID="+orderID+"&payment="+amountPayment,
			success: function(data){
					if(data=="SUCCESS"){
					location="./";
					}
			}
		});
	}
}
function reportSearch(){
	var month=$("#month").val();
	var year = $("#year").val();
	
	$.ajax({
		type: "POST",
		url: "../include/actions.php",
		data: "month="+month+"&year="+year,
		success: function(data){
			console.log(data);
			$("#reportsresult").html(data);
		}
	});
}
function dailyReports(x){
	$.ajax({
		type: "POST",
		url: "../include/actions.php",
		data: "daily="+x,
		success: function(data){
			console.log(data);
			 $("#dailyReport").html(data);
		}
	});
}