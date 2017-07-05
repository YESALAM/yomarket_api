<?php         
               //$connect=mysqli_connect("localhost","","","",""); 
$connect=mysqli_connect("localhost","simptnhu","+d2n4?%KwE7!","simptnhu_yomarket","3306"); 
             
               $city = $_GET['city'];
          $type=$_GET['product'];
           

           if($city =="is NOT NULL" and $type!="is NOT NULL" )
           {
                   $sql = "SELECT * FROM `phonebook` WHERE `phonebook_product`= '$type' and `phonebook_city` $city;";
                   //echo "case 1";
                   }
           elseif($city !="is NOT NULL" and $type=="is NOT NULL")
           {
           
                   $sql = "SELECT * FROM `phonebook` WHERE `phonebook_product` $type and `phonebook_city` ='$city';";
                                    // echo "case 2";
           }
           elseif($city =="is NOT NULL" and $type=="is NOT NULL")      
           {
                   $sql = "SELECT * FROM `phonebook` WHERE `phonebook_product` $type and `phonebook_city` $city;";
                                     // echo "case 3";
           }
           else
                   $sql = "SELECT * FROM `phonebook` WHERE `phonebook_product`= '$type' and `phonebook_city`= '$city';";
                                     // echo "case 4";
                   
                    //  echo $sql;
           
           $result = mysqli_query($connect, $sql); 
		  


			$json_array = array();
			while($row = mysqli_fetch_assoc($result))  
           {  
                $json_array[] = $row;  
           }  
          
           echo json_encode(array("server response"=>$json_array));  
		   mysqli_close($connect)
?>  

 