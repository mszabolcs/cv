<!-- Contact Form -->
<form role="form" method="post" action="functions/captcha/verify.php">
	<div class="form-group">
		<label for="InputName">Név</label>
		<input type="text" class="form-control" id="InputName" name="name" placeholder="Kérem adja meg a nevét.">
	</div>
	<div class="form-group">
		<label for="InputEmail">E-mail</label>
		<input type="email" class="form-control" id="InputEmail" name="email" placeholder="Kérem adja meg az e-mail címét.">
	</div>
	<textarea class="form-control" rows="3" placeholder="Ide írja üzenetét." name="message"></textarea>
	<?php
		require_once('functions/captcha/recaptchalib.php');
		$publickey = "6LduRvkSAAAAAOxXLkJ7ZNMHdc1WGbkKwB004xFt"; // you got this from the signup page
		echo recaptcha_get_html($publickey);
	?>
<!-- End of Contact Form -->
