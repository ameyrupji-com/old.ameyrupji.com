$(document).ready(function()
{
	hash=window.location.hash;
	slide("#sliding-navigation", 15, 0, 150, .8);
	checkURL(hash);
	$('#menu ul#sliding-navigation li.sliding-element a').click(function (e){
		checkURL(this.hash);
	}); 
	
});

function checkURL(hash)
{	
	if(hash=="") {
		$('.contentsDiv').hide();
		$('#homeDiv').fadeIn();
	}
	else {
		$('.contentsDiv').hide();
		$(hash).fadeIn();
	}
}


function slide(navigation_id, pad_out, pad_in, time, multiplier)
{
	// creates the target paths
	var list_elements = navigation_id + " li.sliding-element";
	var link_elements = list_elements;
	
	// initiates the timer used for the sliding animation
	var timer = 0;
	
	// creates the slide animation for all list elements 
	$(list_elements).each(function(i)
	{
		// margin left = - ([width of element] + [total vertical padding of element])
		$(this).css("margin-left","-180px");
		// updates timer
		timer = (timer*multiplier + time);
		$(this).animate({ marginLeft: "0" }, timer);
		$(this).animate({ marginLeft: "15px" }, timer);
		$(this).animate({ marginLeft: "0" }, timer);
	});

	// creates the hover-slide effect for all link elements 		
	$(link_elements).each(function(i)
	{
		$(this).hover(
		function()
		{
			$(this).animate({ paddingLeft: pad_out }, 150);
		},		
		function()
		{
			$(this).animate({ paddingLeft: pad_in }, 150);
		});
	});
}

function displayDiv(reqDiv)
{
	$('.contentsDiv').hide();
	$(reqDiv).fadeIn();
}