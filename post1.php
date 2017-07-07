<?php         
        if($_SERVER['REQUEST_METHOD']=='POST'){ 
        
               //$connect=mysqli_connect("localhost","","","",""); 
          $connect=mysqli_connect("localhost","simptnhu","+d2n4?%KwE7!","simptnhu_yomarket","3306"); 

                   $postid=$_POST['post_id'];
                   $product = $_POST['product'];
		   $profession=$_POST['profession'];
		   $city=$_POST['city'];
                   $postname=$_POST['name'];
		   $quantity = $_POST['quantity'];
		   $price = $_POST['price'];
                   $discription = $_POST['discription'];
		   $image1 = $_POST['image1'];
                   $image2 = $_POST['image2'];
                   $image3 = $_POST['image3'];
                   $image4 = $_POST['image4'];
                   
                 $filename=0;
                  
                 $sql = "SELECT max(post_id) as id FROM post";
               //  $result = mysqli_fetch_array($conn,$sql);
                 $res = mysqli_query($connect,$sql);
 
                 while($row = mysqli_fetch_array($res)){
                 $filename = ++$row['id'];
                         }
              
                 
                  $path="./documents/post/".$filename;
           

                  mkdir($path, 0777, true);
                  $i1 = "1" ;
                  $i2 = "2" ;
                  $i3 = "3" ;
                  $i4 = "4" ;


                  file_put_contents("$path/1.jpg",base64_decode($image1));
                  if(strcmp($image2, "null")==0){
                      $i2 = "null" ;
                  }else{                    
                    file_put_contents("$path/2.jpg",base64_decode($image2));
                  }

                  if(strcmp($image3, "null")==0){
                    $i3 = "null" ;
                  }else{
                    file_put_contents("$path/3.jpg",base64_decode($image3));
                  }

                  if(strcmp($image4, "null")==0){
                    $i4 = "null" ;
                  }else{
                    file_put_contents("$path/4.jpg",base64_decode($image4));
                  }

                   
                    
                     
                 
                        $sql1 = "INSERT INTO `post`(`post_posted_by_id`,`post_posted_by`, `post_product`, `post_city`, `post_profession`, `post_quantity`, `post_price`,
                        `post_description`,`post_image_1`,`post_image_2`,`post_image_3`,`post_image_4`)
                        VALUES ('$postid','$postname','$product','$city','$profession','$quantity','$price','$discription','$i1','$i2','$i3','$i4')";	

			$resulst = mysqli_query($connect,$sql1); 
			if(! $resulst )
			{
				die('Could not enter data in post : ' . mysql_error());
			}
                        
                        
			echo json_encode(array("server response"=>'post sucessfull'));
		  

	
		   mysqli_close($connect);
                   }
                   else
                   {
                   echo "error";
                   }
?>  
