function textareaChars(text){
	var text_hossz = text.length;
	var hossz = 1500;
	$('#remainingNumbers').html(hossz-text_hossz);
}

$("#contact-form").submit(function( event ){
	event.preventDefault();
	
	var name = $('input[name=name]').val();
	var email = $('input[name=email]').val();
	var message = $('textarea[name=message]').val();
	var recaptcha_response_field = $('#recaptcha_response_field').val();
	
	//loader megjelenítése
	$("#ajx-loading").html("<img src='images/etc/ajax-loader.gif' alt='ajax loader'/>");
	//Validation
	setTimeout(function(){
	if(name!="" && name!='null' && email!="" && email!='null' && message!="" && message!='null' && recaptcha_response_field!="" && recaptcha_response_field!='null')
	{
		//további változók
		var phone = $('input[name=phone]').val();
		var question = $("#inputOption option[value='"+$('#inputOption').val()+"']").text();
		//var question = $('#inputOption').val();
		//alert(question);
		
		var recaptcha_challenge_field = $('#recaptcha_challenge_field').val();
		var variables =[name,email,phone,question,message,recaptcha_response_field,recaptcha_challenge_field];
		//alert(variables);
	
		
		//ajax kérés küldése
		setTimeout(function() {
			$.ajax({
				url: 'includes/validate.php',
				data: {data : variables},
				dataType: 'json',
				type: 'post',
				success: function (j) {
					//cel.html(j.msg);
					if(j.msg=="ok"){
						var cel = $("#recaptcha_response_field-validate");
						cel.html("");
						var lang = getCookie("lang");
						var outputmsg="";
						if(lang=="eng"){outputmsg="Success!"}else{outputmsg="Az üzenetet sikeresen elküldtük!"}
						$("#ajx-loading").html("<div class='alert alert-success animated fadeIn margin-padding margin55' role='alert' id='message-alert'><span class='glyphicon glyphicon-ok'></span>&nbsp; "+outputmsg+"</div>	");
					}else{
						var cel = $("#recaptcha_response_field-validate");
						var lang = getCookie("lang");
						var outputmsg="";
						if(lang=="eng"){outputmsg="The text You entered is incorrect. Please type in the security text above and try again!"}else{outputmsg="A beírt kód hibás. Kérem írja be a fentebb látható biztonsági kódot majd próbálja újra elküldeni."}
						cel.html("<div class='alert alert-danger form-alerts animated fadeIn' role='alert'><span class='glyphicon glyphicon-remove'></span>&nbsp; "+outputmsg+"</div>");
						var lang = getCookie("lang");
						var outputmsg="";						
						if(lang=="eng"){outputmsg="There was an error. We could not send the message!"}else{outputmsg="Az üzenetet nem sikerült elküldeni!"}
						$("#ajx-loading").html("<div class='alert alert-danger animated fadeIn margin-padding margin55' role='alert' id='message-alert-error'><span class='glyphicon glyphicon-remove'></span>&nbsp; "+outputmsg+"</div>");
					}
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) { 
						var lang = getCookie("lang");
						var outputmsg="";						
						if(lang=="eng"){outputmsg="There was an error. We could not send the message!"}else{outputmsg="Az üzenetet nem sikerült elküldeni!"}
						$("#ajx-loading").html("<div class='alert alert-danger animated fadeIn margin-padding margin55' role='alert' id='message-alert-error'><span class='glyphicon glyphicon-remove'></span>&nbsp; "+outputmsg+"</div>");
					//alert("error");
					//console.log("Status: " + textStatus); alert("Error: " + errorThrown); 
				} 
			});
		}, 2000);
		//Bezárás
		setTimeout(function() {
			$("#message-alert").removeClass("fadeIn");
			$("#message-alert").addClass("fadeOut");
			$("#message-alert").one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',   
				function(){
					// code to execute after transition ends
					$("#ajx-loading").html("");
					$('#myModal').modal('hide');
					document.getElementById("contact-form").reset();
					$("#name-validate").html("");
					$("#email-validate").html("");
					$("#phone-validate").html("");
					$("#question-validate").html("");
					$("#message-validate").html("");
			});
		}, 5000);
	}
	else{
		$("#ajx-loading").html("");
		if(name == "" || name == 'null'){
			var cel = $("#name-validate");
			var lang = getCookie("lang");
			var outputmsg="";						
			if(lang=="eng"){outputmsg="Please type in Your name."}else{outputmsg="Kérem adja meg a nevét."}			
			cel.html("<div class='alert alert-danger form-alerts animated fadeIn' role='alert'><span class='glyphicon glyphicon-remove'></span>&nbsp; "+outputmsg+"</div>");
		}
		else{
			var cel = $("#name-validate");
			cel.html("");
		}
		if(email == "" || email == 'null'){
			var cel = $("#email-validate");
			var lang = getCookie("lang");
			var outputmsg="";						
			if(lang=="eng"){outputmsg="Please type in a valid e-mail address."}else{outputmsg="Kérem érvényes e-mail címet adjon meg!"}						
			cel.html("<div class='alert alert-danger form-alerts animated fadeIn' role='alert'><span class='glyphicon glyphicon-remove'></span>&nbsp; "+outputmsg+"</div>");
		}
		else{
			var cel = $("#email-validate");
			cel.html("");
		}
		if(message =="" || message =='null'){
			var cel = $("#message-validate");
			var lang = getCookie("lang");
			var outputmsg="";						
			if(lang=="eng"){outputmsg="You left the message field empty."}else{outputmsg="Üresen hagyta az üzenet mezőt."}						
			cel.html("<div class='alert alert-danger form-alerts animated fadeIn' role='alert'><span class='glyphicon glyphicon-remove'></span>&nbsp; "+outputmsg+"</div>");
		}
		else{
			var cel = $("#message-validate");
			cel.html("");
		}
		if(recaptcha_response_field =="" || recaptcha_response_field =='null'){
			var cel = $("#recaptcha_response_field-validate");
			var lang = getCookie("lang");
			var outputmsg="";						
			if(lang=="eng"){outputmsg="Please type in the security code above and try to send the message again."}else{outputmsg="Kérem írja be a fentebb látható biztonsági kódot majd próbálja újra elküldeni."}						
			cel.html("<div class='alert alert-danger form-alerts animated fadeIn' role='alert'><span class='glyphicon glyphicon-remove'></span>&nbsp; "+outputmsg+"</div>");
		}
		else{
			var cel = $("#recaptcha_response_field-validate");
			cel.html("");
		}
	}
	}, 1000);
});


//Cookie finder
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) != -1) return c.substring(name.length,c.length);
    }
    return "";
}