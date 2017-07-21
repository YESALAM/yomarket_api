<?php
               //$connect=mysqli_connect("localhost","","","");
               $connect=mysqli_connect("localhost","simptnhu","+d2n4?%KwE7!","simptnhu_yomarket","3306");


            $id = $_GET['id'];

           $sql = "SELECT p.*,c.* FROM `post` AS p INNER JOIN comment_info AS c WHERE p.post_id = c.post_id and p.post_posted_by_id = '$id'";

           $result = mysqli_query($connect, $sql);
           /*while ($row = mysqli_fetch_row($result)) {
             foreach($row as $cname => $cvalue){
              print "$cname: $cvalue\t";
            }
              print "\r\n";
          }*/



			$json_array = array();
			while($row = mysqli_fetch_assoc($result))
           {
                $json_array[] = $row;
           }

           echo json_encode(array("server response"=>$json_array));
		   mysqli_close($connect)
?>
