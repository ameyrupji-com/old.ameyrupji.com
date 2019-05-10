<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Amey Rupji Mobile :: Contact</title>
	<link rel="stylesheet" href="../template/mobile/css/jquery.mobile-1.0rc2.css" />
	<script src="../template/js/jquery-1.7.1.min.js"></script>
	<script src="../template/mobile/js/jquery.mobile-1.1.0-rc.2.min.js"></script>
    <script src="../template/js/jquery.validate.js"></script>
    <link rel="shortcut icon" href="../template/images/favicon.gif">
	
</head> 
<body class="ui-mobile-viewport">
<?php include('menu.html'); ?>
<div data-role="page" class="type-home" id="page">
	<div data-role="header" data-position="inline" data-theme="b">
        <a href="" id="slideMenu" data-role="none" class="menu"> Menu</a>
        <h1>Work Experience</h1> 
        <a href="" data-rel="back" data-role="none" class="back"> Back</a>
    </div>
    
	<div data-role="content-wrap">
    	<div id="adr-homeheader">
            <a href="" id="ameyRupjiMobileLogo"></a>
        </div>
    	<div data-role="content" data-theme="d" class="ui-page-full">
            <h1>Work Experience</h1><hr class="headerLine" />
            <h2>Graduate Web Student (Graduate Assistant)
                <span class="workPlace">
                    <a href="http://www.depts.ttu.edu/itts/" target="_blank">Technology Support</a>,<br />
                    <a href="http://www.depts.ttu.edu/infotech/" target="_blank">Information Technology Division</a>,<br />
                    <a href="http://www.ttu.edu/" target="_blank">Texas Tech University</a></span></h2>
            <p>Working as a Graduate Assistant at the Technology Support Department's Web Services Team I was able to apply Software Development and Project Management concepts in web projects. The project ranged from web designing (mobile also) to working with advance technologies such as Microsoft SharePoint. This job has exposed me to major IT processes like Time Lines, Documentation, Development, Review (Testing) and Modifications and also help me improve my interpersonal and communication skills. </p>
            
            <h3>From:</h3>
            <p>September 2011</p>
            
            <h3>To:</h3>
            <p>Till date</p>
            
            <div data-role="collapsible" data-theme="d" data-content-theme="c">
               <h3>Knowledge Gained</h3>
               <ul>
                    <li>Web Designing with jQuery with major concentration on web accessibility</li>
                    <li>Mobile Web Development</li>
                    <li>Understanding advanced technologies like Microsoft SharePoint</li>
                    <li>Working on project in a team environment</li>
                </ul>
            </div>
            
            <h2>Web Project Manager (Graduate Assistant)
                <span class="workPlace">
                    <a href="http://www.ba.ttu.edu/" target="_blank">Rawls College of Business Administration</a>,<br />
                    <a href="http://www.ttu.edu/" target="_blank">Texas Tech University</a></span></h2>
            <p>As a Web Project Manager at RCOBA my main responsibility was developing and improving websites throughout the Rawls College of Business. This included customizing and modifying templates web templates. Working under Dr. Laverie (Sr. Associate Dean, RCOBA), I have tried to enhance the web experience of the RCOBA websites by providing mobile support for devices such as iPhone, Android, Blackberry and Symbian. </p>
            
            <h3>From:</h3>
            <p>November 2010</p>
            
            <h3>To:</h3>
            <p>September 2011 </p>
            
            <div data-role="collapsible" data-theme="d" data-content-theme="c">
               <h3>Knowledge Gained</h3>
               <ul>
                    <li>Web Designing with advance use of CSS2, CSS3 and jQuery</li>
                    <li>Mobile Web Development</li>
               </ul>
               
            </div>
            
             <h2>Student Assistant
                <span class="workPlace">
                    <a href="http://bacs.ba.ttu.edu/" target="_blank">Business Administration Computing Services</a>,<br />
                    <a href="http://www.ba.ttu.edu/" target="_blank">Rawls College of Business Administration</a>,<br />
                    <a href="http://www.ttu.edu/" target="_blank">Texas Tech University</a></span></h2>
            <p>As a Student Assistant for Business Administration Computing Services at RCOBA my prime responsibility was managing printing services and providing technical assistance with printing in lab.</p>
            
            <h3>From:</h3>
            <p>August 2010</p>
            
            <h3>To:</h3>
            <p>October 2010 </p>
            
            <div data-role="collapsible" data-theme="d" data-content-theme="c">
               <h3>Knowledge Gained</h3>
               <ul>
                    <li>Customer Service</li>
                    <li>Time Management</li>
               </ul>
            </div>
    	</div>
    </div>
	<div data-role="footer" class="footer-docs" data-theme="f">
    	<center>
			<p style="color:#fff">Creative Commons Amey Rupji</p>
        </center>
	</div>
</div>
<script src="../template/mobile/js/ios-orientationchange-fix.js"></script>
<script type="text/javascript">
$(function () {   
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
});
</script>
</body>
</html>
