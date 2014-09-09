//console.log('\'Allo \'Allo!');
var hatter = new Array( "0", "0" , "0" , "0");

$(document).ready(function (){
	// When the DOM is ready, run this function
	//Set the carousel options
	$('#quote-carousel').carousel({
		pause: true,
		interval: 4000,
	});
	//preventdefault
	$( ".no-link" ).click(function( event ) {
		event.preventDefault();
	});
	//langcolor
	$('body').bind("animationend webkitAnimationEnd oAnimationEnd MSAnimationEnd cssClassChanged", function(){ 
		changeLangColor();
	});	
	
	positionMagic();
	toolTips();
	checkLang();
});


function checkLang(){
	//lang
	if($("#lang-hu").hasClass("active"))
	{
		changeLang('hu',this.id);
	}
	else
	{
		changeLang('eng',this.id);
	}
}




//tooltips
function toolTips(){
	$('#side-magic img').tooltip();
	$('.modal label span').tooltip();
	$('.modal label i').tooltip();
}

//changeLangColor
function changeLangColor(){
		if(!$('body').hasClass("background1")){
			var bgcolor = $('body').css('background-color');
			console.log(bgcolor);
			$(".nav-pills > li.active > a").css('background-color',bgcolor);
			$(".nav-pills > li.active > a:hover").css('background-color',bgcolor);
			$(".nav-pills > li:not(.active) > a").css('background-color',"");
			$(".nav-pills > li:not(.active) > a:hover").css('background-color',"");
		}
		else{
			$(".nav-pills > li.active > a").css('background-color','#9dc02e');
			$(".nav-pills > li.active > a:hover").css('background-color','#9dc02e');
			$(".nav-pills > li:not(.active) > a").css('background-color',"");
			$(".nav-pills > li:not(.active) > a:hover").css('background-color',"");
		}
}

//posiiton magic
function positionMagic(){
	var sidem_h = $('#side-magic').height();
	var sidem_w = $('#side-magic').width();
	var con_w = $('.container').width();
	var p = $(".container");
	var offset = p.offset();
	var n_sidem_tp = offset.top+(sidem_h/2);
	var n_sidem_lp = offset.left+(sidem_w/2)+con_w+2;
	$( "#side-magic" ).css( "margin-top",n_sidem_tp);
	$( "#side-magic" ).css( "margin-left",n_sidem_lp);
}
$(window).resize(function (){
	positionMagic();
	if($(document).width()<=768){
		$("#side-magic").css("display","none");
	}
	else{
		$("#side-magic").css("display","block");
	}
});





function openSection(element){
	var selected = "."+element+""
	if($(selected).hasClass("glyphicon-chevron-down")){
		$(selected).removeClass("glyphicon-chevron-down");
		$("body").removeClass("background1");
		switch(element) {
			case "szakma":
				$("body").css('background-color','#0054a6');
				hatter[0] = 1;
				//console.log(hatter);
			break;
			case "tanulmanyok":
				$("body").css('background-color','#00903c');
				hatter[1] = 1;
				//console.log(hatter);
			break;
			case "nyelvtudas":
				$("body").css('background-color','#f26522');
				hatter[2] = 1;
				//console.log(hatter);
			break;
			case "skills":
				$("body").css('background-color','#92278f');
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
			$("body").addClass("background1");
			$("body").trigger('cssClassChanged');
		}
		else{
			if(hatter[3]==1){
				$("body").css('background-color','#92278f');
			}
			else{
				if(hatter[2]==1){
					$("body").css('background-color','#f26522');
				}
				else{
					if(hatter[1]==1){
						$("body").css('background-color','#00903c');
					}
					else{
						if(hatter[0]==1){
							$("body").css('background-color','#0054a6');
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
