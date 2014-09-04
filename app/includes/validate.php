<?php
	require_once("conn.php");
?>

<?php

	$response = array();
	$myArray = array();
	$myArray = $_POST['data'];
	
	//$isiPad = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPad');
	
	//1. Változók
	$name = sanitizeIt($myArray[0]);
	$email = sanitizeIt($myArray[1]);
	$email = filter_var($email, FILTER_VALIDATE_EMAIL);
	$phone = sanitizeIt($myArray[2]);
	$question = sanitizeIt($myArray[3]);
	$message = sanitizeIt($myArray[4]);
	$message = 	nl2br($message);

	$recaptcha_response_field = $myArray[5];
	$recaptcha_challenge_field = $myArray[6];
	
	//2. Field validations


	
	//Captcha validation	
	require_once('../functions/captcha/recaptchalib.php');
	$privatekey = "6LduRvkSAAAAAIx1_j1vRidExAny9PyIHzuNWmYX";
	$resp = recaptcha_check_answer ($privatekey,
									$_SERVER["REMOTE_ADDR"],
									$recaptcha_challenge_field,
									$recaptcha_response_field);
	if (!$resp->is_valid){
		// What happens when the CAPTCHA was entered incorrectly
		
		//Insert message
		$sql = "INSERT INTO messages (name, email, phone, question, message) VALUES ('$name','$email','$phone','$question','$message')";
		//echo($sql);
		if(!$result = $db->query($sql)){die('There was an error running the query [' . $db->error . ']');}

		$response = array('msg' => "nok" );
		echo json_encode($response);
		//die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." ."(reCAPTCHA: " . $resp->error . ")");
	}else{
		// Your code here to handle a successful verification
		$response = array('msg' => "ok");
		echo json_encode($response);
  }

?>

<?php
function sanitizeIt($variable)
{
	$variable = strip_tags($variable);
	$variable = htmlentities($variable, ENT_QUOTES);
	$variable = htmlspecialchars($variable, ENT_QUOTES);
	return $variable;
}

?>


<?php
/*
function check_username($username) {
  $username = trim($username); // strip any white space
  $response = array(); // our response
  
  // if the username is blank
  if (!$username) {
    $response = array(
      'ok' => false, 
      'msg' => "Please specify a username");
      
  // if the username does not match a-z or '.', '-', '_' then it's not valid
  } else if (!preg_match('/^[a-z0-9.-_]+$/', $username)) {
    $response = array(
      'ok' => false, 
      'msg' => "Your username can only contain alphanumerics and period, dash and underscore (.-_)");
      
  // this would live in an external library just to check if the username is taken
  } else if (username_taken($username)) {
    $response = array(
      'ok' => false, 
      'msg' => "The selected username is not available");
      
  // it's all good
  } else {
    $response = array(
      'ok' => true, 
      'msg' => "This username is free");
  }

  return $response;        
}
*/
?>