<?php
session_start();
if(isset($_SESSION['ORDER_ID'])){
	echo $_SESSION['ORDER_ID'];
}