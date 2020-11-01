
<?php  
 //sort.php  
 session_start();
include "../process/config.php";
 $output = '';  
 $order = $_POST["order"];  
 if($order == 'desc')  
 {  
      $order = 'asc';  
 }  
 else  
 {  
      $order = 'desc';  
 }  
 $sql = "SELECT * FROM `log` ORDER BY ".$_POST["column_name"]." ".$_POST["order"]."";  
 $result = mysqli_query($conn, $sql);
 $output .= '
        <table class="table">
            <tr>
            <th><a class="column_sort" id="email" data-order="'.$order.'" href="#">Sender</a></th>
            <th><a class="column_sort" id="subject" data-order="'.$order.'" href="#">Subject</a></th>
            <th><a class="column_sort" id="date" data-order="'.$order.'" href="#">Date</a></th>
            <th></th>
        </tr>  
        ';
        while ($data = mysqli_fetch_array($result)) {
            $output .= '
            <tr>
                <td>' . $data["email"] . '</td>
                <td>' . $data["subject"] . '</td>
                <td>' . $data["date"] . '</td>
                <td>
                <a onclick="return confirm(" Want to Delete ?")" class="btn btn-danger fa fa-trash"></a>
                </td>
            </tr>
            ';  
        }  
    $output .= '</table>';  
    echo $output;
    
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
            <link rel="stylesheet" href="../stylesheets/style.css">
    </head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script> 
 </html>
