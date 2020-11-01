<?php 
session_start();
include "config.php";
    



    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);

    $sql="SELECT * FROM `user`
    WHERE  `email`='".$email."' 
    AND  `password`='".$password."' ";

   $query = mysqli_query($conn ,$sql);
   $result=mysqli_fetch_array($query);
                    
              if(!$result){
                echo "<script>";
                echo "alert(\" email หรือ  password ไม่ถูกต้อง\");"; 
                echo "window.location = '../login.php'; ";
                echo "</script>";
              }
              else {
                /*$_SESSION["username"] = $result["username"];
                 Header("Location: ../index.php");
              }
                mysqli_close($conn);*/
                    if($result["log_status"] =="1"){
                          echo "<script>";
                          echo "alert(\"'".$username."' มีผู้ใช้อื่น Login อยู่\");";
                          echo "window.location = '../login.html'";

                          echo "</script>";
                          //exit();
                  }
                    else{
                    //*** Update Status Login
                            $sql = "UPDATE `user` SET `status` = '1' , `last_login` = NOW() WHERE `email` = '".$result['email']."' ";
                            $query = mysqli_query($conn,$sql);
                        
                            //*** Session
                            $_SESSION['email'] = $result['email'];
                            session_write_close();

                            //*** Go to Main page
                            header("location: ../index.php");
                          }
    
            }

            mysqli_close($conn);

?>