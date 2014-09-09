


<?php
	if(isset($_POST['action']) && isset($_POST['variable'])){
		$action = $_POST['action'];
		$variable = $_POST['variable'];
		echo json_encode(validate($action,$variable));
	}
	
	function validate($action,$variable){
		$response = array();
		$outputmsg = "";
		
		switch ($action){
		case "email":
			if(filter_var($variable, FILTER_VALIDATE_EMAIL)){
				if($_COOKIE["lang"]=="eng"){$outputmsg="The e-mail address is valid!";}else{$outputmsg="A megadott e-mail cím helyes!";}
				$response = array('msg' => "<div class='alert alert-success form-alerts animated fadeIn' role='alert'><span class='glyphicon glyphicon-ok'></span>&nbsp; ".$outputmsg."</div>");
			}else{
				if($_COOKIE["lang"]=="eng"){$outputmsg="Please type in a valid e-mail address.";}else{$outputmsg="Kérem érvényes e-mail címet adjon meg!";}
				$response = array('msg' => "<div class='alert alert-danger form-alerts animated fadeIn' role='alert'><span class='glyphicon glyphicon-remove'></span>&nbsp; ".$outputmsg."</div>");
			}
			return $response;
			break;
		case "phone":
			if($variable != ""){
				if($_COOKIE["lang"]=="eng"){$outputmsg="Thank You for providing this information!";}else{$outputmsg="Köszönöm, hogy ezt a mezőt is kitöltötte!";}			
				$response = array('msg' => "<div class='alert alert-info form-alerts animated fadeIn' role='alert'><span class='glyphicon glyphicon-thumbs-up'></span>&nbsp; ".$outputmsg."</div>");
			}
			else{
				$response = array('msg' => "");
			}			
			return $response;
			break;
		case "question":
			if($variable!=""){
				if($_COOKIE["lang"]=="eng"){$outputmsg="Thank You for answering this question!";}else{$outputmsg="Köszönöm, hogy válaszolt a kérdésre!";}						
				$response = array('msg' => "<div class='alert alert-info form-alerts animated fadeIn' role='alert'><span class='glyphicon glyphicon-thumbs-up'></span>&nbsp; ".$outputmsg."</div>");
			}
			else{
				$response = array('msg' => "");
			}			
			return $response;
			break;
		case "name":
			if($variable==""){
				if($_COOKIE["lang"]=="eng"){$outputmsg="Please enter Your name.	";}else{$outputmsg="Kérem adja meg a nevét!";}						
				$response = array('msg' => "<div class='alert alert-danger form-alerts animated fadeIn' role='alert'><span class='glyphicon glyphicon-remove'></span>&nbsp; ".$outputmsg."</div>");
			}
			else{
				$response = array('msg' => "");
			}			
			return $response;
			break;
		case "message":
			if($variable==""){
				if($_COOKIE["lang"]=="eng"){$outputmsg="You left the message field empty.";}else{$outputmsg="Üresen hagyta az üzenet mezőt.";}									
				$response = array('msg' => "<div class='alert alert-danger form-alerts animated fadeIn' role='alert'><span class='glyphicon glyphicon-remove'></span>&nbsp; ".$outputmsg."</div>");
			}
			else{
				$response = array('msg' => "");
			}			
			return $response;
			break;
		}
	}

?>												
												
