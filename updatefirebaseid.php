<?php
               //$connect=mysqli_connect("localhost","","","","");
$connect=mysqli_connect("localhost","simptnhu","+d2n4?%KwE7!","simptnhu_yomarket","3306");

           $r_id = $_GET['r_id'];
          $d_id=$_GET['d_id'];

           $sql = "SELECT * FROM `firebaseid` WHERE r_id = '$r_id';";

           $result = mysqli_query($connect, $sql);

           $check = mysqli_fetch_array($result);



			if(isset($check)){
        //record exists update it
			    $sql_update = "UPDATE `firebaseid` SET `d_id`='$d_id' WHERE r_id = '$r_id'" ;
          $result = mysqli_query($connect,$sql_update);          

			}
			else{
        //new record insert it
			     $sql_insert = "INSERT INTO `firebaseid`(`r_id`, `d_id`) VALUES ('$r_id','$d_id')" ;
           $result = mysqli_query($connect,$sql_insert);
				}
		   mysqli_close($connect)

?>
