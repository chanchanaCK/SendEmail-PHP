<?php
  session_start();
  include "process/config.php";
  
?>
<html>
    <head>
            <!-- Required meta tags -->
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
            <!-- Bootstrap CSS -->
            
<!-- Add icon library -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width,initial-scale=1">
            <script src='https://kit.fontawesome.com/a076d05399.js'></script>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">   
            <link rel="stylesheet" href="stylesheets/style.css">
            <link rel="stylesheet" href="css/style.css">
            <link href="css/bootstrap.min.css" rel="stylesheet">
            <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Send E-Mail Project.</a>
      
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link " ><?php echo $_SESSION['email'];?></a>
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

                <div class="container">
                    <div class="form-group">
                    <h2>Mail Sent</h2>
                         <div class="table-responsive" id="log_table">
                            <table class="table">
                                    <tr>
                                    <th><a class="column_sort" id="sendto" data-order="desc" href="#">Send To</a></th>
                                    <th><a class="column_sort" id="sendf" data-order="desc" href="#">Send From</a></th>
                                    <th><a class="column_sort" id="name" data-order="desc" href="#">Name</a></th>
                                    <th><a class="column_sort" id="subject" data-order="desc" href="#">Subject</a></th>
                                    <th><a class="column_sort" id="body" data-order="desc" href="#">Body</a></th>
                                    <th><a class="column_sort" id="files" data-order="desc" href="#">Date</a></th>
                                    <th></th>
                                    </tr>
                                <?php 
                                $sql = "SELECT * FROM `send` ORDER BY `date` DESC";
                                $result = mysqli_query($conn,$sql);
                                while ($data = mysqli_fetch_array($result)) {
                                ?>
                                    <tr>
                                        <td><?php echo $data['sendTo'];?></td>
                                        <td><?php echo $data['sendFrom'];?></td>
                                        <td><?php echo $data['name'];?></td>
                                        <td><?php echo $data['subject'];?></td>
                                        <td><?php echo $data['body'];?></td>
                                        <td><?php echo $data['date'];?></td>
                                        <td align='center'>
                                            <a href="sent/resend.php?id=<?php echo $data['id']?>" class="btn btn-success fa fa-edit"></a>
                                            <span class="delete btn btn-danger fa fa-trash" id="del_<?php echo $data['id']; ?>"></span>
                                        </td>
                                    </tr>
                                    
                                    <?php
                                }
                            ?>
                            </table>
                     </div>
                </div>
              </div>
              </div>                  
             
             <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    </body>
    <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script> 
    <script src="https://code.jquery.com/jquery-3.4.1.js"
                integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
                crossorigin="anonymous"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/96e6be60ac.js" crossorigin="anonymous"></script>
    <script>  
            $(document).ready(function(){  
                $(document).on('click', '.column_sort', function(){  
                    var column_name = $(this).attr("id");  
                    var order = $(this).data("order");  
                    var arrow = '';  
                    //glyphicon glyphicon-arrow-up  
                    //glyphicon glyphicon-arrow-down  
                    if(order == 'desc')  
                    {  
                            arrow = '&nbsp;<span class="fas fa-angle-down"></span>';  
                    }  
                    else  
                    {  
                            arrow = '&nbsp;<span class="fas fa-angle-up"></span>';  
                    }  
                    $.ajax({  
                            url:"sent/sortSent.php",  
                            method:"POST",  
                            data:{column_name:column_name, order:order},  
                            success:function(data)  
                            {  
                                $('#log_table').html(data);  
                                $('#'+column_name+'').append(arrow);  
                            }  
                    })  
                });  
            });  
    </script>
    
    <script>
        $(document).ready(function(){

// Delete 
                $('.delete').click(function(){
                var el = this;
                var id = this.id;
                var splitid = id.split("_");

                // Delete id
                var deleteid = splitid[1];

                // AJAX Request
                $.ajax({
                    url: 'sent/sent_process.php',
                    type: 'POST',
                    data: { id:deleteid },
                    success: function(response){

                    if(response == 1){
                    // Remove row from HTML Table
                    $(el).closest('tr').css('background','tomato');
                    $(el).closest('tr').fadeOut(800,function(){
                    $(this).remove();
                    });
                    }else{
                    alert('Invalid ID.');
                    }

                }
                });

                });

                });
    </script>
</html>
<?php
  
      
  
  mysqli_close($conn);
?>