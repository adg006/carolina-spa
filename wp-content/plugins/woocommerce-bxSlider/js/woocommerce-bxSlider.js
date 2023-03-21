$ = jQuery.noConflict();

$(document).ready(function(){
	$('.slider-products').bxSlider({
		auto: true,
		minSlides: 4,
		maxSlides: 4,
		slideWidth: 250,
		slideMargin: 10,
		moveSlides: 1
	});
});