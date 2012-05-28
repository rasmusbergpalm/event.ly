// Main Navigation
var FluidNav = {
    init: function() {
        FluidNav.resizePage(($('.page').height() + 40), true);
        $('.page').fadeIn(500);
    },
    resizePage: function(size, animate, callback) {
        if(size) {
            var new_size = size;
        } else {
            var new_size = $(".page.current").height() + 40;
        }
        if(!callback) {
            callback = function(){};
        }
        if(animate) {
            $("#pages").animate({
                height: new_size
            }, 400, function() {
                callback.call();
            });
        } else {
            $("#pages").css({
                height: new_size
            });
        }
    }
};

// Fix page height and nav on browser resize
$(window).resize(function() { 
    FluidNav.resizePage();
});

$(document).ready(function() {
    FluidNav.init();
    
    // Toggle lists
    /*
    $(".toggle_list ul li .title").click(function() {
        var content_container = $(this).parent().find(".content");
        if(content_container.is(":visible")) {
            var page_height = $(".page.current").height() - content_container.height();
            FluidNav.resizePage(page_height, true);
            content_container.slideUp();
            $(this).find("a.toggle_link").text($(this).find("a.toggle_link").data("open_text"));
        } else {
            var page_height = $(".page.current").height() + content_container.height() + 40;
            FluidNav.resizePage(page_height, true);
            content_container.slideDown();
            $(this).find("a.toggle_link").text($(this).find("a.toggle_link").data("close_text"));
        }
    });
	
    $(".toggle_list ul li .title").each(function() {
        $(this).find("a.toggle_link").text($(this).find("a.toggle_link").data("open_text"));
        if($(this).parent().hasClass("opened")) {
            $(this).parent().find(".content").show();
        }
    });
    */

    // Tooltips
    $("a[rel=tipsy]").tipsy({
        fade: true,
        gravity: 's',
        offset: 5,
        html: true
    });
	
    $("ul.social li a").each(function() {
        if($(this).attr("title")) {
            var title_text = $(this).attr("title");
        } else {
            var title_text = $(this).text();
        }
        $(this).tipsy({
            fade: true,
            gravity: 'n',
            offset: 5,
            title: function() {
                return title_text;
            }
        });
    });
	
    // Contact form
    $(".datepicker").datepicker({
         'dateFormat': 'dd-mm-yy'
    });
	
});