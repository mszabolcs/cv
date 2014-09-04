<?php
	require_once("includes/conn.php");

	$sql = "SELECT author,quote,author_img FROM quotes";
	if(!$result = $db->query($sql)){die('There was an error running the query [' . $db->error . ']');}
	
	$count_quotes = count($result);
	$aquotes=array();

	while($row = $result->fetch_assoc()){
		$author = $row['author'];
		$quote =  $row['quote'];	
		$author_img = $row['author_img'];	
		$aquote = array($author,$quote,$author_img);
		
		array_push($aquotes,$aquote);		
	}
	shuffle($aquotes);
 ?>
<!doctype html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <title>Molnár Szabolcs | Önéletrajz | Képességek, nyelvtudás, tapasztalatok.</title>
        <meta name="description" content="Molnár Szabolcs önéletrajza, tapasztalatai, készségei.">
        <meta name="viewport" content="width=device-width">
        <link rel="shortcut icon" href="/favicon.ico">
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <!-- build:css styles/vendor.css -->
        <!-- bower:css -->
        <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.css" />
        <link rel="stylesheet" href="../bower_components/animate.css/animate.css" />
        <link rel="stylesheet" href="../bower_components/nouislider/jquery.nouislider.css" />
        <link rel="stylesheet" href="../bower_components/jquery-ui/themes/smoothness/jquery-ui.min.css">
        <link rel="stylesheet" href="../bower_components/fontawesome/css/font-awesome.min.css">
		<!-- endbower -->
        <!-- endbuild -->
        <!-- build:css(.tmp) styles/main.css -->
        <link rel="stylesheet" href="styles/main.css">
        <link rel="stylesheet" href="styles/form.css">
        <link rel="stylesheet" href="styles/quotes.css">
        <link rel="stylesheet" href="styles/address.css">
        <link rel="stylesheet" href="styles/footer.css">
        <link rel="stylesheet" href="styles/MyNouislider.css">
        <!-- endbuild -->
    </head>
    <body class="background1">
        <!--[if lt IE 10]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
		<div id="side-magic" style="padding:2px;">
			<div style="height:20px;width:20px;margin-top:8px;margin-left:5px;">
				<a href="#" class="no-link" data-toggle="collapse" data-target="#collapseOne" data-recog="szakma" onClick="openSection(this.getAttribute('data-recog'));" >
					<img src="images/icons/work.svg" style="height:20px; width:20px" alt="work icon" data-toggle="tooltip" data-placement="right" title="Szakmai tapasztalatok">
				</a>
			</div>
			<div style="height:20px;width:20px;margin-top:8px;margin-left:5px;">
				<a href="#" class="no-link" data-toggle="collapse" data-target="#collapseTwo" data-recog="tanulmanyok" onClick="openSection(this.getAttribute('data-recog'));" >
					<img src="images/icons/study.svg" style="height:20px; width:20px" alt="study icon" data-toggle="tooltip" data-placement="right" title="Tanulmányok">
				</a>
			</div>
			<div style="height:20px;width:20px;margin-top:8px;margin-left:5px;">
				<a href="#" class="no-link" data-toggle="collapse" data-target="#collapse3" data-recog="nyelvtudas" onClick="openSection(this.getAttribute('data-recog'));" >
					<img src="images/icons/languages.svg" style="height:20px; width:20px" alt="languages icon" data-toggle="tooltip" data-placement="right" title="Nyelvtudás">
				</a>
			</div>
			<div style="height:20px;width:20px;margin-top:8px;margin-left:5px;">
				<a href="#" class="no-link" data-toggle="collapse" data-target="#collapse4" data-recog="skills" onClick="openSection(this.getAttribute('data-recog'));" >
					<img src="images/icons/skills.svg" style="height:20px; width:20px" alt="skils icon" data-toggle="tooltip" data-placement="right" title="Készségek">
				</a>
			</div>
		</div>
		
        <div class="container">
            <div class="header">
                <ul class="nav nav-pills pull-right" id="lang-menu">
                    <li id="lang-hu" class="active" onClick="changeLang('hu',this.id);" ><a href="#"><img src="images/icons/mini-lang-hun.png" alt="hungarian/magyar" /> HUN</a></li>
                    <li id="lang-eng" onClick="changeLang('eng',this.id);" ><a href="#"><img src="images/icons/mini-lang-eng.png" alt="english/angol" /> ENG</a></li>
                </ul>
                <!--<h3 class="text-muted"></h3>-->
            </div>
			<!-- Who am I? -->
				<div class="row row-me">
					<div class="col-xs-4 col-xs-offset-1">
						<div class="thumbnail animated fadeIn" id="thumb-me">
							<img src="images/etc/profile-pic.png" alt="Molnár Szabolcs - Profil kép"/>
							<div class="caption">
								<h4 id="header-myname">Molnár Szabolcs</h4><hr/>
							</div>
						</div>
					</div>
					<div class="col-xs-6">
						<h1 id="header-me"><strong>Ki is vagyok?</strong></h1>
						<p id="header-lead" class="lead">Ezen oldal célja, hogy vázlatosan bemutassa önéletrajzomat.</p>
					</div>
				</div>
			<!-- End of Who am I?-->
			<!-- Quote -->
			<div class='row marketing'>
				<div class='col-sm-12'>
					<div class="carousel slide" data-ride="carousel" id="quote-carousel">
						<!-- Bottom Carousel Indicators -->
						<ol class="carousel-indicators">
							<li data-target="#quote-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#quote-carousel" data-slide-to="1"></li>
						</ol>
						<hr/>
						
						<!-- Carousel Slides / Quotes -->
						<div class="carousel-inner">
        
							<!-- Quote 1 -->
							<div class="item active">
								<blockquote>
									<div class="row">
										<div class="col-sm-3 text-center">
											<img class="img-circle" src="<?php echo($aquotes[0][2]) ?>" style="width: 100px;height:100px;">
										</div>
										<div class="col-sm-9">
											<p><span class="fa fa-quote-left" style="color:#999;"></span> <i><?php echo($aquotes[0][1]) ?></i> <span class="fa fa-quote-right" style="color:#999;"></span></p>
											<small><?php echo($aquotes[0][0]) ?></small>
										</div>
									</div>
								</blockquote>
							</div>
							<!-- Quote 2 -->
							<div class="item">
								<blockquote>
									<div class="row">
									<div class="col-sm-3 text-center">
										<img class="img-circle" src="<?php echo($aquotes[1][2]) ?>" style="width: 100px;height:100px;">
									</div>
									<div class="col-sm-9">
										<p><span class="fa fa-quote-left" style="color:#999;"></span> <i><?php echo($aquotes[1][1]) ?></i> <span class="fa fa-quote-right" style="color:#999;"></span></p>
										<small><?php echo($aquotes[1][0]) ?></small>
									</div>
									</div>
								</blockquote>
							</div>
						</div><hr/>
        
						<!-- Carousel Buttons Next/Prev -->
						<a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>
						<a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-chevron-right"></i></a>
					</div>                          
				</div>
			</div><!-- End of Quote -->
			
            <div class="jumbotron">
                <h1>Kérdése van?</h1>
                <p class="lead">Írjon bizalommal!</p>
                <p><a class="btn btn-lg btn-success" href="#" data-toggle="modal" data-target="#myModal">Üzenet írása! <span class="glyphicon glyphicon-envelope"></span></a></p>
				<!-- Modal -->
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
								<h4 class="modal-title" id="myModalLabel">Üzenetküldés</h4>
							</div>
							<div class="modal-body">
								<!-- Contact Form -->
								<form class="form-horizontal" id="contact-form" role="form" method="post" action="includes/validate.php">
									<div class="form-group">
										<label for="inputName" class="col-sm-1 control-label"><span class="glyphicon glyphicon-user" title="Név" data-toggle="tooltip" data-placement="left" title="Név"></span></label>
										<div class="col-sm-11">
											<input type="text" class="form-control" id="inputName" placeholder="Ide írja nevét." name="name" onBlur="ajaxValidate(this.name,this.value);">
											<div id="name-validate"></div>
										</div>
									</div>
									<div class="form-group">
										<label for="inputEmail" class="col-sm-1 control-label"><span class="glyphicon glyphicon-envelope" title="E-mail" data-toggle="tooltip" data-placement="left" title="E-mail"></span></label>
										<div class="col-sm-11">
											<input type="email" class="form-control" id="inputEmail" placeholder="Ide írja e-mail címét." name="email" onBlur="ajaxValidate(this.name,this.value);">
												<div id="email-validate"></div>
										</div>
									</div>
									<div class="form-group form-notrequired">
										<label for="inputPhone" class="col-sm-1 control-label"><span class="glyphicon glyphicon-phone white" title="Telefon" data-toggle="tooltip" data-placement="left" title="Telefon"></span></label>
										<div class="col-sm-11">
											<input type="text" class="form-control" id="inputPhone" placeholder="Ha kívánja, adja meg telefonszámát."  name="phone" onBlur="ajaxValidate(this.name,this.value);">
											<span class="help-block help-form">Nem kötelező.</span>
												<div id="phone-validate"></div>
										</div>
										<label for="inputHeard" class="col-sm-1 control-label"><i class="fa fa-question white" title="Kérdés" data-toggle="tooltip" data-placement="left" title="Kérdés"></i></label>
										<div class="col-sm-11">
										<select class="form-control" id="inputOption" name="question" onChange="ajaxValidate(this.name,this.value);">
											<optgroup label="Hogyan talált ide?">
												<option value="" disabled selected>Hogyan talált ide?</option>
												<option value="0">-</option>
												<option value="1">LinkedIn</option>
												<option value="2">ZMS Pro-Ker Kft.</option>
												<option value="3">Google keresés</option>
												<option value="4">Ismerős, barát</option>
												<option value="5">Egyéb</option>
											</optgroup>
										</select>
										<span class="help-block help-form">Nem kötelező.</span>
											<div id="question-validate"></div>
										</div>
									</div>									
									<div class="form-group">
										<label for="InputMessage" class="col-sm-1 control-label"><span class="glyphicon glyphicon-pencil" title="Üzenet" data-toggle="tooltip" data-placement="left" title="Üzenet"></span></label>
										<div class="col-sm-11">
											<textarea class="form-control" rows="5" placeholder="Ide írja üzenetét." id="InputMessage" name="message" maxlength="1500" onKeyUp="textareaChars(this.value);" onBlur="ajaxValidate(this.name,this.value)"></textarea>

												<div class="col-xs-2  remainingChars" id="remainingNumbers">1500</div>
												<div class="col-xs-10 remainingChars" id="remainingChar">karakter maradt</div>
												<div class="col-xs-12">	
													<div id="message-validate"></div>
												</div>
											<span class="help-block">Bármilyen kérése, kérdése van, kérem írjon bizalommal.</span>
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-12" id="captchaHolder">
											<script type="text/javascript">
												var RecaptchaOptions = {
												theme : 'white'
												};
											</script>
											<?php
												require_once('functions/captcha/recaptchalib.php');
												$publickey = "6LduRvkSAAAAAOxXLkJ7ZNMHdc1WGbkKwB004xFt"; // you got this from the signup page
												echo recaptcha_get_html($publickey);
											?>
											<div id="recaptcha_response_field-validate"></div>
										</div>
										<div class="col-xs-12" id="ajx-loading" style="height:30px;display:table;text-align:center;"></div>										

									</div>			
							</div>
							<div class="modal-footer">
									<button type="button" class="btn btn-default gombok" data-dismiss="modal">Bezárás</span></button>
									<button type="submit" class="btn btn-warning gombok">Üzenet elküldése <span class="glyphicon glyphicon-ok"></span></button>
								</form><!-- End of Contact Form -->
							</div>
						</div>
					</div>
				</div>
			</div>

            <div class="row marketing">
                <div class="col-lg-6">
                    <h4>Üdvözlöm!</h4>
                    <p class="justify">Kérem tekintse meg az alábbi pontokat, ahol bővebb információkat olvashat a szakmai tapasztalatimról, az iskoláimról, nyelvtudásomról és készségeimről. </p>
                </div>
                <div class="col-lg-6">
                    <h4>Szeretne egy hasonló weboldalt?</h4>
                    <p>Az oldal egy másik célja, hogy bemutassa gyakorlati tudásom. Ha szeretne egy hasonló honlapot, kérem keressen fel az elérhetőségeim valamelyikén.</p>
                </div>
            </div>
			<!-- 2 -->
			<div class="row marketing">
                <div class="col-xs-12">
					<!-- Szakmai tapasztalat -->
					<div class="panel-group" id="accordion1">
						<div class="panel panel-default">
							<a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne" data-recog="szakma" onClick="openSection(this.getAttribute('data-recog'));">
								<div class="panel-heading kek">
									<div class="header-icon pull-left">
										<img src="images/icons/work.svg" style="height:32px; width:32px" alt="work icon">
									</div>
									<h4 class="panel-title focimek">
										Szakmai tapasztalat:<span class="glyphicon glyphicon-chevron-down pull-right szakma"></span>
									</h4>
								</div>
							</a>
							<div id="collapseOne" class="panel-collapse collapse">
								<div class="panel-body worky">
									<div class="row marketing">
										<div class="col-xs-12 col-sm-6">
											<div class="thumbnail animated bounceInLeft" id="work-hdagency">
												<img src="images/szakmai/hdagencykft.png" alt="HD Marketing - Online marketing kereső ügynökség - SEO, PPC, Analytics">
												<div class="caption w-same-h">
													<h3><strong>HD Agency Kft.</strong></h3>
													<h4><small>2014.márc. - 2014.máj.</small></h4><hr/>
													<ul class="m-t-space">
														<li>Google Adwords kampánykezelés</li>
														<li>Google Analytics riporting és elemzés</li>
														<li>Kulcsszó kutatás és elemzés</li>
														<li>SEO</li>
													</ul>
												</div>
											</div>
										</div>
										<div class="col-xs-12 col-sm-6">
											<div class="thumbnail animated bounceInRight" id="work-zms">
												<img src="images/szakmai/zmsprokerkft.png" alt="ZMS Pro-Ker Kft. - Kiváló ár-érték arányú kézzel készült fa bútorok.">
												<div class="caption w-same-h">
													<h3><strong>ZMS Pro-Ker Kft.</strong></h3>
													<h4><small>2005 - jelenleg is</small></h4><hr/>													
													<ul class="m-t-space">
														<li>Bútor kiskereskedelem</li>
														<li>Weblap tervezése, kivitelezése és optimalizálása</li>
														<li>Online Marketing</li>
														<li>Termék fotózás</li>
														<li>Arculat megtervezése</li>
														<li>Ad-hoc feladatok</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div><!-- End of Szakmai tapasztalat -->
					
					<!-- Tanulmányok -->
					<div class="panel-group" id="accordion2" >
						<div class="panel panel-default">
							<a data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo" data-recog="tanulmanyok" onClick="openSection(this.getAttribute('data-recog'));">
								<div class="panel-heading zold">
									<div class="header-icon pull-left">
										<img src="images/icons/study.svg" style="height:32px; width:32px" alt="study icon">
									</div>
									<h4 class="panel-title focimek">
										Tanulmányok:<span class="glyphicon glyphicon-chevron-down pull-right tanulmanyok"></span>
									</h4>
								</div>
							</a>
							<div id="collapseTwo" class="panel-collapse collapse">
								<div class="panel-body worky">
								<!-- Slider -->
									<div class="row marketing fade-in">
										<div class="col-xs-10 col-xs-offset-1">
											<div id="range-slider"></div>
										</div>
									</div><!-- End of Slider-->
									<div class="row marketing">
										<div class="col-xs-12 col-sm-4">
											<div class="thumbnail animated bounceInDown kossuth-thumb" id="">
												<div class="one">
													<div class = "kossuth"></div>	
												</div>
												<div class="caption">
													<h3><strong><a href="">Kossuth Lajos Általános Iskola</a></strong></h3>
													<hr/><h4><small>Sajószentpéter</small></h4>
													<hr/><p class="center margin-padding"><b>1998-2006</b></p>
												</div>
											</div>
										</div>
										<div class="col-xs-12 col-sm-4">
											<div class="thumbnail animated bounce foldes-thumb" id="">
												<div class="one">
													<div class = "foldes">
													</div>	
												</div>												<div class="caption">
													<h3><strong><a href="">Földes Ferenc Gimnázium</a></strong></h3>
													<hr/><h4><small>Miskolc</small></h4>													
													<hr/><p class="center margin-padding"><b>2006-2010</b></p>
													<hr/><p  class="center margin-padding szak">Informatika szak</p>
												</div>
											</div>
										</div>
										<div class="col-xs-12 col-sm-4">
											<div class="thumbnail animated bounceInUp corvinus-thumb" id="">
												<div class="one">
													<div class = "corvinus">
													</div>	
												</div>												<div class="caption">
													<h3><strong><a href="">Budapesti Corvinus Egyetem</a></strong></h3>
													<hr/><h4><small>Budapest</small></h4>													
													<hr/><p class="center margin-padding"><b>2010-2014</b></p>
													<hr/><p  class="center margin-padding szak">Gazdaságinformatikus BSC képzés</p>
												</div>
											</div>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div><!-- End of Szakmai tapasztalat -->
					
					<!-- Nyelvtudás -->
					<div class="panel-group" id="accordion3">
						<div class="panel panel-default">
							<a data-toggle="collapse" data-parent="#accordion3" href="#collapse3"  data-recog="nyelvtudas" onClick="openSection(this.getAttribute('data-recog'));">
								<div class="panel-heading narancs">
									<div class="header-icon pull-left">
										<img src="images/icons/languages.svg" style="height:32px; width:32px" alt="languages icon">
									</div>
									<h4 class="panel-title focimek">
										Nyelvtudás:<span class="glyphicon glyphicon-chevron-down pull-right nyelvtudas"></span>
									</h4>
								</div>
							</a>
							<div id="collapse3" class="panel-collapse collapse">
								<div class="panel-body">
									<div class="row nyelv-row">
									<div class="col-xs-10 col-xs-offset-1 nyelv-tarto animated bounceInLeft">
										<div class="col-xs-4">
											<div class="outer">
												<div class="middle">
													<div class="inner-angol"></div>
												</div>
											</div>
										</div>
										<div class="col-xs-8 nyelv-leiras">
											<h3>Angol C1 szint</h3>
											<hr/>
											<small><b>(1998-2010)</b></small><hr/>
											<ul>
												<li><small>2009.09.05. - EuroExam C1</small></li>
												<li><small>2009.12.13. - EuroExam B2</small></li>
											</ul>
										</div>
									</div>	
									</div>
									<div class="row nyelv-row">
									<div class="col-xs-10 col-xs-offset-1 nyelv-tarto animated bounceInRight">
										<div class="col-xs-4">
											<div class="outer">
												<div class="middle">
													<div class="inner-spanyol"></div>
												</div>
											</div>
										</div>
										<div class="col-xs-8 nyelv-leiras">
											<h3>Spanyol - kezdő</h3>
											<hr/>
											<small><b>(2013-2014)</b></small><hr/>
										</div>
									</div>										</div>
									<div class="row nyelv-row">
									<div class="col-xs-10 col-xs-offset-1 nyelv-tarto animated bounceInLeft">
										<div class="col-xs-4">
											<div class="outer">
												<div class="middle">
													<div class="inner-nemet"></div>
												</div>
											</div>
										</div>
										<div class="col-xs-8 nyelv-leiras">
											<h3>Német - kezdő</h3>
											<hr/>
											<small><b>(2006-2010)</b></small><hr/>
										</div>
									</div>	
									</div>
								</div>
							</div>
						</div>
					</div><!-- End of Nyelvtudás -->
						
					<!-- Készségek -->
					<div class="panel-group" id="accordion4">					
						<div class="panel panel-default">
							<a data-toggle="collapse" data-parent="#accordion4" href="#collapse4"  data-recog="skills" onClick="openSection(this.getAttribute('data-recog'));">
								<div class="panel-heading lila">
									<div class="header-icon pull-left">
										<img src="images/icons/skills.svg" style="height:32px; width:32px" alt="skills icon">
									</div>

									<h4 class="panel-title focimek">
										Készségek:<span class="glyphicon glyphicon-chevron-down pull-right skills"></span>
									</h4>
								</div>
							</a>
							<div id="collapse4" class="panel-collapse collapse">
								<div class="panel-body worky">
									<div class="row">
										<div class="col-sm-4">
											<div class="thumbnail animated fadeIn" id="">
												<img src="images/keszsegek/office.png" alt="Microsoft Office, Excel, Word, Powerpoint, Access, Visio" id="office" data-recog="office" onMouseover="animateSkills(this.getAttribute('data-recog'));"/>
												<div class="caption">
												<h4>Microsoft Office</h4><hr/>
													<ul>
														<li>Excel</li>
														<li>Word</li>
														<li>Powerpoint</li>
														<li>Access</li>
														<li>Visio</li>
													</ul>
												</div>
											</div>
										</div>
										<div class="col-sm-4">
											<div class="thumbnail animated fadeIn" id="">
												<img src="images/keszsegek/vstudio.png" alt="Microsoft Visual Studio C#" id="vstudio" data-recog="vstudio" onMouseover="animateSkills(this.getAttribute('data-recog'));"/>
												<div class="caption">
												<h4>MS Visual Studio C#</h4><hr/>
													<ul>
														<li>C# programnyelv ismerete</li>
														<li>Alkalmazások készítése</li>
													</ul>												
												</div>
											</div>										
										</div>
										<div class="col-sm-4">
											<div class="thumbnail animated fadeIn" id="">
												<img src="images/keszsegek/photoshop.png" alt="Adobe Photoshop, képszerkesztés, webdesign, logo és arculat tervezés, reklámanyagok tervezése" id="aphotoshop" data-recog="aphotoshop" onMouseover="animateSkills(this.getAttribute('data-recog'));"/>
												<div class="caption">
												<h4>Adobe Photoshop</h4><hr/>
													<ul>
														<li>Grafikák tervezése</li>
														<li>Weboldalak tervezése</li>
														<li>Logo tervezés</li>
														<li>Arculattervezés</li>
														<li>Reklámanyagok, plakátok</li>
													</ul>
												</div>
											</div>										
										</div>
										<div class="col-sm-4">
											<div class="thumbnail  animated fadeIn" id="">
												<img src="images/keszsegek/webfejlesztes.png" alt="Webfejlesztés, Front-end, Back-end, Full-stack, JavaScript, HTML5, CSS3, PHP, AJAX"/ id="webdev" data-recog="webdev" onMouseover="animateSkills(this.getAttribute('data-recog'));">
												<div class="caption">
												<h4>Webfejlesztés</h4><hr/>
													<ul>
														<li>HTML/HTML5</li>
														<li>CSS/CSS3</li>
														<li>Javascript/Jquery/AJAX</li>
														<li>PHP/MySQL</li>
													</ul>
												</div>
											</div>										
										</div>
										<div class="col-sm-4">
											<div class="thumbnail  animated fadeIn" id="">
												<img src="images/keszsegek/adatbaziskezeles.png" alt="Adatbázis kezelés, SQL, Access, Oracle"/ id="dbs" data-recog="dbs" onMouseover="animateSkills(this.getAttribute('data-recog'));">
												<div class="caption">
												<h4>Adatbázis kezelés</h4><hr/>
													<ul>
														<li>SQL nyelv ismerete</li>
														<li>MySQL/phpMyAdmin</li>
														<li>Oracle SQL developer</li>
														<li>Access/MS SQL Server</li>
													</ul>
												</div>
											</div>										
										</div>
										<div class="col-sm-4">
											<div class="thumbnail  animated fadeIn" id="">
												<img src="images/keszsegek/google.png" alt="Online Marketing, Google Adwords, Google Analytics, SEO, YouTube marketing, Facebook marketing"/ id="omarketing" data-recog="omarketing" onMouseover="animateSkills(this.getAttribute('data-recog'));">
												<div class="caption">
												<h4>Online marketing</h4><hr/>
													<ul>
														<li>Google Adwords</li>
														<li>Google Analytics</li>
														<li>SEO</li>
														<li>YouTube marketing</li>
														<li>Facebook marketing</li>
													</ul>
												</div>
											</div>										
										</div>
										<div class="col-sm-4">
											<div class="thumbnail  animated fadeIn" id="">
												<img src="images/keszsegek/egyeb.png" alt="Folyamatos fejlődés, kíváncsiság, kreativitás, megbízhatóság, precizitás."/ id="oskills" data-recog="oskills" onMouseover="animateSkills(this.getAttribute('data-recog'));">
												<div class="caption">
												<h4>Egyéb készségek</h4><hr/>
													<ul>
														<li>Folyamatos fejlődés</li>
														<li>Kreativitás</li>
														<li>Kíváncsiság</li>
														<li>Megbízhatóság</li>
														<li>Precizitás</li>
													</ul>
												</div>
											</div>										
										</div>
									</div>
								</div>
							</div>
						</div>
					</div><!-- End of Skills -->						

				</div>
			</div>
			<!-- Contact -->
			<div class="row marketing">
				
				<div class="col-xs-12">
				<ul class="nav nav-tabs" role="tablist">
					<li class="active"><a href="" class="no-link">Elérhetőségek</a></li>
				</ul>
					<address>	<hr/><br/><hr/><hr/>				
						&nbsp; <span class="glyphicon glyphicon-user"></span> &nbsp;| <strong>Molnár Szabolcs</strong><hr/>
						&nbsp; <abbr title="Tartózkodási hely"><span class="glyphicon glyphicon-home"></abbr> &nbsp;| Budapest / Miskolc<hr/>
						<!--<abbr title="Telefon"><span class="glyphicon glyphicon-earphone"></span></abbr> (30)111-2222<br/>-->
						&nbsp; <abbr title="E-mail"><span class="glyphicon glyphicon-envelope"></span></abbr> &nbsp;| <a href="mailto:#">molnar.szabolcs.privat@example.com</a><hr/><hr/><br/><hr id="flip-hr"/><hr id="flip-hr2"/>
					<span class="badge pull-right" id="oldalszam">1</span>
					</address>
				</div>
				<hr/>
			</div>
			<!-- End of Contact -->
			<!-- Footer -->
            <div class="footer pg-footer">
                <p>Készítette: <strong>Molnár Szabolcs</strong> &copy;2014</p>
            </div>

        </div>
		<div class="grad-bg"></div>
		
        <!-- build:js scripts/vendor.js -->
        <!-- bower:js -->
        <script src="../bower_components/jquery/dist/jquery.js"></script>
        <script src="../bower_components/jquery-ui/jquery-ui.min.js"></script>
        <script src="../bower_components/bootstrap/dist/js/bootstrap.js"></script>
        <!-- endbower -->
        <!-- endbuild -->

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
        </script>

        <!-- build:js scripts/plugins.js -->
        <script src="../bower_components/bootstrap/js/affix.js"></script>
        <script src="../bower_components/bootstrap/js/alert.js"></script>
        <script src="../bower_components/bootstrap/js/dropdown.js"></script>
        <script src="../bower_components/bootstrap/js/tooltip.js"></script>
        <script src="../bower_components/bootstrap/js/modal.js"></script>
        <script src="../bower_components/bootstrap/js/transition.js"></script>
        <script src="../bower_components/bootstrap/js/button.js"></script>
        <script src="../bower_components/bootstrap/js/popover.js"></script>
        <script src="../bower_components/bootstrap/js/carousel.js"></script>
        <script src="../bower_components/bootstrap/js/scrollspy.js"></script>
        <script src="../bower_components/bootstrap/js/collapse.js"></script>
        <script src="../bower_components/bootstrap/js/tab.js"></script>
		<!-- Holderjs -->
        <script src="../bower_components/holderjs/holder.js"></script>
		<!-- noUiSlider -->
        <script src="../bower_components/nouislider/jquery.nouislider.min.js"></script>
		<!-- JQuery Cookie -->
        <script src="../bower_components/jquery-cookie/jquery.cookie.js"></script>
        <!-- endbuild -->

        <!-- build:js({app,.tmp}) scripts/main.js -->
        <script src="scripts/main.js"></script>
		<script src="scripts/ajax/lang.js"></script>
		<script src="scripts/ajax/validate.js"></script>
		<script src="scripts/MyNouislider.js"></script>
		<script src="scripts/form.js"></script>
        <!-- endbuild -->
</body>
</html>
