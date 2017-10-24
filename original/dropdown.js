$(function() {
    $(".nav").css("display","none");
    $("#nav-open").toggle(function() {
        $(".nav").slideUp()
    },function() {
        $(".nav").slideDown()
    });
});