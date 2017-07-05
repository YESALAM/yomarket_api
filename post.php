<?php         
               //$connect=mysqli_connect("localhost","","","",""); 
$connect=mysqli_connect("localhost","simptnhu","+d2n4?%KwE7!","simptnhu_yomarket","3306"); 

           
                   $product = $_GET['product'];
		   $profession=$_GET['profession'];
		   $city=$_GET['city'];
		   $quantity = $_GET['quantity'];
		   $price = $_GET['price'];
                   $discription = $_GET['discription'];
                   $post_id = $_GET['post_id'];
		   
           
                        $sql1 = "INSERT INTO `post`( `post_product`, `post_city`, `post_profession`, `post_quantity`, `post_price`, `post_description`, `post_id`)
                        VALUES (' $product','$city','$profession','$quantity','$price','$discription','$post_id')";	

			$resulst = mysqli_query($connect,$sql1); 
			if(! $resulst )
			{
				die('Could not enter data: ' . mysql_error());
			}

			echo json_encode(array("server response"=>'post sucessfull'));
		  

	
		   mysqli_close($connect)
?>  
