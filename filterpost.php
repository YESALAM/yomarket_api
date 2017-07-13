<?php
               //$connect=mysqli_connect("localhost","","","","");
               $connect=mysqli_connect("localhost","simptnhu","+d2n4?%KwE7!","simptnhu_yomarket","3306");

               if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

          $product = $_GET['product'];
          $profession=$_GET['profession'];



         if($product == "All" and $profession == "All"){
          $sql = "SELECT ps.*,rs.register_mobile_no FROM `post` AS ps INNER JOIN `register2` AS rs WHERE ps.post_posted_by_id = rs.register_id ;" ;
        }elseif ($product == "All") {
           $sql = "SELECT ps.*,rs.register_mobile_no FROM `post` AS ps INNER JOIN `register2` AS rs WHERE ps.post_posted_by_id = rs.register_id AND ps.post_profession = '$profession' ;";
         }elseif ($profession == "All") {
           $sql = "SELECT ps.*,rs.register_mobile_no FROM `post` AS ps INNER JOIN `register2` AS rs WHERE ps.post_posted_by_id = rs.register_id AND ps.post_product = '$product' ;" ;
         }else {
            $sql = "SELECT ps.*,rs.register_mobile_no FROM `post` AS ps INNER JOIN `register2` AS rs WHERE ps.post_posted_by_id = rs.register_id AND ps.post_product = '$product' AND ps.post_profession = '$profession' ;";
         }

                    // echo $sql;

                     $result = mysqli_query($connect, $sql);



                     $json_array = array();
                     while($row = mysqli_fetch_assoc($result))
                          {
                               $json_array[] = $row;
                          }

                          echo json_encode(array("server response"=>$json_array));
                      mysqli_close($connect)
?>
