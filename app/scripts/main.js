console.log('\'Allo \'Allo!');
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