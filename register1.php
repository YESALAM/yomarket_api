<?php         
    error_reporting(E_ERROR | E_PARSE);
    if($_SERVER['REQUEST_METHOD']=='POST'){      
               //$connect=mysqli_connect("localhost","","","");
               $connect=mysqli_connect("localhost","simptnhu","+d2n4?%KwE7!","simptnhu_yomarket","3306");  
               $conn=mysqli_connect("localhost","simptnhu","+d2n4?%KwE7!","simptnhu_yomarket","3306"); 
         
           $register_name = $_POST['name'];
           $register_email_address = $_POST['email'];
           $register_password = $_POST['password'];  
           $register_mobile_no = $_POST['mobile_no'];
           $register_firm_name = $_POST['firm_name'];
           $register_profession_type = $_POST['profession_type'];
           $register_product = $_POST['product'];
           $register_country = $_POST['country'];
           $register_state = $_POST['state'];
           $register_city_type = $_POST['city'];    
           $image = $_POST['image'];
           
           $filename="";
                  
                 $sql = "SELECT max(register_id) as id FROM register2";
                 $result = mysqli_fetch_array(mysqli_query($conn,$sql));
 
                 mysqli_close($conn);
                 if($result['id']==null)
                 $filename= 1; 
                 else 
                 $filename = ++$result['id']; 
           
            $imagename="".$filename.".jpg";          
                 
           $binary=base64_decode($image);
           
          // $source = imagecreatefromstring($binary);
       // $rotate = imagerotate($source, $angle, 0); // if want to rotate the image
       
          $path="./documents/register/".$filename;
          $path1="./documents/phonebook/".$filename;

          mkdir($path, 0777, true);
                    mkdir($path1, 0777, true);
             //imagejpeg($rotate,"$path/".$filename.'.jpg',100);   
             file_put_contents("$path/".$filename.'.jpg',$binary);
             file_put_contents("$path1/".$filename.'.jpg',$binary);
             
           $sql = "INSERT INTO `register2`(`register_name`, `register_email_address`, `register_password`, `register_mobile_no`, `register_firm_name`, `register_profession_type`, `register_city_type`, `register_country`, `register_product`,`pic_name`) 
           VALUES ('$register_name','$register_email_address','$register_password','$register_mobile_no','$register_firm_name','$register_profession_type','$register_city_type','$register_country','$register_product','$imagename')"; 
           
           $sql1 = "INSERT INTO `phonebook`( `phonebook_name`, `phonebook_contact`, `phonebook_city`, `phonebook_profession`, `phonebook_firm_name`, `phonebook_product`,`phonebook_pic`,`phonebook_main_id`) 
           VALUES ('$register_name','$register_mobile_no','$register_city_type','$register_profession_type','$register_firm_name','$register_product','$imagename','$filename')"; 
          $resulst = mysqli_query($connect,$sql); 
			if(! $resulst )
			{
                        
				           echo json_encode(array("server response"=>'unsucesfull'));  
                                           die(mysqli_error($connect));
			}           
                        $resulst1 = mysqli_query($connect,$sql1); 
                        if(! $resulst1 )
			{
				           echo json_encode(array("server response"=>'unsucesfull'));  
                                           die(mysqli_error($connect));
			}
           echo json_encode(array("server response"=>'Registered sucessfully')); 
        //   echo "<img src=$path.'/'.$filename.'.jpg'>";
         mysqli_close($connect);
                   
    }else{
    echo "error";
    }
                   
?>  
