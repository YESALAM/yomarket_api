<?php
              // $connect=mysqli_connect("localhost","","","");
               $conn=mysqli_connect("localhost","simptnhu","+d2n4?%KwE7!","simptnhu_yomarket","3306");

           if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

           //$sql = "SELECT * FROM post ;";
           $sql = "SELECT ps.*,rs.register_mobile_no FROM `post` AS ps INNER JOIN `register2` AS rs WHERE ps.post_posted_by_id = rs.register_id;";

           $result = mysqli_query($conn, $sql);
		       //echo "Mera nam  ".gettype($result);
           //$check = mysqli_fetch_array($result);

			$json_array = array();
			while($row = mysqli_fetch_assoc($result))
           {
                $json_array[] = $row;
           }

           echo json_encode(array("server response"=>$json_array));
		   mysqli_close($conn)
?>
