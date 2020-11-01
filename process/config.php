<?php
  ini_set('display_errors', 1);
	error_reporting(~0);

  $conn = mysqli_connect("localhost","root","","test") or die("error: " . mysqli_error($conn));
  mysqli_set_charset($conn , "utf8");
  error_reporting(error_reporting() & ~E_NOTICE );
  date_default_timezone_set('Asia/Bankok');
  if (!$conn) {
    die('Could not connect !<br />Please contact the site\'s administrator.');
    };
  


  //*** Reject user not online
	$rejectTime = 5; // Minute
	$sql2 = "UPDATE `user` SET `status` = '0'
          WHERE 1 AND DATE_ADD(login_time, INTERVAL $rejectTime MINUTE) <= NOW() ";
  $query = mysqli_query($conn,$sql2); 

?>