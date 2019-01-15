$(document).ready(function () {

	$(".elem1").mouseover(function () {
		$(this).animate({
			backgroundColor: "rgb(80,160,80)",
			color: "white",
		});
	});
	$(".elem1").mouseleave(function () {
		$(this).animate({
			backgroundColor: "white",
			color: "black"
		});
	});

	$(".list h5").mouseover(function () {
		$(this).animate({
			backgroundColor: "rgb(197, 197, 197)",
		});
	});
	$(".list h5").mouseleave(function () {
		$(this).animate({
			backgroundColor: "rgb(238, 238, 238)",
		});
	});

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

	$(window).scroll(function () {
		$(".cute-icons").css({
			"top": $(window).scrollTop()
		})
	});


	var phone;
	if ($(window).width() < 1100)
		phone = true;
	else
		phone = false;
	$(window).resize(function () {
		if ($(window).width() < 1100) {
			phone = true;
		}
		else {
			phone = false;
		}
	});

	var opened = false;
	$(".bit-of-list").mouseenter(function () {
		if (!phone && !opened) {
			opened = true;
			$(this).find(".go-down-space").animate({
				height: "150px",
				opacity: "1"
			})
		}
	})
	$(".bit-of-list").mouseleave(function () {
		$(this).find(".go-down-space").animate({
			height: "0px",
			opacity: "0"
		}, function () {
			opened = false;
		})
	});

	$("#button-to-order").mouseover(function () {
		$(this).css({
			"background-color": "rgba(0,0,0,0.1)"
		})
	});
	$("#button-to-order").mouseleave(function () {
		$(this).css({
			"background-color": "rgba(0,0,0,0.05)"
		})
	});
	$("#button-to-order").click(function () {
		location.href = 'order.php';
	})
});