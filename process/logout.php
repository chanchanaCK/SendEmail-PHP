<?php
session_start();
include "config.php";
//*** Update Status
$sql = "UPDATE `user` SET `status` = '0' WHERE email = '".$_SESSION["email"]."' ";
$query = mysqli_query($conn,$sql);

session_destroy();

header("Location: ../login.php");	
?>