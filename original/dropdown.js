$(function(){
    $(".btn").toggle(
        function(){
            $("nav").css("display","block");
            $(".btn").addClass("is-open");
        },
        function(){
            $("nav").css("display", "none");
            $(".btn").removeClass("is-open");
        }
    )
});

$(function(){
    $("#topBtn").hide(); //とりあえず隠す
    $(window).on("scroll", function() {
        if ($(this).scrollTop() > 100) { //100以上にスクロールされた／されている時は
            $("#topBtn").fadeIn("fast"); //ふわっと表示
        } else { //それ意外は
            $("#topBtn").fadeOut("fast"); //ふわっと非表示
        }
    });
    $('#topBtn').click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 400);
        return false;
    });
});
