function changeLang(lang,id){
	
	$.cookie('lang', lang, { expires: 1 });
	$.getJSON('scripts/ajax/lang.json', function(data) {
            //alert(data); //uncomment this for debug
            //alert (data.item1+" "+data.item2+" "+data.item3); //further debug
			//console.log(data.eng[0].title);
			//console.log(data.eng[0].myname);
            console.log(id);
			if(lang=="eng"){
				$('#header-myname').html(data.eng[0].myname);
				$('#header-me').html(data.eng[0].header_me);
				$('#header-lead').html(data.eng[0].header_lead);
			}
			else{
				$('#header-myname').html(data.hu[0].myname);
				$('#header-me').html(data.hu[0].header_me);
				$('#header-lead').html(data.hu[0].header_lead);
			}
    });
 

}

$('#lang-menu li').click(function(e) {
    $('#lang-menu li.active').removeClass('active');
    var $this = $(this);
    if (!$this.hasClass('active')) {
        $this.addClass('active');
    }
    e.preventDefault();
	changeLangColor();
});