$(document).ready(function () {

	$(".icon-back").mouseover(function () {
		$(this).css({
			"background-color": "rgba(0,0,0,0.1)"
		})
	});
	$(".icon-back").mouseleave(function () {
		$(this).css({
			"background-color": "rgba(0,0,0,0.05)"
		})
	});

	$(window).scroll(function(){
		$(".cute-icons").css({
			"top": $(window).scrollTop()
		})
	});
});