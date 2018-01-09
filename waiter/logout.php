<?php
session_start();
unset($_SESSION['ACCESS_TYPE']);
unset($_SESSION['ACCESS_ID']);
unset($_SESSION['old_data']);
header("location: ../");
die();
