	
//When Mouse rolls over li
	$(document).ready(function(){
	//Hide the tooglebox when page load
	//$("#primary-nav .sub_links").hide();
	//slide up and down when hover over heading 2
$(".main_menu ul.nav li").click(function(){
	// slide toggle effect set to slow you can set it to fast too.
	$(this).next(".main_menu ul.nav .sub_links").slideToggle("slow");
	return true;
	});


	//	jQuery('#primary-nav .parent_link').toggle(
//function () {
//$("#primary-nav .parent_link").next('#primary-nav .sub_links').fadeIn('slow', function() {
// Animation complete

//});
//},
//function () {
//$(this).parent().find('#primary-nav .sub_links').fadeOut('slow', function() {
// Animation complete
//});

//});




	});

	