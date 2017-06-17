$(function() {
    $(".nav").css("display","none");
    $("#nav-open").on("click", function() {
        $(".nav").slideToggle();
    });
});