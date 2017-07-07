<?php         
              //$connect=mysqli_connect("localhost","","","",""); 
$connect=mysqli_connect("localhost","simptnhu","+d2n4?%KwE7!","simptnhu_yomarket","3306"); 
			  

           $comment_user_name = $_GET['name'];
		   $comment_register_id=$_GET['id'];
		   $comment_contact_no=$_GET['phone'];
		   $comment_date = $_GET['date'];
		   $comment_time = $_GET['time'];
           $comment_city=$_GET['city'];
           $comment_profession = $_GET['profession'];
           $comment = $_GET['comment'];
           $post_id = $_GET['post_id'];
                   
		

                        $sql1 = "INSERT INTO `comment_info`( `comment_user_name`, `comment_register_id`, `comment_contact_no`, `comment_date`, `comment_time`, `comment_city`, `comment_profession`, `comment`,`post_id`) 
                        VALUES ('$comment_user_name','$comment_register_id','$comment_contact_no','$comment_date','$comment_time', '$comment_city','$comment_profession', '$comment','$post_id')";	
			$resulst = mysqli_query($connect,$sql1); 
			
                        if(! $resulst )
			{
				die('Could not enter data: ' . mysqli_error($connect));
			}

			echo json_encode(array("server response"=>'comment sucessfull'));
		  

	
		   mysqli_close($connect)
?>  
