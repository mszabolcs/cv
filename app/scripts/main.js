console.log('\'Allo \'Allo!');

$(document).ready(function (){

});

function openSection(element){
	var selected = "."+element+""
	if($(selected).hasClass("glyphicon-chevron-down")){
		$(selected).removeClass("glyphicon-chevron-down");
		$(selected).addClass("glyphicon-chevron-up");
	}
	else
	{
		$(selected).removeClass("glyphicon-chevron-up");
		$(selected).addClass("glyphicon-chevron-down");
	}
}

function animateWork(){

}

/*
$(".szakma").on("classChange", function(){
	$("#work-zms").addClass("wobble");
	$("#work-hdagency").addClass("wobble");

	$("#work-zms").css("display","block");
	$("#work-hdagency").css("display","block");
});*/
