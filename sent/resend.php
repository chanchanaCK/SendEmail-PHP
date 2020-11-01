
<?php
include "../process/config.php";
session_start();

?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">    -->
    <link rel="stylesheet" href="../stylesheets/style.css">
    <link rel="stylesheet" href="../css/style.css">
    <!-- <script src="https://cdn.ckeditor.com/4.13.1/standard-all/ckeditor.js"></script> -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    
    <title>Send Mail</title>
    <style>
        /*.clearable{
        background: #fff url(http://i.stack.imgur.com/mJotv.gif) no-repeat right -20px center;
        border: 1px solid #999;
        padding: 3px 18px 3px 4px;      Use the same right padding (18) in jQ! 
        border-radius: 3px;
        transition: background 0.4s;
        }
        .clearable.onX{ cursor: pointer; }              /* (jQ) hover cursor style 
        .clearable::-ms-clear {display: none; width:0; height:0;} Remove IE default X*/

        .form-group.position-relative input {
            padding-right: 32px;
            }

            .form-clear {
            align-items: center;
            background: #cecece;
            border-radius: 50%;
            bottom: 8px;
            color: rgba(0, 0, 0, .54);
            cursor: pointer;
            display: flex;
            height: 20px;
            justify-content: center;
            position: absolute;
            right: 5px;
            width: 20px;
            z-index: 10;
            }

            .form-text+.form-clear {
            bottom: calc(1rem + 18px);
            }

            .form-clear .material-icons {
            font-size: 16px;
            font-weight: 500;
            }

        
</style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                 <li class="nav-item active">
                <a class="nav-link" href="../index.php">Send <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="../log.php">Log File</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="../sent.php">Mail Sent</a>
                </li>
            </ul>
            <ul class="nav justify-content-end">
                <li class="nav-item">
                <a class="nav-link" href="../process/logout.php">Log Out</a>
            </ul>
        </div>
      </nav>
             <div class="container" >
             
                <div class="row">
                    <div class="col-md-12 mt-5">
                     <div class="">
                          <div class="card-header"> Resend  </div>
                            <div class="card-body">
                            <?php 
                            $sql = "SELECT * FROM `send` WHERE `id` = '".$_GET["id"]."'";
                            $result = mysqli_query ($conn,$sql) or die (mysql_error ());
                            while ($row = mysqli_fetch_array ($result)){
                            ?>
                                <form id="fileUploadForm" method="post" action="../sendEmail.php" enctype="multipart/form-data">
                                
                                    <div>
                                        <select class="form-control " name="select">
                                            <option value="one"   data-toggle="collapse" href="" aria-expanded="false" >Send to one people</option>
                                            <option value="multi"  data-toggle="collapse" href="" aria-expanded="false" >Send to many people</option>
                                            <option value="spec"  data-toggle="collapse" href="" aria-expanded="false" >Send as specifically</option>
                                        </select>
                                            <div class="one box position-relative">
                                                <textarea  class="form-control " id="email" name="email" rows="3" value=""><?php echo $row['sendTo']; ?></textarea><br><br>
                                                <span class="form-clear d-none"><i class="material-icons">clear</i></span>
                                    </div> 
                                            <!-- <div class="multi box">
                                                <textarea class="form-control" rows="8"placeholder=""></textarea>
                                            </div>
                                            <div class="spec box">
                                                <textarea class="form-control" rows="8"placeholder=""></textarea>
                                            </div> -->
                                            <!-- <input class="clearable" type="button" id="clear" value="Clear"> -->
                                    </div><br>
                                        <div  class="form-group position-relative">
                                        <label >Send From</label><br>
                                                <input type="email"  class="form-control" id="sendf" name="sendf" placeholder=""value="<?php echo $row ['sendFrom']; ?>" >
                                                <span class="form-clear d-none"><i class="material-icons">clear</i></span>
                                        </div><br>
                                        <div class="form-group position-relative">
                                            <label >Name</label>
                                            <input type="text"  class="form-control" id="name"  name="name"placeholder="" value="<?php echo $row ['name']; ?>">
                                            <span class="form-clear d-none"><i class="material-icons">clear</i></span>
                                        </div><br>
                                        <div class="form-group position-relative">
                                                <label >Subject</label>
                                                    <input type="text"  class="form-control" name="subject"id="subject"  placeholder="" value="<?php echo $row ['subject']; ?>">
                                                    <span class="form-clear d-none"><i class="material-icons">clear</i></span>
                                        </div><br>
                                        <div class="form-group position-relative">
                                            <label >Massage</label>
                                                <textarea id="body" name="body"class="form-control" rows="7" placeholder=""value="<?php echo $row['body']; ?>"><?php echo $row['body']; ?></textarea><br><br>
                                                <span class="form-clear d-none"><i class="material-icons">clear</i></span>  
                                        </div><br>
                                        <div class="form-group">
                                        <!--  -->
                                            <input type="file" id="attachment" name="attachment[]" class="form-group "value="" onchange="getFile(event)" multiple>
                                            <!-- <input type="hidden" id="filedata" multiple> -->
                                            <div id="fileList">
                                            </div>
                                        </div><br><input class="form-group" type="checkbox" name="save" value="save"> Save Template<br>
                                        <!-- onclick="sendEmail()" -->
                                        <div class="form-group">
                                            <input onclick="sendEmail()" type="button" name="submit" id="submit" class="btn btn-primary btn-lg " value="Send">
                                        </div>
                                        <img id="output">
                                </form>
                            <?php } ?>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        <div class="loading" id="loading">
            <div class="body">
                <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
                    <div ><span id="result">0</span> / <span id="count_all"></span></div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script> 
        <script src="../ckeditor/ckeditor.js"></script> 
        <script src="https://code.jquery.com/jquery-3.4.1.js"
                integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
                crossorigin="anonymous"></script>

                </script>
        <script type="text/javascript">

        //$(document).ready(function () {
            function sendEmail() {
                
                //stop submit the form, we will post it manually.
                event.preventDefault();
                // Get form
                var form = $('#fileUploadForm')[0];
                for (instance in CKEDITOR.instances) 
                {
                    CKEDITOR.instances[instance].updateElement();
                }
                // Create an FormData object 
                var data = new FormData(form);
                // If you want to add an extra field for the FormData
                data.append("CustomField", "This is some extra data, testing");

                var email = $("#email").val();
                var countEmail = email.split("@");
                //----------------------------
                
                var body = CKEDITOR.instances.body.getData();
             
                // $( '#body' ).ckeditor();   // Use CKEDITOR.replace() if element is <textarea>.
                                //สร้างฟังชั่นสำหรับ ดึงข้อมูลจาก CKEDITOR แล้วยัดไปที่ textarea ที่เราต้องการ
                    
                // var body = CKEDITOR.instances['body'].getData();
                // $( '#body' ).html(body);
               // console.log(body);
                //-------------------------
                $('#count_all').text(countEmail.length-1);
                if (email.length == 0) {
                    $("#email").focus();
                    return false;}
                
                if (subject.length == 0) {
                    $("#subject").focus();
                    return false;}
                $("#loading").show();
                // disabled the submit button
                //$("#submit").prop("disabled", true);
                $.ajax({
                    type: 'POST',
                    enctype: 'multipart/form-data',
                    url: '../sendEmail.php',
                    data: data,body: body,
                    processData: false,
                    contentType: false,
                    cache: false,
                    timeout: 600000,
                    success: function (response) {
                         console.log(response);
                        // if (response.status == "success"){      
                            $("#loading").hide();
                            //alert("Mail Send!!");
                        //}
                    },error: function(err){
                        console.log(err);
                        $("#loading").hide();
                        alert("Fail!!");
                    },
                    // complete: function(){
                    //     $('#loading').hide();
                    // }
                    // success: function (data) {
                    //     $("#result").text(data);
                    //     console.log("SUCCESS : ", data);
                    //     $("#submit").prop("disabled", false);
                    // },
                    // error: function (e) {
                    //     $("#result").text(e.responseText);
                    //     console.log("ERROR : ", e);
                    //     $("#submit").prop("disabled", false);
                    // }
                });

            

            
            } 
            </script>
        
        <script>
    var getFile = function(event) {
                
                var input = document.getElementById('attachment');
                var output = document.getElementById('fileList');
                output.innerHTML = '<ul>';
                output.innerHTML = 'files =  ';
                for (var i = 0; i < input.files.length; ++i) {
                    output.innerHTML += input.files.item(i).name +'<br>';
                }
                output.innerHTML += '</ul>';
        
            // var input = event.target;
            // var reader = new FileReader();
            // reader.onload = function(){
            // var dataURL = reader.result;
            //  $('#attachment').val(dataURL);
            // var output = document.getElementById('output');
            // output.src = dataURL;
            // };
            // reader.readAsDataURL(input.files[0]);
        
          
                }
        </script>
        <script>
            function bootstrapClearButton() {
            $('.position-relative :input').on('keydown focus', function() {
                if ($(this).val().length > 0) {
                $(this).nextAll('.form-clear').removeClass('d-none');
                }
            }).on('keydown keyup blur', function() {
                if ($(this).val().length === 0) {
                $(this).nextAll('.form-clear').addClass('d-none');
                }
            });
            $('.form-clear').on('click', function() {
                $(this).addClass('d-none').prevAll(':input').val('');
            });
            }
            bootstrapClearButton();
        </script>
       
            <!-- <script>
                var input = document.querySelector('#clear');
                var textarea = document.querySelector('#email');

                input.addEventListener('click', function () {
                    textarea.value = '';
                }, false);
            </script> -->
    <script>
            $(document).ready(function(){
                $("select").change(function(){
                    $(this).find("option:selected").each(function(){
                        var optionValue = $(this).attr("value");
                        if(optionValue){
                            $(".box").not("." + optionValue).hide();
                            $("." + optionValue).show();
                        } else{
                            $(".box").hide();
                        }
                    });
                }).change();
            });
            </script>
    <script>
            $(document).ready(function(){
                $("select").change(function(){
                    $(this).find("option:selected").each(function(){
                        var optionValue = $(this).attr("value");
                        if(optionValue){
                            $(".box").not("." + optionValue).hide();
                            $("." + optionValue).show();
                        } else{
                            $(".box").hide();
                        }
                    });
                }).change();
            });
            </script>

            <script>
                CKEDITOR.replace( 'body', { 
                height: 250,
                filebrowserUploadUrl: '../ckeditor/ck_upload.php',
                filebrowserUploadMethod: 'form'
                
                
                });

            </script>
</body>
</html>
