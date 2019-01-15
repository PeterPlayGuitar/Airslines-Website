$(document).ready(function () {
    if ($(window).width() < 1100) {
        wehavegradient = true;
        $("#lil-container").css({ "width": "80vw" });
    } else {
        $("#lil-container").css({ "width": "45vw" });
    }
    $(window).resize(function () {
        if ($(window).width() < 1100) {
            $("#lil-container").css({ "width": "80vw" });
        }
        else {
            $("#lil-container").css({ "width": "45vw" });
        }
    });
    $("#come-up-div p").click(function() {
        $(this).fadeOut("slow");
    });
});