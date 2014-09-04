


<?php
	if(isset($_POST['action']) && isset($_POST['variable'])){
		$action = $_POST['action'];
		$variable = $_POST['variable'];
		echo json_encode(validate($action,$variable));
	}
	
	function validate($action,$variable){
		$response = array();
		
		switch ($action){
		case "email":
			if(filter_var($variable, FILTER_VALIDATE_EMAIL)){
				$response = array('msg' => "<div class='alert alert-success form-alerts animated fadeIn' role='alert'><span class='glyphicon glyphicon-ok'></span>&nbsp; A megadott e-mail cím helyes!</div>");
			}else{
				$response = array('msg' => "<div class='alert alert-danger form-alerts animated fadeIn' role='alert'><span class='glyphicon glyphicon-remove'></span>&nbsp; Kérem érvényes e-mail címet adjon meg!</div>");
			}
			return $response;
			break;
		case "phone":
			if($variable != ""){
				$response = array('msg' => "<div class='alert alert-info form-alerts animated fadeIn' role='alert'><span class='glyphicon glyphicon-thumbs-up'></span>&nbsp; Köszönöm, hogy ezt a mezőt is kitöltötte!</div>");
			}
			else{
				$response = array('msg' => "");
			}			
			return $response;
			break;
		case "question":
			if($variable!=""){
				$response = array('msg' => "<div class='alert alert-info form-alerts animated fadeIn' role='alert'><span class='glyphicon glyphicon-thumbs-up'></span>&nbsp; Köszönöm, hogy válaszolt a kérdésre!</div>");
			}
			else{
				$response = array('msg' => "");
			}			
			return $response;
			break;
		case "name":
			if($variable==""){
				$response = array('msg' => "<div class='alert alert-danger form-alerts animated fadeIn' role='alert'><span class='glyphicon glyphicon-remove'></span>&nbsp; Kérem adja meg a nevét!</div>");
			}
			else{
				$response = array('msg' => "");
			}			
			return $response;
			break;
		case "message":
			if($variable==""){
				$response = array('msg' => "<div class='alert alert-danger form-alerts animated fadeIn' role='alert'><span class='glyphicon glyphicon-remove'></span>&nbsp; Üresen hagyta az üzenet mezőt.</div>");
			}
			else{
				$response = array('msg' => "");
			}			
			return $response;
			break;
		}
	}

?>												
												
