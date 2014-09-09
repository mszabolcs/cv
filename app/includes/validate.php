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
		$response = array('msg' => "nok" );
		echo json_encode($response);
		//die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." ."(reCAPTCHA: " . $resp->error . ")");
	}else{
		// Your code here to handle a successful verification
		$response = array('msg' => "ok");
		echo json_encode($response);
		//Insert message
		$sql = "INSERT INTO messages (name, email, phone, question, message) VALUES ('$name','$email','$phone','$question','$message')";
		//echo($sql);
		if(!$result = $db->query($sql)){die('There was an error running the query [' . $db->error . ']');}
		//E-mail elküldése
		$to  = 'zmsproker@gmail.com';
		// subject
		$subject = 'Önéletrajz megkeresés: '.htmlspecialchars_decode($name).'(-tól/től)';
		// message
		$emessage = '
			<html>
				<head>
					<title>Megkeresés az önéletrajz oldalról</title>
				</head>
			<body>
				<h1>$name megkeresése:</h1>
				<hr/>
				<p>Innen talált rám: '.htmlspecialchars_decode($question).'</p>
				<table>
					<tr>
						<th>E-mail cím:</th><th>Telefonszám:</th>
					</tr>
					<tr>
						<td> '.htmlspecialchars_decode($email).'</td><td> '.htmlspecialchars_decode($phone).'</td>
					</tr>
				</table>
				<h2>Az üzenet:</h2>
				<p> '.htmlspecialchars_decode($message).'</p>
			</body>
		</html>
		';
		// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		// Additional headers
		$headers .= 'To: Molnár Szabolcs <zmsproker@gmail.com>' . "\r\n";
		$headers .= 'From: $namme <$email>' . "\r\n";

		// Mail it
		mail($to, $subject, $emessage, $headers);
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