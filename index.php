<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <link rel="stylesheet" href="stylesheets/style.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   
     <link href="css/bootstrap.min.css" rel="stylesheet">
     <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <title>Send Mail</title>
</head>

<body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Send E-Mail Project.</a>
      
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link " ></a>
          </li>
      </ul>
          <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="process/logout.php">Logout</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="index.php">
                  <span class="far fa-envelope"></span>
                  E-mail 
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                <span class="far fa-comment-dots"></span>
                  SMS
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="log.php">
                  <span class="fas fa-file-signature"></span>
                  Log File
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="sent.php">
                  <span class="far fa-paper-plane"></span>
                  Mail Send 
                </a>
              </li>
              
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">New Message</h1>
          </div>

            <div class="container" >
                <div class="row">
                    <div class="col-md-12 mt-5">
                            <div class="card-body">
                                <form >
                                        <div  class="form-group position-relative">
                                        <span><i class="fas fa-user"></i>
                                        <h5>Send From</h5><br></span>
                                                <input type="email"  class="form-control" id="senderEmail" name="senderEmail" placeholder="Your Email" required>
                                                <span class="form-clear d-none"><i class="material-icons">clear</i></span>
                                        </div>
                                        <div class="form-group position-relative">
                                            <span><i class="fas fa-user"></i>
                                            <h5>Sender Name</h5></span>
                                            <input type="text"  class="form-control" id="senderName"  name="senderName"placeholder="Your Name" required>
                                            <span class="form-clear d-none"><i class="material-icons">clear</i></span>
                                        </div>
                                        <div>
                                            <div class="form-group position-relative">
                                            <span><i class="fas fa-paper-plane"></i>
                                            <h5>Send To</h5></span>
                                                <textarea  class="form-control " id="sendTo" name="sendTo" rows="3"placeholder="" required ></textarea><br><br>
                                                <span class="form-clear d-none"><i class="material-icons">clear</i></span>
                                            </div>
                                        </div>
                                        <div class="form-group position-relative">
                                        <span><i class="fab fa-stripe-s"></i>
                                                <h5>Subject</h5></span>
                                                    <input type="text"  class="form-control" name="subject"id="subject"  placeholder="Subject" required>
                                                    <span class="form-clear d-none"><i class="material-icons">clear</i></span>
                                        </div>
                                        <div class="form-group position-relative">
                                        <i class="fas fa-align-right"></i>
                                            <h5>Massage</h5>
                                                <textarea id="message" name="message"class="form-control" rows="7" placeholder="Massage" required></textarea><br><br>
                                                <span class="form-clear d-none"><i class="material-icons">clear</i></span>  
                                        </div>
                                        <div class="form-group ">
                                        <i class="fas fa-folder-plus"></i>
                                            <input type="file" id="attachment" name="attachment[]" class="form-group " onchange="getFile(event)" multiple>
                                            <div id="fileList">
                                            </div>
                                        </div><input class="form-group" type="checkbox" name="check" id="check" value="save"> Save Template<br>
                                        
                                </form>
                                         <img id="output">
                                </div>
                            </div>
                        </div>
                                    
                                    <div class="form-group">
                                        <input data-toggle="modal"  data-target="#myModal" data-backdrop="static" data-keyboard="false" onclick="startSending()" type="button"  id="btnStart" class="btn btn-primary btn-lg " value="Send">
                                    </div>
                            
                             <!-- Modal -->
                        <div class="container" >
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog" role="document">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                <h4 class="modal-title">Status</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                
                                <div id="progress"class="col-lg-15"></div>
                                </div>
                                <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                                <input onclick="stopSending()"  type="button" id="btnStop" class="btn btn-primary btn-lg " value="Stop">
                                </div>
                            </div>
                            
                            </div>
                            </div>
                        </div>
                        
                    
                        <!-- <div id="progress" class="row">
                        </div> -->
                </div>
           
        <div class="loading" id="loading">
            <div class="message">
                <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
                    <div ><span id="result">0</span> / <span id="count_all"></span></div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <!-- <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script> -->
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script> 
        <script src="ckeditor/ckeditor.js"></script> 
        <script src="https://code.jquery.com/jquery-3.4.1.js"
                integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
                crossorigin="anonymous"></script>
        <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="https://kit.fontawesome.com/96e6be60ac.js" crossorigin="anonymous"></script>
       <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> -->
        
            <script>
                var running = false;
                var request;
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
                CKEDITOR.replace( 'message', { 
                height: 200,
                filebrowserUploadUrl: 'ckeditor/ck_upload.php',
                filebrowserUploadMethod: 'form'
                });

            </script>
            
            <script>
             Array.prototype.randomElement = function () {
            return this[Math.floor(Math.random() * this.length)]
            }
                function stopSending(){
                            running = false;

                            if (request) {
                                request.abort();
                            }

                            $("#btnStart").attr("disabled", false);
                            $("#btnStop").attr("disabled", true);
                }

                function handleSendingResponse(recipient, response, processedCount, totalEmailCount) {
                    $("#progress").append('<div class="col-6 col-sm-4 text-right">' + processedCount.toString() + '/' + totalEmailCount.toString() + '</div><div class="col-6 col-sm-4 text-center">' + recipient + '</div>');

                    if (response == "OK"){
                        $("#progress").append('<div class="col-6 col-sm-4"><span class="badge badge-success">Success</span></div>');
                    }
                    else if(response == "Incorrect Email"){
                        $("#progress").append('<div class="col-6 col-sm-4"><span class="badge badge-danger">Sent Fail !</span></div>');
                    } else {
                        $("#progress").append('<div class="col-6 col-sm-4"><span class="badge badge-warning">' + response + '</span></div>');
                    }
                    $("#progress").append('<br>');
                    }

                function startSending() {
                    // event.preventDefault();
                // Get form
                    // var form = $('#fileUploadForm')[0];
                    var eMailTextArea = document.getElementById("sendTo");
                    var eMailTextAreaLines = eMailTextArea.value.split("\n");

                    for (instance in CKEDITOR.instances){
                        CKEDITOR.instances[instance].updateElement();
                    }
                    
                    var form_data = new FormData();
                    form_data.append("action", "send");
                   
                    form_data.append("senderEmail", document.getElementById('senderEmail').value);
                    form_data.append("senderName", document.getElementById('senderName').value);
                    //form_data.append("replyTo", document.getElementById('replyTo').value);
                    form_data.append("messageSubject", document.getElementById('subject').value);
                    form_data.append("messageLetter", document.getElementById('message').value);
                    
                    
                    // form_data.append("check", document.querySelector('input[name="check"]:checked').value);
                    var input = document.getElementById('check');
                    var inputVal = "";
                    if (!input) {
                        inputVal = input.value;
                    }
                    form_data.append("check", inputVal);
                    

                    for (var x = 0; x < document.getElementById('attachment').files.length; x++) {
                        form_data.append("attachment[]", document.getElementById('attachment').files[x]);
                    }

                   
                    $("#progress").empty();
                    var processedCount = 0;
                    $(function () {
                    var i = 0;
                    running = true;

                    $("#btnStart").attr("disabled", true);
                    $("#btnStop").attr("disabled", false);

                    function nextCall() {
                        if (i == eMailTextAreaLines.length){

                        $("#btnStart").attr("disabled", false);
                        $("#btnStop").attr("disabled", true);
                        return;
                        }

                        if (request){
                            request.abort();
                        }
                        if(!running){
                            return;
                        }

                        var recipient = eMailTextAreaLines[i++]
                        form_data.append("recipient", recipient);
                        
                        // form_data.append("save",saveTem)

                        request = $.ajax({
                        
                        url:'sendEmail.php',
                        type: 'post',
                        data: form_data,
                            
                        contentType: false,
                        processData: false,
                        });

                        request.done(function (response, textStatus, jqXHR) {
                        processedCount += 1;
                        handleSendingResponse(recipient, response, processedCount, eMailTextAreaLines.length);
                        nextCall();
                        });
                    }
                    nextCall();
                    });
                    }
            </script>
            <script>
                $("#btnStart").attr("disabled", false);
                $("#btnStop").attr("disabled", true);
            </script>
    
</body>
<footer></footer>
</html>