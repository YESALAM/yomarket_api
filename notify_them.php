<?php
function notifythem($id,$name,$comment){
#API access key from Google API's Console
    define( 'API_ACCESS_KEY', 'AIzaSyDJQ6ffbkN9Xi-siRhKM-u5JZN8klf1TLQ' );
    $registrationIds = "dxOTpN5HFyE:APA91bFx3LUGhdiPKFbd7fV6K46odqBqMHMMy9GAGLDU54x_QhaM6UGS37EteqWjo8RxisxeSf9P7jDbdSQyIChvGy8-zIz3GVZG7qUi0LVGTI8wMiMxrDScnZtuqL3Qphy6r8uM5my3";
#prep the bundle
     $msg = array
          (
		'body' 	=> $comment,
		'title'	=> $name.' commented',
             	'icon'	=> 'myicon',/*Default Icon*/
              	'sound' => 'mySound'/*Default sound*/
          );
	$fields = array
			(
				'to'		=> $registrationIds,
				'notification'	=> $msg
			);


	$headers = array
			(
				'Authorization: key=' . API_ACCESS_KEY,
				'Content-Type: application/json'
			);
#Send Reponse To FireBase Server
		$ch = curl_init();
		curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
		curl_setopt( $ch,CURLOPT_POST, true );
		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
		$result = curl_exec($ch );
		curl_close( $ch );
#Echo Result Of FireBase Server
  //echo $result;
}
?>
