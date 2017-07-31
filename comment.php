<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'notify_comment.php' ;
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



                          //SELECT p.post_posted_by_id, f.d_id FROM post as p INNER JOIN firebaseid AS f WHERE f.r_id = p.post_posted_by_id AND post_id = $post_id ;
                          $sql = "SELECT DISTINCT F.d_id FROM `firebaseid` as F INNER JOIN `comment_info` as C WHERE C.comment_register_id = F.r_id and C.post_id = $post_id ;" ;
                          $sql .= "SELECT * FROM `post` WHERE post_id = '$post_id';" ;
                        $sql .= "INSERT INTO `comment_info`( `comment_user_name`, `comment_register_id`, `comment_contact_no`, `comment_date`, `comment_time`, `comment_city`, `comment_profession`, `comment`,`post_id`)
                        VALUES ('$comment_user_name','$comment_register_id','$comment_contact_no','$comment_date','$comment_time', '$comment_city','$comment_profession', '$comment','$post_id')";
			                  $resulst = mysqli_multi_query($connect,$sql);

                        if(! $resulst )
			{
				die('Could not enter data: ' . mysqli_error($connect));
			} else{


         /* store first result set */

         if ($result = mysqli_store_result($connect)) {
           //$row = mysqli_fetch_row($result);
           //foreach($row as $cname => $cvalue){
          //  print "$cname: $cvalue\t";
           //}
            $gcmRegIds = array();
           while ($row = mysqli_fetch_row($result)) {
             array_push($gcmRegIds, $row["0"]);
           }

           //$token = $row["1"];
           //echo $token;
           mysqli_free_result($result);

           mysqli_next_result($connect);
           $result = mysqli_store_result($connect);
           $row = mysqli_fetch_row($result);
           //foreach($row as $cname => $cvalue){
          //  print "$cname: $cvalue\t";
          // }

           $post_product = $row["1"];
           $post_city = $row["2"];
           $post_profession = $row["3"];
           $post_quantity = $row["4"];
           $post_price = $row["5"];
           $post_description = $row["6"];
           $post_posted_by_id = $row["7"];
           $post_posted_by = $row["8"];
           $post_image_1 = $row["9"];
           $post_image_2 = $row["10"];
           $post_image_3= $row["11"];
           $post_image_4 = $row["12"];


           //echo $post_product.$post_price.$post_image_4;

              $msg = array(
               'comment' 	=> $comment,
                'comment_user_name'	=> $comment_user_name." Commented on your post",
                 'post_id'	=> $post_id,
                 'post_product' => $post_product,
                 'post_city' 	=> $post_city,
                  'post_profession'	=> $post_profession,
                   'post_quantity'	=> $post_quantity,
                   'post_price' => $post_price,
                   'post_description' 	=> $post_description,
                    'post_posted_by_id'	=> $post_posted_by_id,
                     'post_posted_by'	=> $post_posted_by,
                     'post_image_1' => $post_image_1,
                     'post_image_2' 	=> $post_image_2,
                      'post_image_3'	=> $post_image_3,
                       'post_image_4'	=> $post_image_4
                             );

             //echo $msg;
                              //print_r(array_values($msg));



                notifythem($gcmRegIds,$msg);

         /* while ($row = mysqli_fetch_row($result)) {
            foreach($row as $cname => $cvalue){
             print "$cname: $cvalue\t";
            }
             print "\r\n"; */


              //notifythem($token,$comment_user_name,$comment);
              mysqli_free_result($result);




             }



         }
         /* print divider */
         if (mysqli_more_results($connect)) {
             //printf("-----------------\n");

         }







			echo json_encode(array("server response"=>'comment sucessfull'));




		   mysqli_close($connect);
?>
