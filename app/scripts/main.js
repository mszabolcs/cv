//console.log('\'Allo \'Allo!');
var hatter = new Array( "0", "0" , "0" , "0");

$(document).ready(function (){
	// When the DOM is ready, run this function
	//Set the carousel options
	$('#quote-carousel').carousel({
		pause: true,
		interval: 4000,
	});
	$( ".no-link" ).click(function( event ) {
		event.preventDefault();
	});
});

function openSection(element){
	var selected = "."+element+""
	if($(selected).hasClass("glyphicon-chevron-down")){
		$(selected).removeClass("glyphicon-chevron-down");
		$("body").removeClass("background1");
		switch(element) {
			case "szakma":
				$("body").css('background-color','#0054a6');
				$(".nav-pills > li.active > a").css('background-color','#0054a6');
				$(".nav-pills > li.active > a:hover").css('background-color','#0054a6');
				hatter[0] = 1;
				//console.log(hatter);
			break;
			case "tanulmanyok":
				$("body").css('background-color','#00903c');
				$(".nav-pills > li.active > a").css('background-color','#00903c');
				$(".nav-pills > li.active > a:hover").css('background-color','#00903c');
				hatter[1] = 1;
				//console.log(hatter);
			break;
			case "nyelvtudas":
				$("body").css('background-color','#f26522');
				$(".nav-pills > li.active > a").css('background-color','#f26522');
				$(".nav-pills > li.active > a:hover").css('background-color','#f26522');
				hatter[2] = 1;
				//console.log(hatter);
			break;
			case "skills":
				$("body").css('background-color','#92278f');
				$(".nav-pills > li.active > a").css('background-color','#92278f');
				$(".nav-pills > li.active > a:hover").css('background-color','#92278f');
				hatter[3] = 1;
				//console.log(hatter);
			break;
		}
		$(selected).addClass("glyphicon-chevron-up");
		
	}
	else
	{
		$(selected).removeClass("glyphicon-chevron-up");
		switch(element) {
			case "szakma":
				hatter[0] = 0;
				//console.log(hatter);
			break;
			case "tanulmanyok":
				hatter[1] = 0;
				//console.log(hatter);
			break;
			case "nyelvtudas":
				hatter[2] = 0;
				//console.log(hatter);
			break;
			case "skills":
				hatter[3] = 0;
				//console.log(hatter);
			break;
		}

		if(hatter[0]==0 && hatter[1]==0 && hatter[2]==0 && hatter[3]==0){
			//console.log("minden be van zárva")
			$(".nav-pills > li.active > a").css('background-color','#9dc02e');
			$(".nav-pills > li.active > a:hover").css('background-color','#9dc02e');
			$("body").addClass("background1");
		}
		else{
			if(hatter[3]==1){
				$("body").css('background-color','#92278f');
				$(".nav-pills > li.active > a").css('background-color','#92278f');
				$(".nav-pills > li.active > a:hover").css('background-color','#92278f');

			}
			else{
				if(hatter[2]==1){
					$("body").css('background-color','#f26522');
					$(".nav-pills > li.active > a").css('background-color','#f26522');
					$(".nav-pills > li.active > a:hover").css('background-color','#f26522');
				}
				else{
					if(hatter[1]==1){
						$("body").css('background-color','#00903c');
						$(".nav-pills > li.active > a").css('background-color','#00903c');
						$(".nav-pills > li.active > a:hover").css('background-color','#00903c');

					}
					else{
						if(hatter[0]==1){
							$("body").css('background-color','#0054a6');
							$(".nav-pills > li.active > a").css('background-color','#0054a6');
							$(".nav-pills > li.active > a:hover").css('background-color','#0054a6');
						}
					}
				}
			}

		}
		$(selected).addClass("glyphicon-chevron-down");
	}
}

function animateWork(){

}

function animateSkills(element){
	var selected = "#"+element+""

	$(selected).addClass("animated rubberBand");
	
	$(selected).bind("animationend webkitAnimationEnd oAnimationEnd MSAnimationEnd", function(){ 
		if($(selected).hasClass("animated rubberBand")){
			$(selected).removeClass("animated rubberBand");
		}
	});
}
/*
$(".szakma").on("classChange", function(){
	$("#work-zms").addClass("wobble");
	$("#work-hdagency").addClass("wobble");

	$("#work-zms").css("display","block");
	$("#work-hdagency").css("display","block");
});*/
