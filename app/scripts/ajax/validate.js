
function ajaxTest(){
	var emailcim = "email";
	var cel = $('#target-div');
	$.ajax({
          url: 'includes/validate-test.php',
          data: 'email=' + emailcim,
          dataType: 'json',
          type: 'post',
          success: function (j) {
			alert(j);
            cel.html(j.msg);
          },
		  error: function(XMLHttpRequest, textStatus, errorThrown) { 
			alert("Status: " + textStatus); alert("Error: " + errorThrown); 
		} 
    });


}

function ajaxValidate(action,variable){
	var container = "#"+action+"-validate";
	var cel = $(container);
	//alert('action=' + action + "&variable="+variable);
	$.ajax({
         url: 'includes/validate-test.php',
         data: 'action=' + action + "&variable="+variable,
         dataType: 'json',
         type: 'post',
         success: function (j) {
			//alert(j);
			cel.html(j.msg);
        },
		error: function(XMLHttpRequest, textStatus, errorThrown) { 
			alert("Status: " + textStatus); alert("Error: " + errorThrown); 
		} 
    });


}

