<?php         
               //$connect=mysqli_connect("localhost","","","",""); 
$connect=mysqli_connect("localhost","simptnhu","+d2n4?%KwE7!","simptnhu_yomarket","3306"); 
             
           $id = $_GET['id'];
          $password=$_GET['password'];
           
           $sql = "SELECT * FROM register2 where register_email_address='$id' and register_password='$password';"; 
           
           $result = mysqli_query($connect, $sql); 
	  
          $json_array = array();
			while($row = mysqli_fetch_assoc($result))  
           {  
                $json_array[] = $row;  
           }  
          
           echo json_encode(array("server response"=>$json_array));  
		  
	
		   mysqli_close($connect)
?>  