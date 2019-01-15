$(document).ready(function () {

	var elementsareready = false;

	if ($(window).scrollTop() >= 500) {

		elementsareready = true;

		$("#about").fadeIn(1500);
		$("#you-should-know").fadeIn(1500);
		$("#baggage").fadeIn(1500);
		$(".special-elem1").animate({
			backgroundColor: "rgba(255, 255, 255, 0.22)"
		}, 2000);
	}

	$(window).scroll(function () {
		if ($(window).scrollTop() >= 500) {

			elementsareready = true;

			$("#about").fadeIn(1500);
			$("#you-should-know").fadeIn(1500);
			$("#baggage").fadeIn(1500);
			$(".special-elem1").animate({
				backgroundColor: "rgba(255, 255, 255, 0.22)"
			}, 2000);
		}
	});

	$(window).scroll(function () {
		if ($(window).scrollTop() >= 900) {
			$("#a1").animate({
				color: "rgba(255, 255, 255, 1)"
			}, 1000, function () {
				$("#a2").animate({
					color: "rgba(255, 255, 255, 1)"
				}, 1000, function () {
					$("#a3").animate({
						color: "rgba(255, 255, 255, 1)"
					}, 1000, showElems());
				});
			});
		}
	});
	function showElems() {
		$("#c1").fadeIn(500, function () {
			$("#c2").fadeIn(500, function () {
				$("#c3").fadeIn(500, function () {
					$("#c4").fadeIn(500);
				});
			});
		});
	};

	$(".special-elem1").mouseover(function () {
		if (elementsareready)
			$(this).css({ "background": "linear-gradient( rgba(255,255,255,0.4), rgba(255,255,255,0.22))" });
	});
	$(".special-elem1").mouseout(function () {
		if (elementsareready) {
			$(this).css({ "background": "rgba(255, 255, 255, 0.22)" });
		}
	});

	var wehavegradient = false;

	$(".gradient").mouseover(function () {
		$(this).css({ "background": "linear-gradient(rgba(0,0,0 ,0.65), rgba(0,0,0,0.2))" });
	});
	$(".gradient").mouseout(function () {
		if (wehavegradient == false)
			$(this).css({ "background": "linear-gradient(rgba(0,0,0 ,0.0), rgba(0,0,0,0.0))" });
	});

	// for Edge
	$("#button1").click(function () {
		var elementClick = $(this).attr("href");
		var destination = $(elementClick).offset().top;

		$('body').animate({ scrollTop: destination }, 1100);
	});
	// for all
	$("#button1").click(function () {
		var elementClick = $(this).attr("href");
		var destination = $(elementClick).offset().top;

		$('html').animate({ scrollTop: destination }, 1100);
	});

	// links \\

	$("#about").click(function () {
		location.href = 'content/about.php';
	});

	$("#you-should-know").click(function () {
		location.href = 'content/order.php';
	});

	$("#baggage").click(function () {
		location.href = 'content/baggage.php';
	});

	$(".cube").mouseenter(function () {
		$(this).find(".inner-cube").animate({
			width: "0px"
		}, function () {
			$(this).find("i").css({ "opacity": 0 })
		});
	});

	$(".cube").mouseleave(function () {
		$(this).find(".inner-cube").animate({
			width: "150px"
		}, function () {
			$(this).find("i").css({ "opacity": 1 })
		});
	});

	if ($(window).width() < 1100) {
		wehavegradient = true;
		$(".gradient").css({ "background": "linear-gradient(rgba(0,0,0 ,0.65), rgba(0,0,0,0.2))" });
	}
	else {
		wehavegradient = false;
	}
	$(window).resize(function () {
		if ($(window).width() < 1100) {
			wehavegradient = true;
			$(".gradient").css({ "background": "linear-gradient(rgba(0,0,0 ,0.65), rgba(0,0,0,0.2))" });
		}
		else {
			wehavegradient = false;
		}
	});

	$(".fancybox").fancybox({
		openEffect: "none",
		closeEffect: "none"
	});

	$(".zoom").hover(function () {

		$(this).addClass('transition');
	}, function () {

		$(this).removeClass('transition');
	});

});