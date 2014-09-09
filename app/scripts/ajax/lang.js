



function changeLang(lang,id){
	
	$.cookie('lang', lang, { expires: 1 });
	$.getJSON('scripts/ajax/lang.json', function(data) {
            //alert(data); //uncomment this for debug
            //alert (data.item1+" "+data.item2+" "+data.item3); //further debug
			//console.log(data.eng[0].title);
			//console.log(data.eng[0].myname);
            //console.log(id);
			if(lang=="eng"){
				$('#header-myname').html(data.eng[0].myname);
				$('#header-me').html(data.eng[0].header_me);
				$('#header-lead').html(data.eng[0].header_lead);
				$('#jumb-headline').html(data.eng[0].jumb_headline);
				$('#jumb-p').html(data.eng[0].jumb_p);
				$('#jumb-message-btn').html(data.eng[0].jumb_message_btn);
				//Form
				$('#myModalLabel').html(data.eng[0].myModalLabel);
				$( "#spn_inputName" ).attr({"data-original-title": data.eng[0].spn_inputName});
				$( "#inputName" ).attr({"placeholder": data.eng[0].inputName});
				$( "#spn_inputPhone" ).attr({"data-original-title": data.eng[0].spn_inputPhone});
				$( "#inputPhone" ).attr({"placeholder": data.eng[0].inputPhone});
				$( "#inputEmail" ).attr({"placeholder": data.eng[0].inputEmail});
				$( "#spn_inputOption" ).attr({"data-original-title": data.eng[0].spn_inputOption});
				$( ".helperOptional" ).html(data.eng[0].helperOptional);
					//Options
					$('select option:contains("Hogyan talált ide?")').text('How did You find me?');
					$('select option:contains("Google keresés")').text('Google search');
					$('select option:contains("ZMS Pro-Ker Kft.")').text('ZMS Pro-Ker Ltd.');
					$('select option:contains("Ismerős, barát")').text('Friends');
					$('select option:contains("Egyéb")').text('Other');
				$( "#spn_inputMessage" ).attr({"data-original-title": data.eng[0].spn_inputMessage});
				$( "#inputMessage" ).attr({"placeholder": data.eng[0].inputMessage});
				$('#remainingChar').html(data.eng[0].remainingChar);
				$('#help-bottom').html(data.eng[0].help_bottom);
				$('#btn_close').html(data.eng[0].btn_close);
				$('#btn_send').html(data.eng[0].btn_send);
				//Content1-2
				$('#content_1_header').html(data.eng[0].content_1_header);
				$('#content_2_header').html(data.eng[0].content_2_header);
				$('#content_1_cont').html(data.eng[0].content_1_cont);
				$('#content_2_cont').html(data.eng[0].content_2_cont);
				//WORK
				$('#szakmai_h4').html(data.eng[0].szakmai_h4);
				$('#hd_agency_name').html(data.eng[0].hd_agency_name);
				$('#hd_time').html(data.eng[0].hd_time);
				$('#hd_w_1').html(data.eng[0].hd_w_1);
				$('#hd_w_2').html(data.eng[0].hd_w_2);
				$('#hd_w_3').html(data.eng[0].hd_w_3);
				$('#hd_w_4').html(data.eng[0].hd_w_4);
				$('#zms_name').html(data.eng[0].zms_name);
				$('#zms_time').html(data.eng[0].zms_time);
				$('#zms_w_1').html(data.eng[0].zms_w_1);
				$('#zms_w_2').html(data.eng[0].zms_w_2);
				$('#zms_w_3').html(data.eng[0].zms_w_3);
				$('#zms_w_4').html(data.eng[0].zms_w_4);
				$('#zms_w_5').html(data.eng[0].zms_w_5);
				$('#zms_w_6').html(data.eng[0].zms_w_6);
				//EDUCTAION
				$('#tanulmanyok_h4').html(data.eng[0].tanulmanyok_h4);
				$('#edu_1_k').html(data.eng[0].edu_1_k);
				$('#edu_2_f').html(data.eng[0].edu_2_f);
				$('#edu_2_f_szak').html(data.eng[0].edu_2_f_szak);
				$('#edu_3_c').html(data.eng[0].edu_3_c);
				$('#edu_3_c_szak').html(data.eng[0].edu_3_c_szak);
				//Languages
				$('#nyelvtudas_h4').html(data.eng[0].nyelvtudas_h4);
				$('#eng_level').html(data.eng[0].eng_level);
				$('#esp_level').html(data.eng[0].esp_level);
				$('#ger_level').html(data.eng[0].ger_level);
				//Skills
				$('#skills_h4').html(data.eng[0].skills_h4);
				$('#skills_2_1').html(data.eng[0].skills_2_1);
				$('#skills_2_2').html(data.eng[0].skills_2_2);
				$('#skills_3_1').html(data.eng[0].skills_3_1);
				$('#skills_3_2').html(data.eng[0].skills_3_2);
				$('#skills_3_3').html(data.eng[0].skills_3_3);
				$('#skills_3_4').html(data.eng[0].skills_3_4);
				$('#skills_3_5').html(data.eng[0].skills_3_5);
				$('#skills_4_title').html(data.eng[0].skills_4_title);
				$('#skills_5_title').html(data.eng[0].skills_5_title);
				$('#skills_5_1').html(data.eng[0].skills_5_1);
				$('#skills_6_title').html(data.eng[0].skills_6_title);
				$('#skills_6_1').html(data.eng[0].skills_6_1);
				$('#skills_6_2').html(data.eng[0].skills_6_2);
				$('#skills_6_3').html(data.eng[0].skills_6_3);
				$('#skills_6_4').html(data.eng[0].skills_6_4);
				$('#skills_6_5').html(data.eng[0].skills_6_5);				
				$('#contact_header').html(data.eng[0].contact_header);
				$('#con_name').html(data.eng[0].con_name);
				$('#footer_origin').html(data.eng[0].footer_origin);				
			}
			else{
				$('#header-myname').html(data.hu[0].myname);
				$('#header-me').html(data.hu[0].header_me);
				$('#header-lead').html(data.hu[0].header_lead);
				$('#jumb-headline').html(data.hu[0].jumb_headline);
				$('#jumb-p').html(data.hu[0].jumb_p);
				$('#jumb-message-btn').html(data.hu[0].jumb_message_btn);
				//Form
				$('#myModalLabel').html(data.hu[0].myModalLabel);
				$( "#spn_inputName" ).attr({"data-original-title": data.hu[0].spn_inputName});
				$( "#inputName" ).attr({"placeholder": data.hu[0].inputName});
				$( "#spn_inputPhone" ).attr({"data-original-title": data.eng[0].spn_inputPhone});
				$( "#inputPhone" ).attr({"placeholder": data.eng[0].inputPhone});
				$( "#inputEmail" ).attr({"placeholder": data.eng[0].inputEmail});
				$( "#spn_inputOption" ).attr({"data-original-title": data.hu[0].spn_inputOption});
				$( ".helperOptional" ).html(data.eng[0].helperOptional);
					//Options
					$('select option:contains("How did You find me?")').text('Hogyan talált ide?');
					$('select option:contains("Google search")').text('Google keresés');
					$('select option:contains("ZMS Pro-Ker Ltd.")').text('ZMS Pro-Ker Kft.');
					$('select option:contains("Friends")').text('Ismerős, barát');
					$('select option:contains("Other")').text('Egyéb');
				$( "#spn_inputMessage" ).attr({"data-original-title": data.hu[0].spn_inputMessage});
				$( "#inputMessage" ).attr({"placeholder": data.hu[0].inputMessage});
				$('#remainingChar').html(data.hu[0].remainingChar);
				$('#help-bottom').html(data.hu[0].help_bottom);
				$('#btn_close').html(data.hu[0].btn_close);
				$('#btn_send').html(data.hu[0].btn_send);
				//Content1-2
				$('#content_1_header').html(data.hu[0].content_1_header);
				$('#content_2_header').html(data.hu[0].content_2_header);
				$('#content_1_cont').html(data.hu[0].content_1_cont);
				$('#content_2_cont').html(data.hu[0].content_2_cont);
				//WORK
				$('#szakmai_h4').html(data.hu[0].szakmai_h4);
				$('#hd_agency_name').html(data.hu[0].hd_agency_name);
				$('#hd_time').html(data.hu[0].hd_time);
				$('#hd_w_1').html(data.hu[0].hd_w_1);
				$('#hd_w_2').html(data.hu[0].hd_w_2);
				$('#hd_w_3').html(data.hu[0].hd_w_3);
				$('#hd_w_4').html(data.hu[0].hd_w_4);
				$('#zms_name').html(data.hu[0].zms_name);
				$('#zms_time').html(data.hu[0].zms_time);
				$('#zms_w_1').html(data.hu[0].zms_w_1);
				$('#zms_w_2').html(data.hu[0].zms_w_2);
				$('#zms_w_3').html(data.hu[0].zms_w_3);
				$('#zms_w_4').html(data.hu[0].zms_w_4);
				$('#zms_w_5').html(data.hu[0].zms_w_5);
				$('#zms_w_6').html(data.hu[0].zms_w_6);
				//EDUCTAION
				$('#tanulmanyok_h4').html(data.hu[0].tanulmanyok_h4);
				$('#edu_1_k').html(data.hu[0].edu_1_k);
				$('#edu_2_f').html(data.hu[0].edu_2_f);
				$('#edu_2_f_szak').html(data.hu[0].edu_2_f_szak);
				$('#edu_3_c').html(data.hu[0].edu_3_c);
				$('#edu_3_c_szak').html(data.hu[0].edu_3_c_szak);
				//Languages
				$('#nyelvtudas_h4').html(data.hu[0].nyelvtudas_h4);
				$('#eng_level').html(data.hu[0].eng_level);
				$('#esp_level').html(data.hu[0].esp_level);
				$('#ger_level').html(data.hu[0].ger_level);
				//Skills
				$('#skills_h4').html(data.hu[0].skills_h4);
				$('#skills_2_1').html(data.hu[0].skills_2_1);
				$('#skills_2_2').html(data.hu[0].skills_2_2);
				$('#skills_3_1').html(data.hu[0].skills_3_1);
				$('#skills_3_2').html(data.hu[0].skills_3_2);
				$('#skills_3_3').html(data.hu[0].skills_3_3);
				$('#skills_3_4').html(data.hu[0].skills_3_4);
				$('#skills_3_5').html(data.hu[0].skills_3_5);
				$('#skills_4_title').html(data.hu[0].skills_4_title);
				$('#skills_5_title').html(data.hu[0].skills_5_title);
				$('#skills_5_1').html(data.hu[0].skills_5_1);
				$('#skills_6_title').html(data.hu[0].skills_6_title);
				$('#skills_6_1').html(data.hu[0].skills_6_1);
				$('#skills_6_2').html(data.hu[0].skills_6_2);
				$('#skills_6_3').html(data.hu[0].skills_6_3);
				$('#skills_6_4').html(data.hu[0].skills_6_4);
				$('#skills_6_5').html(data.hu[0].skills_6_5);	
				//Contat
				$('#contact_header').html(data.hu[0].contact_header);
				$('#con_name').html(data.hu[0].con_name);
				$('#footer_origin').html(data.hu[0].footer_origin);				
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