function isScrolledIntoView(elem){
    var docViewTop = $(window).scrollTop();
    var docViewBottom = docViewTop + $(window).height();

    var elemTop = $(elem).offset().top;
    var elemBottom = elemTop + $(elem).height();

    return ((docViewTop < elemTop) && (docViewBottom > elemBottom));
}

$(document).ready(function(){
	// $('.overview_box').addClass('hide');
	$(".overview_cta").on("click", function(){
		$('html, body').animate({
            scrollTop: $("#"+$(this).data("value")).offset().top
        }, 1000);

	});
});

// $(function () {
//     $(window).scroll(function() {
// 	    clearTimeout($.data(this, 'scrollTimer'));
// 	    $.data(this, 'scrollTimer', setTimeout(function() {
// 	        if(isScrolledIntoView("#overview") == true){
// 	        	$('.overview_box').removeClass('hide');
// 	        	$('.overview_box').addClass('animated fadeInUp');
// 	        }
// 	    }, 20));
// 	});
// });

$(function(){
    var navIsBig = true;
    var $nav = $('.header');
    var $header_logo = $(".logo img");
    var $nav_li = $(".nav nav");
    $(document).scroll( function() {
        var value = $(this).scrollTop();
        if(value > 60 && navIsBig ){
            $nav.stop().animate({
                height:50
            },300);
            $header_logo.stop().animate({
                width:70
            },200);
            $nav_li.stop().animate({
                lineHeight:50
            },300);
            navIsBig = false;
        } else if(value <= 60 && !navIsBig ) {
            $nav.stop().animate({
                height:60
            },300);
            $header_logo.stop().animate({
                width:85
            },200);
            $nav_li.stop().animate({
                lineHeight:60
            },300);
            navIsBig = true;
        }
    });
});
