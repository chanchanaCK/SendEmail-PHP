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
 $sql = "SELECT * FROM `send` ORDER BY ".$_POST["column_name"]." ".$_POST["order"].""; 
// $mysqli->query() or die ( $mysqli->error );
 $result = mysqli_query($conn, $sql);
 
 

 $output .= '
        <table class="table">
            <tr>
            <th><a class="column_sort" id="sendto" data-order="'.$order.'" href="#">Send To</a></th>
            <th><a class="column_sort" id="sendf" data-order="'.$order.'" href="#">Send From</a></th>
            <th><a class="column_sort" id="name" data-order="'.$order.'" href="#">Name</a></th>
            <th><a class="column_sort" id="subject" data-order="'.$order.'" href="#">Subject</a></th>
            <th><a class="column_sort" id="body" data-order="'.$order.'" href="#">Body</a></th>
            <th><a class="column_sort" id="filess" data-order="'.$order.'" href="#">Files</a></th>
            <th></th> 
        </tr>  
        ';
        while ($data = mysqli_fetch_array($result)) {
            $output .= '
            <tr>
                <td>' . $data["sendTo"] . '</td>
                <td>' . $data["sendFrom"] . '</td>
                <td>' . $data["name"] . '</td>
                <td>' . $data["subject"] . '</td>
                <td>' . $data["body"] . '</td>
                <td>' . $data["filess"] . '</td>
                <td>
                    <a href="sent/resend.php?id= echo $data["id"] " class="btn btn-success fa fa-edit"></a>
                    <a href="" onclick="return confirm( Want to Delete ?)" class="btn btn-danger fa fa-trash"></a>
                </td>
            </tr>
            ';  
        }  
    $output .= '</table>';
    
    echo $output;
?>