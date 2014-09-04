<?php
	require_once('recaptchalib.php');
	$privatekey = "6LduRvkSAAAAAIx1_j1vRidExAny9PyIHzuNWmYX";
	$resp = recaptcha_check_answer ($privatekey,
									$_SERVER["REMOTE_ADDR"],
									$_POST["recaptcha_challenge_field"],
									$_POST["recaptcha_response_field"]);

  if (!$resp->is_valid) {
    // What happens when the CAPTCHA was entered incorrectly
    die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
         "(reCAPTCHA: " . $resp->error . ")");
  } else {
    // Your code here to handle a successful verification
	echo("Success<br/> Köszönjük kedves ");
  }

?>