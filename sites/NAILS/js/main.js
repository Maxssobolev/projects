$(document).ready(function() {
	$('.slider').slick({
		arrows: false,
		dots:true,
		appendDots: $('.menu'),
		infinite: false, //небесконечный слайдер
		draggable: false, //no-swipe
		waitForAnimate:false,
		fade: true,
  		cssEase: 'ease-in',
  		slidesToShow: 1,
  		
  		swipe: false,
		swipeToSlide: false,
		touchMove: false,
		draggable: false,
		adaptiveHeight: true
	});

	$('.carousel').slick({
		arrows: true,
		dots:false,
		//autoplay: true,
		infinite: true, //небесконечный слайдер
		cssEase: 'ease',
		waitForAnimate:false,
		
	});


$("button[aria-controls=slick-slide00]").text("МАНИКЮР");
$("button[aria-controls=slick-slide01]").text("ПЕДИКЮР");
$("button[aria-controls=slick-slide02]").text("БРОВИ | РЕСНИЦЫ");
$("button[aria-controls=slick-slide03]").text("ПЕРМАНЕНТНЫЙ МАКИЯЖ");

if($(window).width() <= 900){
	$(".headers h2:nth-child(2)").fadeOut();
} 
$("#map iframe").height($('#map').height());
$("#map iframe").width($('#map').width());


/*
$(".menu button").click(function(){
	$(".price").height($('.slick-list').height());
});
*/

$(window).resize(
	function(){
		$("#map iframe").height($('#map').height());
		$("#map iframe").width($('#map').width());

		

		if($(window).width() <= 900){
			$(".headers h2:nth-child(2)").fadeOut();
			
		} 
		else {
			$(".headers h2:nth-child(2)").fadeIn();
			
		}
	});





 
$(window).scroll(function(){
	if ($(this).scrollTop() > 600) {
	$('.scrollup').fadeIn();
	} else {
	$('.scrollup').fadeOut();
	}
});
 
$('.scrollup').click(function(){
$("html, body").animate({ scrollTop: 400 }, 600);
return false;
});



});