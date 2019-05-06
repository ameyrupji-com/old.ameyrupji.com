<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Amey Rupji Mobile :: Contact</title>
	<link rel="stylesheet" href="../template/mobile/css/jquery.mobile-1.0rc2.css" />
	<script src="../template/js/jquery-1.7.1.min.js"></script>
	<script src="../template/mobile/js/jquery.mobile-1.1.0.js"></script>
    <script src="../template/js/jquery.validate.js"></script>
    <!-- Geolocation -->
	<script type="text/javascript"src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBlvouF_UlU-hQLJEWgA6jM9yPP9U3SBzk&sensor=false"></script>
    <script type="text/javascript" src="http://maps.gstatic.com/intl/en_us/mapfiles/400d/maps2.api/main.js"></script>
	<script src="../template/js/geolocation.js" type="text/javascript"></script>
    <link rel="shortcut icon" href="../template/images/favicon.gif">
</head> 
<body class="ui-mobile-viewport">
<?php include('menu.html'); ?>
<div data-role="page" class="type-home" id="page">
	<div data-role="header" data-position="inline" data-theme="b">
        <a href="" id="slideMenu" data-role="none" class="menu"> Menu</a>
        <h1>Contact Me</h1>
        <a href="" data-rel="back" data-role="none" class="back"> Back</a>
    </div>
    
	<div data-role="content-wrap">
        <div id="adr-homeheader">
            <a href="" id="ameyRupjiMobileLogo"></a>
        </div>
    	<div data-role="content" data-theme="d" class="ui-page-full">
        	<h1>Contact Form</h1><hr class="headerLine" />
            <p>Please fill in your details below and click Submit</p>
            <form method="post" id="ContactForm" class="validate" >
                <div id="yourNameDiv" data-role="fieldcontain">
                    <label for="nameC" class="ui-input-text"><span class="reqBlue">*</span>  Name</label>  
                    <input type="text" name="nameC" id="nameC" value="" placeholder="Name" class="required"/> 
                </div>
                <div id="emailDiv" data-role="fieldcontain" class="ui-input-text">
                    <label for="emailC"><span class="reqBlue">*</span>  Email</label>
                    <input type="text" name="emailC" id="emailC" value="" placeholder="Email" class="required"/> 
                </div>
                	
                <div id="reasonDiv" data-role="fieldcontain">
                    <label for="message_subject" class="ui-input-text"><span class="reqBlue">*</span>  Reason for contacting me</label>
                    <select name="message_subject" id="message_subject" class="required">
                        <option value="">-- Please Select --</option>
                        <option value="General">General Comments</option>
                        <option value="Website">Website Review</option>
                        <option value="express">Job Opprotunities</option>
                    </select>
                </div>

                <div id="orgDiv" data-role="fieldcontain">
                    <label for="message_body" class="ui-input-text"><span class="reqBlue">*</span>  Comments</label>  
                    <textarea id="message_body" name="message_body" rows="8" placeholder="Please Enter your Comments..." class="required"></textarea> 
                </div>
                <p><span class="reqBlue">*</span>  Required Field</p>
                <button data-theme="b" type="submit" class="ui-btn-hidden" aria-disabled="false">Submit</button>
                <div class="locationName">
                    <img alt="loading" src="../template/mobile/images/ajax_load.gif">
                    <div class="text"></div>
                </div>
        	</form>
            
            
            <a id="locationImg" class="location off nyroModal" href="#"></a>
            <div id="msg"></div>
        </div>
    </div>
	<div data-role="footer" class="footer-docs" data-theme="f">
    	<center>
			<p style="color:#fff">Creative Commons Amey Rupji</p>
        </center>
	</div>
    <script type="text/javascript">
	//<![CDATA[
	
	$(document).ready(function(e) {
		getLocation();
        $( "#ContactForm" ).validate({
			rules: {
				name: "required",
				email: "required",
				message_subject: "required",
				message_body:"required"
			},
			messages: {
				name: "Please enter your Name",
				email: "Please enter your Email",
				message_subject: "Please select Subject",
				message_body: "Please enter Message"
			},
			submitHandler: function( form ) {
				$.mobile.showPageLoadingMsg();

				// disable submit button
				$('#ContactForm').attr('disabled', true);
				var formData = $("#ContactForm").serialize();
				
				$.ajax({
					type: "POST",
					url: "../contactJSON.php",
					cache: false,
					data: formData,
					dataType: 'json',
				}).done(function(json) {
					// AJAX JSON response format: {"type" : "success", "message" : "Thank-You for submitting the form!"}
					
					$('#contactSubmit').attr('disabled', false);
					$.mobile.hidePageLoadingMsg();
					$('#msg').removeClass().addClass(json.type).html(json.message).fadeIn('slow');
					if(json.type == 'success')
						$('#ContactForm').clearForm();
				});	
			}
		});
    });
	</script>
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
