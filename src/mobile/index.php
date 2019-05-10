<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start(); ?>
<!DOCTYPE html>
<html>
<head manifest="manifest.mf">
	<meta charset="utf-8">
	<title>Amey Rupji</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../template/mobile/css/jquery.mobile-1.0rc2.css" />
	<script src="../template/js/jquery-1.7.1.min.js"></script>
	<script src="../template/mobile/js/jquery.mobile-1.1.0.js"></script>
	<script src="../template/mobile/js/ios-orientationchange-fix.js"></script>
    <script src="../template/js/jquery.validate.js"></script>
    <!-- Geolocation -->
	<script type="text/javascript"src="http://maps.googleapis.com/maps/api/js?key=&sensor=false"></script>
    <script type="text/javascript" src="http://maps.gstatic.com/intl/en_us/mapfiles/400d/maps2.api/main.js"></script>
	<script src="../template/js/geolocation.js" type="text/javascript"></script>
    <script type="text/javascript">
	$.fn.clearForm = function() {
      return this.each(function() {
        var type = this.type, tag = this.tagName.toLowerCase();
        if (tag == 'form')
          return $(':input',this).clearForm();
        if (type == 'text' || type == 'password' || tag == 'textarea')
          this.value = '';
        else if (type == 'checkbox' || type == 'radio')
          this.checked = false;
        else if (tag == 'select')
          this.selectedIndex = -1;
      });
    };
	</script>
	<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1">
	<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1">
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<link rel="apple-touch-icon" href="../template/mobile/images/touchIcons/apple-touch-icon-57x57-precomposed.png" />
	<link rel="apple-touch-icon" sizes="72x72" href="../template/mobile/images/touchIcons/apple-touch-icon-ipad.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="../template/mobile/images/touchIcons/apple-touch-icon-iphone4.png" />
	<link rel="apple-touch-startup-image" sizes="768x1004" href="../template/mobile/images/touchIcons/apple-touch-startup-image-768x1004.png" />
	<link href="http://myweb.ttu.edu/arupji/template/mobile/images/touchIcons/apple-touch-startup-image-320x460.png" rel="apple-touch-startup-image">
	<link media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)" href="http://myweb.ttu.edu/arupji/template/mobile/images/touchIcons/apple-touch-startup-image-768x1004.png" rel="apple-touch-startup-image">
	<link media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)" href="http://myweb.ttu.edu/arupji/template/mobile/images/touchIcons/" rel="apple-touch-startup-image">
</head> 
<body> 
<?php include('menu.html'); ?>
<div data-role="page" class="type-home">
	<div data-role="content">
		<div class="content-secondary">
			<div id="adr-homeheader">
            	<a href="" id="ameyRupjiMobileLogo"></a>
			</div>
			<ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="b">
				<li><a href="aboutMe.php"><img class="ui-li-icon ui-li-thumb ui-corner-tl" alt="" src="../template/mobile/images/icons/aboutMe.png" >About Me</a></li>
				<li><a href="skills.php"><img class="ui-li-icon ui-li-thumb ui-corner-tl" alt="" src="../template/mobile/images/icons/skills.png" >Skills</a></li>
				<li><a href="work.php"><img class="ui-li-icon ui-li-thumb ui-corner-tl" alt="" src="../template/mobile/images/icons/work.png" >Work Experience</a></li>
				<li><a href="resume.php"><img class="ui-li-icon ui-li-thumb ui-corner-tl" alt="" src="../template/mobile/images/icons/resume.png">Resume</a></li>
                <li><a href="contact.php"><img class="ui-li-icon ui-li-thumb ui-corner-tl" alt="" src="../template/mobile/images/icons/contact.png">Contact</a></li>
			</ul>
            <ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="b">
            	<li data-role="list-divider">Share &raquo;</li>
				<li data-theme="d" id="social">
                	
                </li>
			</ul>
		</div><!--/content-primary-->	
        <div class="content-primary" >
        	<ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="b">
            	<li data-role="list-divider">What am I Upto &raquo;</li>
				<li data-theme="d">Seeking a full time entry level software and web application developer position</li>
			</ul>
            <ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="b">
            	<li data-role="list-divider">Connect With Me &raquo;</li>
                <li><a href="http://www.facebook.com/ameyrupji/"><img class="ui-li-icon ui-li-thumb ui-corner-tl" alt="" src="../template/mobile/images/social-icons/facebook.png">Facebook</a></li>
				<li><a href="#"><img class="ui-li-icon ui-li-thumb ui-corner-tl" alt="" src="../template/mobile/images/social-icons/linkedin.png">LinkedIn</a></li>
				<li><a href="#"><img class="ui-li-icon ui-li-thumb ui-corner-tl" alt="" src="../template/mobile/images/social-icons/twitter.png">Twitter</a></li>
			</ul>
            <ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="b">
            	<li data-role="list-divider">Recent Work &raquo;</li>
                <li data-theme="d">
                	<a href="agendaManager.php">
                        <img src="../recentWork/agendaManager/agendaManagerMobile.png" alt="Agenda Manager" />
                        <h3>Agenda Manager</h3>
                        <p>Built a heap by using priority queue to run a agenda manager</p>
					</a>
                </li>
			</ul>
			<nav>
				<ul data-role="listview" data-inset="true" data-theme="b" data-dividertheme="b" data-ajax="false">
					<li class="external"><a href="http://www.webpages.ttu.edu/arupji/index.php?vmode=full" rel="external" data-ajax="false"><img class="ui-li-icon ui-li-thumb ui-corner-tl" alt="" src="../template/mobile/images/icons/full.png">Full Website</a></li>
				</ul>
			</nav>
		</div>
	</div>
	<div data-role="footer" class="footer-docs" data-theme="f">
    	<center>
			<p style="color:#fff">Creative Commons Amey Rupji</p>
            <img src="../template/mobile/images/tech.png" width="300" height="40" alt="Technologies Used">
        </center>
	</div>	
</div>
<script type="text/javascript">
$("#page").live('pageshow', function () {   
	$("#slideMenu").toggle(
		function() {
			$("#menu").css('display','block');
			$("#menu").css('position','absolute');
			$("#page").css('position','fixed');
			$("#page").animate({marginLeft:"275px",},'slow',function(){ 
				var startX;
				var currentX;
				var dx;
				/*$('#page').live('swipeleft',function(event) {
					$('#page').unbind('touchstart');
					$('#page').unbind('touchmove');
					$('#page').unbind('touchend');
					$("#page").animate({marginLeft:"0px",},300,function(){
						$("#menu").css('position','fixed');
						$("#menu").css('display','none'); 
					});
					$("#page").css('position','absolute');
				});*/
				$('#page').bind('touchstart',function(e){
					e.preventDefault();
					startX = e.originalEvent.touches[0].pageX;
				});
				$('#page').bind('touchmove',function(e){
					e.preventDefault();
					currentX = e.originalEvent.touches[0].pageX;
					dx = startX - currentX;
					$("#page").animate({marginLeft:275 -dx,},0,function(){ 
						if( dx > 265) {
							$("#page").animate({marginLeft:"0px",},300,function(){
								$("#menu").css('position','fixed');
								$("#menu").css('display','none');
							});
							$("#page").css('position','absolute');
							$('#page').unbind('touchstart');
							$('#page').unbind('touchmove');
							$('#page').unbind('touchend');
						}
					});
				});
				$('#page').bind('touchend',function(e){
					e.preventDefault();
					if($('#my_div').is(':hidden'))
					{
						$('#page').unbind('touchstart');
						$('#page').unbind('touchmove');
						$('#page').unbind('touchend');
					}
					else
					{	 
						$("#page").animate({marginLeft:275 -dx,},0,function(){ 
							if( dx < 100) {
								$("#page").animate({marginLeft:"275px",},300,function(){ });
							}
							else {
								$("#page").animate({marginLeft:"0px",},300,function(){ 
									$("#menu").css('position','fixed');
									$("#menu").css('display','none');
									$("#page").css('position','absolute');
									$('#page').unbind('touchstart');
									$('#page').unbind('touchmove');
									$('#page').unbind('touchend');
								});
							}
						});
					}
					
				});
			});
		},
		function() {
			$("#page").animate({marginLeft:"0px",},300,function(){
				$("#menu").css('position','fixed');
				$("#menu").css('display','none');
			});
			$("#page").css('position','absolute');
		}
	);
	$(".tabMenu ul li a#skills").click(function(){
		$(".tabs").css('display','none');
		$("#skillsDiv").fadeIn("slow");
	});
	$(".tabMenu ul li a#projects").click(function(){
		$(".tabs").css('display','none');
		$("#projectsDiv").fadeIn("slow");
	});
});
$(document).ready(function(e) {
    setTimeout(function () {
		$("#social").load("../social.html");
	}, 1000);
});
</script>
</body>
</html>
