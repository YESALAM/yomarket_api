<?php         
               //$connect=mysqli_connect("localhost","","","",""); 
               $connect=mysqli_connect("localhost","simptnhu","+d2n4?%KwE7!","simptnhu_yomarket","3306"); 
             
           $register_name = $_GET['name'];
           $register_email_address = $_GET['email'];
           $register_password = $_GET['password'];  
           $register_mobile_no = $_GET['mobile_no'];
           $register_firm_name = $_GET['firm_name'];
           $register_profession_type = $_GET['profession_type'];
           $register_product = $_GET['product'];
           $register_country = $_GET['country'];
           $register_state = $_GET['state'];
           $register_city_type = $_GET['city'];    

//INSERT INTO `register2`(`register_name`, `register_email_address`, `register_password`, `register_mobile_no`, `register_firm_name`, `register_profession_type`, `register_city_type`, `register_country`, `register_product`)
//VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11])
                      
           $sql = "INSERT INTO `register2`(`register_name`, `register_email_address`, `register_password`, `register_mobile_no`, `register_firm_name`, `register_profession_type`, `register_city_type`, `register_country`, `register_product`) 
           VALUES ('$register_name','$register_email_address','$register_password','$register_mobile_no','$register_firm_name','$register_profession_type','$register_city_type','$register_country','$register_product')"; 
           
           $sql1 = "INSERT INTO `phonebook`( `phonebook_name`, `phonebook_contact`, `phonebook_city`, `phonebook_profession`, `phonebook_firm_name`, `phonebook_product`) 
           VALUES ('$register_name','$register_firm_name','$register_city_type','$register_profession_type','$register_firm_name','$register_product')"; 
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
		   mysqli_close($connect)
?>  
