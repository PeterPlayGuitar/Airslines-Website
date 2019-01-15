$(document).ready(function () {
    if ($(window).width() < 1100) {
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
    $("#box1").click(function(){
        location.href = ("../index.php");
    })
    $("#box2").click(function(){
        location.href = ("baggage.php");
    })
    $("#box3").click(function(){
        location.href = ("log-in-page.php");
    })
});