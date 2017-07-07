<?php         
               //$connect=mysqli_connect("localhost","","","",""); 
$connect=mysqli_connect("localhost","simptnhu","+d2n4?%KwE7!","simptnhu_yomarket","3306"); 
             
               $product = $_GET['product'];
          $profession=$_GET['profession'];
           

           if($product !="is NOT NULL" and $profession=="is NOT NULL" )
           {
                   $sql = "SELECT * FROM `post` WHERE `post_product`= '$product' and `post_profession` $profession;";
                   //echo "case 1";
                   }
           elseif($product =="is NOT NULL" and $profession!="is NOT NULL")
           {
           
                   $sql = "SELECT * FROM `post` WHERE `post_product` $product and `post_profession` ='$profession';";
                                     //echo "case 2";
           }
           elseif($product =="is NOT NULL" and $profession=="is NOT NULL")      
           {
                   $sql = "SELECT * FROM `post` WHERE `post_product` $product and `post_profession` $profession;";
                                      //echo "case 3";
           }
           else
                   $sql = "SELECT * FROM `post` WHERE `post_product`= '$product' and `post_profession`= '$profession';";
                                     // echo "case 4";
                   
                      //echo $sql;
           
           $result = mysqli_query($connect, $sql); 
		  


			$json_array = array();
			while($row = mysqli_fetch_assoc($result))  
           {  
                $json_array[] = $row;  
           }  
          
           echo json_encode(array("server response"=>$json_array));  
		   mysqli_close($connect)
?>  

 