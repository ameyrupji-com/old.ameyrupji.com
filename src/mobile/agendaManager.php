<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Amey Rupji Mobile :: Recent Work :: Agenda Manager</title>
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
        <h1>Agenda Manager</h1> 
        <a href="" data-rel="back" data-role="none" class="back"> Back</a>
    </div>
    
	<div data-role="content-wrap">
        <div id="adr-homeheader">
            <a href="" id="ameyRupjiMobileLogo"></a>
        </div>
    	<div data-role="content" data-theme="d" class="ui-page-full">
            <?php include('../recentWork/agendaManager/agendaManager.html');?>
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
