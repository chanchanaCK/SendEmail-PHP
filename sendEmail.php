<?php
    session_start();
    set_time_limit(0);
    ini_set("memory_limit",-1);
    require_once "process/config.php";

         require_once "PHPMailer/PHPMailer.php";
         require_once "PHPMailer/SMTP.php";
         require_once "PHPMailer/Exception.php";
    //require "config/config.php";
     use PHPMailer\PHPMailer\PHPMailer;

     if(isset($_POST['action']) && $_POST['action'] == "send"){

        $GLOBALS["recipient"] = owlTrim($_POST['recipient']);
        $GLOBALS["senderName"] = owlTrim($_POST['senderName']);
        $GLOBALS["senderEmail"] = owlTrim($_POST['senderEmail']);

        $messageLetter = owlTrim($_POST['messageLetter']);
        $messageLetter = urlencode($messageLetter);
        $messageLetter = preg_replace("/%5C%22/", "%22", $messageLetter);
        $messageLetter = urldecode($messageLetter);
        $GLOBALS["messageLetter"] = stripslashes($messageLetter);

        $GLOBALS["check"] = owlTrim($_POST['check']);

        $messageSubject = owlTrim($_POST['messageSubject']);
        $GLOBALS["messageSubject"] = stripslashes($messageSubject);

        setSendingMethod();
        processEmailSendingRequest();


    }
    function setSendingMethod()
        {
            $mail = new PHPMailer;
            $mail->SMTPDebug = 0;
            $mail->CharSet = "UTF-8";
            $mail->IsSMTP();
            // $mail->Host = 'localhost';
            $mail->Host = gethostbyname("smtp.gmail.com");
            $mail->SMTPSecure = "tls";                   //tls or ssl
            $mail->Port = 587;                          //port 465
            $mail->Username = "xxxxxxxxx@gmail.com";   //mail
            $mail->Password = 'xxxxx';                //password
            $mail->SMTPAuth = true;
            $mail->SMTPKeepAlive = true;
            $mail->isHTML(true);
       }

         function processEmailSendingRequest(){


                    if(!is_email($GLOBALS["recipient"]))
                    exit("Incorrect Email");


                    $fromEmail = owlClear($GLOBALS["senderEmail"], $GLOBALS["recipient"]);
                    $fromName = owlClear($GLOBALS["senderName"], $GLOBALS["recipient"]);
                    $replyTo = owlClear($GLOBALS["replyTo"], $GLOBALS["recipient"]);
                    $recipient = $GLOBALS["recipient"];
                    $subject = owlClear($GLOBALS["messageSubject"], $GLOBALS["recipient"]);
                    $body = owlClear($GLOBALS["messageLetter"], $GLOBALS["recipient"]);
                    // $save = $GLOBALS["check"];

                    // print "<pre>";
                    // print_r($_POST);
                    // print "</pre>";

                    $mail = new PHPMailer();
                    $mail->SMTPDebug =0;
                    $mail->CharSet = "UTF-8";
                    $mail->IsSMTP();
                    // $mail->Host = 'localhost';
                    $mail->Host = "smtp.gmail.com";
                    $mail->SMTPSecure = "tls"; // ssl
                    $mail->Port = 587; //465
                    $mail->Username = "apich.ch12@gmail.com";
                    $mail->Password = 'likescan';
                    $mail->SMTPAuth = true;
                    $mail->SMTPKeepAlive = true;
                    $mail->isHTML(true);

                    $mail->setFrom($fromEmail, $fromName);

                    if(isset($subject) && $subject !== "")
                        $mail->Subject = $subject;

                    if(isset($body) && $body !== "")
                            $mail->Body =  $body;

                    if(isset($_FILES['attachment'])){
                        for($i=0; $i<count($_FILES['attachment']['name']); $i++) {
                                if ($_FILES['attachment']['tmp_name'][$i] != ""){
                                    $mail->AddAttachment($_FILES['attachment']['tmp_name'][$i],$_FILES['attachment']['name'][$i]);
                                }
                            }
                        }
                        // if(!empty($GLOBALS["save"])){
                        //     $sql = "INSERT INTO `send`(`id`, `sendTo`, `sendFrom`, `name`, `subject`, `body`, `files`,`date`)
                        //                      VALUES (NULL,'$recipient','$fromEmail','$fromName','$subject','$body',NULL,NOW())";
                        //             $result = mysqli_query($conn, $sql);
                        // }else{
                        //     echo $mail->ErrorInfo;
                        // }

                                    $log = $subject. "_" . date("d-m-Y");
                                    $inlog = "Date....=".date("d-m-Y")."\r\n"."send form.....".$fromEmail."\r\n"."to....".$recipient. "\r\n";
                        // if($mail->send()){
                                    file_put_contents($log,$inlog, FILE_APPEND);
                                    // $sql2 = "INSERT INTO `log` (`id`,`email`,`sender`,`subject`,`date`)
                                    //         VALUES (NULL,'$fromEmail','$fromName','$subject',NOW())";
                                    // $result = mysqli_query($conn, $sql2);




                    $mail->addAddress($recipient);
                    if (!$mail->send()) {
                        exit($mail->ErrorInfo);
                    }
                    else {
                         exit("OK");
                    }

                    $mail->clearAddresses();

        }



        // function saveAll(){
        //     if(!empty($GLOBALS["save"])){
        //         $sql = "INSERT INTO `send`(`id`, `sendTo`, `sendFrom`, `name`, `subject`, `body`, `files`,`date`)
        //                          VALUES (NULL,'$recipient','$fromEmail','$fromName','$subject','$body',NULL,NOW())";
        //                 $result = mysqli_query($conn, $sql);
        //     }else{
        //         echo $mail->ErrorInfo;
        //     }

        //     $log = $subject. "_" . date("d-m-Y");
        //                 $inlog = "Date....".date("d-m-Y")."\r\n"."send form.....".$fromEmail."\r\n"."to....".$recipient. ",";
        //                 file_put_contents($log,$inlog, FILE_APPEND);
        //                 $sql2 = "INSERT INTO `log` (`id`,`email`,`sender`,`subject`,`date`)
        //                         VALUES (NULL,'$mail->Username','$fromEmail','$subject',NOW())";
        //                 $result = mysqli_query($conn, $sql2);


        // }

        function owlTrim($string){
            return stripslashes(ltrim(rtrim($string)));
          }


        function owlClear($text,$email){
            $emailuser = preg_replace('/([^@]*).*/', '$1', $email);
            $text = str_replace("[-time-]", date("m/d/Y h:i:s a", time()), $text);
            $text = str_replace("[-email-]", $email, $text);
            $text = str_replace("[-emailuser-]", $emailuser, $text);
            $text = str_replace("[-randomletters-]", randString('abcdefghijklmnopqrstuvwxyz', 8, 15), $text);
            $text = str_replace("[-randomstring-]", randString('abcdefghijklmnopqrstuvwxyz0123456789', 8, 15), $text);
            $text = str_replace("[-randomnumber-]", randString('0123456789', 7, 15), $text);
            $text = str_replace("[-randommd5-]", md5(rand()), $text);
            return $text;
        }

        function randString($consonants, $min_length, $max_length) {
            $length=rand($min_length, $max_length);
            $password = '';
            for ($i = 0; $i < $length; $i++) {
                    $password .= $consonants[(rand() % strlen($consonants))];
            }
            return $password;
        }

        function is_email($input) {
          $email_pattern = "/^([a-zA-Z0-9\-\_\.]{1,})+@+([a-zA-Z0-9\-\_\.]{1,})+\.+([a-z]{2,4})$/i";
          if(preg_match($email_pattern, $input)) return TRUE;
        }



?>
