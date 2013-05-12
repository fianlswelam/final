$(document).ready(function(){ 

	    $('a.thumb').hover(
	                            
	        function()
	        {
	            $('<a class="zoom">zoom</a>').appendTo(this).css({
					dispay:'block', 
					opacity:0, 
					height:$(this).children('img').height(), 
					width:$(this).children('img').width(),
					'top':$(this).css('padding-top'),
					'left':$(this).css('padding-left'),
					padding:0}).animate({opacity:0.6}, 500);
	        },
	        
	        function()
	        {           
	            $('.zoom').fadeOut(500, function(){$(this).remove()});
	        }
	    );
	    $('.video a[data-pretty^=prettyPhoto]').hover(
	                            
	        function()
	        {
	            $('<a class="zoom-video">zoom</a>').appendTo(this).css({
					dispay:'block', 
					opacity:0, 
					height:$(this).children('img').height(), 
					width:$(this).children('img').width(),
					'top':$(this).css('padding-top'),
					'left':$(this).css('padding-left'),
					padding:0}).animate({opacity:0.6}, 500);
	        },
	        
	        function()
	        {           
	            $('.zoom-video').fadeOut(500, function(){$(this).remove()});
	        }
	    );
});	

/* mobile menu select */
	$(function() {
	 
      // Create the dropdown base
      $("<select />").appendTo("nav");
      
      // Create default option "Go to..."
      $("<option />", {
         "selected": "selected",
         "value"   : "",
         "text"    : "Go to..."
      }).appendTo("nav select");
      
      // Populate dropdown with menu items
      $("nav a").each(function() {
       var el = $(this);
       $("<option />", {
           "value"   : el.attr("href"),
           "text"    : el.text()
       }).appendTo("nav select");
      });
      
	   // To make dropdown actually work
	   // To make more unobtrusive: http://css-tricks.com/4064-unobtrusive-page-changer/
      $("nav select").change(function() {
        window.location = $(this).find("option:selected").val();
      });
	 });