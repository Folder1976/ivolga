$(document).ready(function(){
	
	$("#header .link a").click(function() {
	      $("html, body").animate({
	         scrollTop: $($(this).attr("href")).offset().top + "px"
	      }, {
	         duration: 900,
	         easing: "swing"
	      });
	      return false;
	});
	
    $('.masked').mask('+7 (000) 000-00-00'); 

    $('.nav-open').on('click', function(e){
        e.preventDefault();
        $('body').addClass('no_scroll');
        $('.nav').addClass('visible');
    });
    $('.close-nav').on('click', function(e){
        e.preventDefault();
        $('body').removeClass('no_scroll');
        $('.nav').removeClass('visible');
    });

    $('.hide_information').on('click', function(){
        var element = $('.full_information');
        $(this).removeAttr('href');
        if (element.hasClass('active')) {
            element.removeClass('active');
            $(this).find('span').html('Показать подробности');
            element.slideUp();   
        }
        else {
            element.addClass('active');
            $(this).find('span').html('Скрыть подробности');
            element.slideDown();
        }
    });

    $('.tour_gallery_slider').owlCarousel({
        items:1,
        nav: true,
        navText: ["<i class='material-icons'>keyboard_arrow_left</i>", "<i class='material-icons'>keyboard_arrow_right</i>"],
        loop:true,
        mouseDrag:false,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        thumbs: true,
		//autoWidth: true,
        thumbImage: true,
        thumbContainerClass: 'owl-thumbs',
        thumbItemClass: 'owl-thumb-item',
        responsive:{
            0:{

                autoHeight:true,
                thumbs: false,
                thumbImage: false
            },
            600:{
                autoHeight:true,
                thumbs: false,
                thumbImage: false
            },
            1000:{}
        }

    });

	function fix_img() {
		$('.owl-item').each(function(i,elem){
			var h = $(elem).find('img').height();
			if( h > 345 ) {
				var x = -100;
				$(elem).find('img').css('position','relative');
				$(elem).find('img').css('top',x+'px');
			}
		})
	}

    $('[data-fancybox]').fancybox({
        protect: true,
        touch : {
            vertical : false,  // Allow to drag content vertically
            momentum : false  // Continue movement after releasing mouse/touch when panning
        }
    });

    var recommended = $(".recommended_slider");
    recommended.addClass("owl-carousel");
    recommended.owlCarousel({
        items:3,
        margin:30,
        dots:false,
        nav: true,
        navText: ["<i class='material-icons'>keyboard_arrow_left</i>", "<i class='material-icons'>keyboard_arrow_right</i>"],
        loop:false,
        thumbs:false,
        mouseDrag: false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:3
            }
        }
    }); 

    var gallery_more = $(".gallery_more");
    gallery_more.addClass("owl-carousel");
    gallery_more.owlCarousel({
        items:3,
        margin:30,
        dots:false,
        nav: true,
        loop: false,
        merge: 1,
        thumbs:false,
        navText: ["<i class='material-icons'>keyboard_arrow_left</i>", "<i class='material-icons'>keyboard_arrow_right</i>"],
        mouseDrag: false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:3
            }
        }
    }); 


    //E-mail Ajax Send
    $(".form").submit(function() { //Change
        var th = $(this);
        $.ajax({
            type: "POST",
            url: "/wp-content/themes/Hunting/mail.php", //Change
            data: th.serialize()
        }).done(function() {
            window.location.href = "/thank";
            setTimeout(function() {
                // Done Functions
                th.trigger("reset");
            }, 1000);
        });
        return false;
    });

});

$(document).ready(function() {

    //Цели для Яндекс.Метрики и Google Analytics
    $(".count_element").on("click", (function() {
        ga("send", "event", "goal", "goal");
        yaCounterXXXXXXXX.reachGoal("goal");
        return true;
    }));

    //SVG Fallback
    if(!Modernizr.svg) {
        $("img[src*='svg']").attr("src", function() {
            return $(this).attr("src").replace(".svg", ".png");
        });
    };

    //Chrome Smooth Scroll
    try {
        $.browserSelector();
        if($("html").hasClass("chrome")) {
            $.smoothScroll();
        }
    } catch(err) {

    };

    $("img, a").on("dragstart", function(event) { event.preventDefault(); });

    var window_width = jQuery( window ).width();
    if (window_width < 992) {
    jQuery(".price_block").trigger("sticky_kit:detach");
    jQuery('.tour_bron_form').on('click', function(){
        var element = $('.fixed_block');
var scroll = jQuery(this).attr('href');
        jQuery(this).removeAttr('href').slideUp();
        element.slideDown();
        jQuery('html, body').animate({ scrollTop: jQuery(scroll).offset().top -15 });
    });

    } else {
      make_sticky();
    }

    jQuery( window ).resize(function() {
    window_width = jQuery( window ).width();
      if (window_width < 992) {
        jQuery(".price_block").trigger("sticky_kit:detach");
    jQuery('.tour_bron_form').on('click', function(){
        var element = $('.fixed_block');
var scroll = jQuery(this).attr('href');
        jQuery(this).removeAttr('href').slideUp();
        element.slideDown();
        jQuery('html, body').animate({ scrollTop: jQuery(scroll).offset().top -15 });
    });

      } else {
        make_sticky();
      } 

    });


    function make_sticky() {
      jQuery(".price_block").stick_in_parent();
      jQuery(".fixed_block").slideDown();
    }

	setInterval(function(){
		$.each($('.owl-item'), function( index, value ){
			
			var div = $('.owl-stage-outer').height()
			var img = $(this).children('img').height()
			
			var margin = 0;
			if(img > div && img > 0){
				
				margin = (img - div) / 2;
				
				margin = parseInt(margin);
				
			}
			$(this).children('img').css('margin-top', '-'+margin+'px');
			
			//console.log( div + ": " + img + ' ' +margin );
			
		})
	},2000);	

});

$(window).load(function() {

    $(".loader_inner").fadeOut();
    $(".loader").delay(400).fadeOut("slow");

});