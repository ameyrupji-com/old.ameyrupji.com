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
    <link rel="shortcut icon" href="../template/images/favicon.gif">
</head> 
<body class="ui-mobile-viewport">
<?php include('menu.html'); ?>
<div data-role="page" class="type-home" id="page">
	<div data-role="header" data-position="inline" data-theme="b">
    	<a href="" id="slideMenu" data-role="none" class="menu"> Menu</a>
        <h1>Connect with me</h1>
        <a href="" data-rel="back" data-role="none" class="back"> Back</a>
    </div>
    
	<div data-role="content-wrap">
        <div id="adr-homeheader">
            <a href="" id="ameyRupjiMobileLogo"></a>
        </div>
    	<div data-role="content" data-theme="d" class="ui-page-full">
			<h1>Connect With Me</h1><hr class="headerLine" />
        	<ul data-role="listview" data-inset="false" data-theme="c" data-dividertheme="b" style="box-shadow:0 0 0 0">
				<li><a href="http://www.facebook.com/ameyrupji/"><img class="ui-li-icon ui-li-thumb ui-corner-tl" alt="" src="../template/mobile/images/social-icons/facebook.png">Facebook</a></li>
				<li><a href="#"><img class="ui-li-icon ui-li-thumb ui-corner-tl" alt="" src="../template/mobile/images/social-icons/linkedin.png">LinkedIn</a></li>
				<li><a href="#"><img class="ui-li-icon ui-li-thumb ui-corner-tl" alt="" src="../template/mobile/images/social-icons/twitter.png">Twitter</a></li>
			</ul>
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
$(function() {
	$("#slideMenu").toggle(
	function() {
		$("#menu").css('display','block');
		$("#menu").css('position','absolute');
		$("#page").css('position','fixed');
		$("#page").animate({marginLeft:"275px",},'slow',function(){ 
			$('#page').live('swipeleft',function(event) {
				$("#page").animate({marginLeft:"0px",},300,function(){
					$("#menu").css('position','fixed');
					$("#menu").css('display','none'); 
				});
				$("#page").css('position','absolute');
			});
		});
	},
	function() {
		$("#page").animate({marginLeft:"0px",},300,function(){
			$("#menu").css('position','fixed');
			$("#menu").css('display','none');
		});
		$("#page").css('position','absolute');
	});
});
</script>
</body>
</html>
