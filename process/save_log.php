<?php
session_start();
include "config.php";
if (isset($_GET['action']) && $_GET['action']=="insert") {
    $user = $_POST['user'];
    $subject = $_POST['subject'];
    $date_time = $_POST['date_time'];
    $size = $_POST['size'];


 
    $sql = "INSERT INTO `log` (`user`, `subject`, `date_time`= NOW(), `size`) 
                VALUES ('$user', '$subject', '$date_time', '$size')
                WHERE user = '".$user."' ";
    $result = mysqli_query($conn , $sql);
    /*if($result){
      echo "<script type='text/javascript'>";
      echo "alert('Insert Succesfuly');";
      echo "window.location = '../customer.php'; ";
      echo "</script>";
      }
      else{
      echo "<script type='text/javascript'>";
      echo "alert('Error!! back to Insert again');";
            echo "window.location = '../index.php'; ";
      echo "</script>";
    }*/
    header("location: ../index.php");

}
