<?php
               //$connect=mysqli_connect("localhost","","","","");
$connect=mysqli_connect("localhost","simptnhu","+d2n4?%KwE7!","simptnhu_yomarket","3306");

          $sql = "SELECT * FROM `register2`" ;
                    //echo $sql;

                    $result = mysqli_query($connect, $sql);



         			$json_array = array();
         			while($row = mysqli_fetch_assoc($result))
                    {
                         $json_array[] = $row;
                    }

                    echo json_encode(array("server response"=>$json_array));
         		   mysqli_close($connect);
?>
