$(document).ready(function () {

	var dark = false;

	// light
	var letters_a = "black";
	var blocks_a = "white";
	var letters_b = "white";
	var blocks_b = "rgb(100,100,170)";
	var back = "white";
	var back_back = "white";

	var letters_button = "black"
	var back_button_a = "rgba(0,0,0,0.05)"
	var back_button_b = "rgba(0,0,0,0.1)"

	var comment_letters = "black";
	var comment_border = "rgba(255,255,255,0.04)";

	$(".elem1").mouseover(function () {
		$(this).animate({
			backgroundColor: blocks_b,
			color: letters_b,
		});
	});
	$(".elem1").mouseleave(function () {
		$(this).animate({
			backgroundColor: blocks_a,
			color: letters_a
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

	$(".switcher").click(function () {
		dark = !dark;
		if (dark) {
			$(this).find(".ball").animate({
				left: '36px'
			});
			$(this).animate({
				backgroundColor: "rgb(40,40,105)"
			})
		}
		else {
			$(this).find(".ball").animate({
				left: "-=36px"
			});
			$(this).animate({
				backgroundColor: "rgba(0,0,0,0.1)"
			})
		}
		changeColors(dark);
	})

	function changeColors(what) {
		if (what) {
			letters_a = "white";
			blocks_a = "black";
			letters_b = "black";
			blocks_b = "rgb(50,50,100)";
			back = "black";
			back_back = "black"
			letters_button = "white"
			back_button_a = "rgba(255,255,255,0.05)"
			back_button_b = "rgba(255,255,255,0.1)"
			comment_letters = "white";
			comment_border = "rgba(255,255,255,0.04)";
		}
		else {
			letters_a = "black";
			blocks_a = "white";
			letters_b = "white";
			blocks_b = "rgb(100,100,170)";
			back = "white";
			back_back = "white";
			letters_button = "black"
			back_button_a = "rgba(0,0,0,0.05)"
			back_button_b = "rgba(0,0,0,0.1)"
			comment_letters = "black";
			comment_border = "rgba(0,0,0,0.06)"
		}

		$(".tochange").animate({
			backgroundColor: back
		});

		$("body").animate({
			backgroundColor: back_back
		});

		$(".elem1").animate({
			backgroundColor: blocks_a,
			color: letters_a
		});

		$("#button-to-order").css({
			"background-color": back_button_a,
			color: letters_button
		})

		$(".elem2").animate({
			color: comment_letters
		})

		$(".comment").css({
			"border-color": comment_border
		})
	}

	$("#button-to-order").mouseover(function () {
		$(this).css({
			"background-color": back_button_b
		})
	});
	$("#button-to-order").mouseleave(function () {
		$(this).css({
			"background-color": back_button_a
		})
	});
	$("#button-to-order").click(function () {
		location.href = 'order.php';
	})
});