<?php         
               //$connect=mysqli_connect("localhost","","","",""); 
$connect=mysqli_connect("localhost","simptnhu","+d2n4?%KwE7!","simptnhu_yomarket","3306"); 
             
           
           
           $sql = "SELECT * FROM cities ;"; 
           
           $result = mysqli_query($connect, $sql); 
		  
           //$check = mysqli_fetch_array($result); 

                if(! $result )
			{
				           echo json_encode(array("server response"=>'unsucesfull'));  
                                           die(mysqli_error($connect));
			}
			$json_array = array();
			while($row = mysqli_fetch_assoc($result))  
           {  
                $json_array[] = $row;  
           }  
          
           echo json_encode(array("server response"=>$json_array));  
		   mysqli_close($connect)
?>  

 