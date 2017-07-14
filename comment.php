<?php


include 'notify_them.php' ;
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
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



                          $sql = "SELECT p.post_posted_by_id, f.d_id FROM post as p INNER JOIN firebaseid AS f WHERE f.r_id = p.post_posted_by_id AND post_id = $post_id ;" ;
                        $sql .= "INSERT INTO `comment_info`( `comment_user_name`, `comment_register_id`, `comment_contact_no`, `comment_date`, `comment_time`, `comment_city`, `comment_profession`, `comment`,`post_id`)
                        VALUES ('$comment_user_name','$comment_register_id','$comment_contact_no','$comment_date','$comment_time', '$comment_city','$comment_profession', '$comment','$post_id')";
			                  $resulst = mysqli_multi_query($connect,$sql);

                        if(! $resulst )
			{
				die('Could not enter data: ' . mysqli_error($connect));
			} else{
        do {
       /* store first result set */
       if ($result = mysqli_store_result($connect)) {
           while ($row = mysqli_fetch_row($result)) {
             //foreach($row as $cname => $cvalue){
            //   print "$cname: $cvalue\t";
            // }
            //  print "\r\n";
              $token = $row["1"];
               //echo $token;
               notifythem($token,$comment_user_name,$comment);
           }
           mysqli_free_result($result);
           break;

       }
       /* print divider */
       if (mysqli_more_results($connect)) {
           //printf("-----------------\n");

       }
     } while (mysqli_next_result($connect));





			}

			echo json_encode(array("server response"=>'comment sucessfull'));




		   mysqli_close($connect)
?>
