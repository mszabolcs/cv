
// Otherwise, the HTML will be inserted into the handle.
// One level of HTML is supported.
var customToolTip = $.Link({
	target: '-tooltip-<div class="ui-tooltip"></div>',
	method: function ( value ) {

		// The tooltip HTML is 'this', so additional
		// markup can be inserted here.
		var ev = getCookie("lang");
		if(ev=="eng"){ev="Year";}else{ev="Év";}
		$(this).html(
			'<strong>'+ev+': </strong>' +
			'<span>' + parseInt(value) + '</span>'
		);
	}
});

$("#range-slider").noUiSlider({
		start: [1998,2014],
		connect: true,
		step: 1,
		behaviour: 'drag',
		range: {
			'min': 1998,
			'max': 2014
		},
		serialization: {
			lower: [ customToolTip ],
			upper: [ customToolTip ]
		}
});

$("#range-slider").change(function(){
	changeSchools();
});

function changeSchools(){
	var start_end = $("#range-slider").val();
	if(start_end[0]<=2006){
		if($(".kossuth-thumb").hasClass("bounceOutDown")){$(".kossuth-thumb").removeClass("bounceOutDown");}
		if(!$(".kossuth-thumb").hasClass("bounceInDown")){$(".kossuth-thumb").addClass("bounceInDown");}
	}
	else
	{
		if($(".kossuth-thumb").hasClass("bounceInDown")){$(".kossuth-thumb").removeClass("bounceInDown");};
		if(!$(".kossuth-thumb").hasClass("bounceOutDown")){$(".kossuth-thumb").addClass("bounceOutDown");}
	}
	if(start_end[1]>=2010){
		if($(".corvinus-thumb").hasClass("bounceOutUp")){$(".corvinus-thumb").removeClass("bounceOutUp");}
		if(!$(".corvinus-thumb").hasClass("bounceInUp")){$(".corvinus-thumb").addClass("bounceInUp");}
	}
	else
	{
		if($(".corvinus-thumb").hasClass("bounceInUp")){$(".corvinus-thumb").removeClass("bounceInUp");};
		if(!$(".corvinus-thumb").hasClass("bounceOutUp")){$(".corvinus-thumb").addClass("bounceOutUp");}
	}
	if((start_end[0]>=1998 && start_end[0]<=2010) && (start_end[1]<=2014 && start_end[1]>=2006)){
		if($(".foldes-thumb").hasClass("bounceOut")){$(".foldes-thumb").removeClass("bounceOut");}
		if(!$(".foldes-thumb").hasClass("bounceIn")){$(".foldes-thumb").addClass("bounceIn");}
	}
	else
	{
		if($(".foldes-thumb").hasClass("bounceIn")){$(".foldes-thumb").removeClass("bounceIn");};
		if(!$(".foldes-thumb").hasClass("bounceOut")){$(".foldes-thumb").addClass("bounceOut");}
	}

}

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