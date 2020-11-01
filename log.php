<?php
    session_start();
    include "process/config.php";
    $sql = "SELECT * FROM `user` WHERE `status`=1";
    $result = mysqli_query($conn,$sql);

?>
<html>
    <head>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
            <!-- Bootstrap CSS -->
            
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width,initial-scale=1">
            <script src='https://kit.fontawesome.com/a076d05399.js'></script>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">      
            <link rel="stylesheet" href="stylesheets/style.css">
            <link rel="stylesheet" href="css/style.css">
            <link href="css/bootstrap.min.css" rel="stylesheet">
            <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
            
    <!-- Custom styles for this template -->
            
    </head>
    <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Send E-Mail Project.</a>
      
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" ><?php echo $_SESSION['email'];?></a>
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
                    <h2>Log</h2>
                         <div class="table-responsive" id="log_table">
                             
                             <table class="table" method="post">
                                    <?php 
                                    $sql = "SELECT * FROM `log` ORDER BY `date` DESC";
                                    $result = mysqli_query($conn,$sql);
                                    ?>
                                    <th><input type="checkbox" class="checkAl"> Select All
                                    <span id="" class="deleteAl btn btn-danger fa fa-trash" style="display:none"></span>
                                    </th>
                                    <th></th><th></th><th></th>
                                    <th><span id="" class="deleteAll btn btn-danger fa fa-trash" ></span></th>
                                    <tr>
                                    <th></th>
                                    <th><a class="column_sort" id="sender" data-order="desc" href="#">Sender</a></th>
                                    <th><a class="column_sort" id="subject" data-order="desc" href="#">Subject</a></th>
                                    <th><a class="column_sort" id="date" data-order="desc" href="#">Date</a></th>
                                    <th></th>
                                    </tr>
                                    <?php 
                                $i=0;
                                
                                while ($row = mysqli_fetch_array($result)) {
                                ?>

                                    <tr>
                                        <td><input type="checkbox" id="<?php echo $row["id"]; ?>" class="checkItem"  name="check[]" value="del_<?php echo $row["id"]; ?>"></td>
                                        
                                        <td><?php echo $row['sender'];?></td>
                                        <td><?php echo $row['subject'];?></td>
                                        <td><?php echo $row['date'];?></td>
                                        <td align='center'>
                                        <span class="delete btn btn-danger fa fa-trash" id="del_<?php echo $row['id']; ?>"></span>
                                        </td>
                                        <!-- <td>
                                        <a href="" name="delete" id="del_ echo $data['id']" class="btn btn-danger fa fa-trash"></a>
                                        </td> -->
                                        
                                    </tr>
                                    <?php
                                $i++;
                             }
                            ?>
                            </table>
                            <code id="demo"></code>
                     </div>
                </div>
              </div>
              </div>                  
             
             <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
             <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
        <!-- <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script> -->
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script> 
        <script src="https://code.jquery.com/jquery-3.4.1.js"
                integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
                crossorigin="anonymous"></script>
        <script src="dist/js/bootstrap.min.js"></script>
    
        <script src="https://kit.fontawesome.com/96e6be60ac.js" crossorigin="anonymous"></script>
    </body>
    
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
                            url:"log/sort.php",  
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
                        url: 'log/log_process.php',
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
    <script>
    
            $('.checkAl').click(function () {
                $('input:checkbox').not(this).prop('checked', this.checked);
                if(this.checked != true){
                        $('.checkItem').hide();
                    }
                else{
                        $('.checkItem').show();       
                }

            });
            $('.checkItem').click(function () {
                    if(this.checked != true){
                        $('.deleteAl').hide();
                    }
                else{
                        $('.deleteAl').show();       
                }
                
            });
                $('.checkAl').change(function() {
                if(this.checked != true){
                    $('.deleteAl').hide();
                }
            else{
                    $('.deleteAl').show();
            }
            });

            
    </script>
    <script>
    var gh=[];
        $('.chceckItem').on('change', 'input[type=checkbox]', function() {

    var id = $(this).val(); // this gives me null
    var index = gh.indexOf(id);
    
    // if($(this).is(':checked')){
    //     gh.push(id);
    //     document.getElementById("demo").innerHTML='['+gh+']';
    // }
    // else{
    //     if (index > -1) {
    //     gh.splice(index, 1);
    //     document.getElementById("demo").innerHTML='['+gh+']';
    //     }
    // }
                // var el = this;
                // var id = this.id;
                // var splitid = id.split("_");
                // // Delete id
                // var deleteid = splitid[1];
                // AJAX Request
         $('.deleteAll').click(function () {
                    $.ajax({
                        url: 'log/log_process.php',
                        type: 'POST',
                        data: { id:id },
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
    //console.log(gh);
    });
    </script>
</html>
<?php
  
      mysqli_close($conn);

?>