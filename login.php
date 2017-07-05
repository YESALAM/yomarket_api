<?php         
               //$connect=mysqli_connect("localhost","","","",""); 
$connect=mysqli_connect("localhost","simptnhu","+d2n4?%KwE7!","simptnhu_yomarket","3306"); 
             
           $id = $_GET['id'];
          $password=$_GET['password'];
           
           $sql = "SELECT * FROM register2 where register_email_address='$id' and register_password='$password';"; 
           
           $result = mysqli_query($connect, $sql); 
		  
           $check = mysqli_fetch_array($result); 

			if(isset($check)){
			echo json_encode(array("server response"=>'sucess'));
			}
			else{
			echo json_encode(array("server response"=>'failure'));
				}  
		   mysqli_close($connect)
?>  