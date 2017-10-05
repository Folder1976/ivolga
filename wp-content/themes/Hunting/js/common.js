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



    var fixOwl = function(){
        var $stage = $('.gallery_more .owl-stage'),
            stageW = $stage.width(),
            $el = $('.gallery_more .owl-item'),
            elW = 30;
        $el.each(function() {
            elW += $(this).width()+ ($(this).css("margin-right").slice(0, -2))
        });
        if ( elW > stageW ) {
            $stage.width( elW );
        };
    }

    var gallery_more = $(".gallery_more");
    gallery_more.addClass("owl-carousel");
    $('.hide_information').click();
    gallery_more.owlCarousel({
        items:3,
        margin:30,
        dots:false,
        nav: true,
        loop: false,
        //merge: 1,
        thumbs:false,
        navText: ["<i class='material-icons'>keyboard_arrow_left</i>", "<i class='material-icons'>keyboard_arrow_right</i>"],
        mouseDrag: false,
        autoWidth: true,
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
        },
        onInitialized: fixOwl,
        onRefreshed: fixOwl
    });
    $('.hide_information').click();

    //E-mail Ajax Send
    $(".form").submit(function() { //Change
		
		$(':input[type="submit"]').val('Отправляю заявку');
		$(':input[type="submit"]').prop('disabled', true);
		
        var th = $(this);
        $.ajax({
            type: "POST",
			dataType: 'text',
            url: "/wp-content/themes/Hunting/mail.php", //Change
            data: th.serialize(),
		success: function(json) {
			
			console.log(json);
			
		}
        }).done(function(data) {
			window.location.href = "/thankyou";
            
			setTimeout(function() {
                // Done Functions
			    th.trigger("reset");
            }, 100);
        });
        return false;
    });

});

$(document).ready(function() {

	console.log('2017-07-25');

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



// разбор get-параметров url-а
function getAllUrlParams(url) {
  // извлекаем строку из URL или объекта window
  var queryString = url ? url.split('?')[1] : window.location.search.slice(1);

  // объект для хранения параметров
  var obj = {};

  // если есть строка запроса
  if (queryString) {

    // данные после знака # будут опущены
    queryString = queryString.split('#')[0];

    // разделяем параметры
    var arr = queryString.split('&');

    for (var i=0; i<arr.length; i++) {
      // разделяем параметр на ключ => значение
      var a = arr[i].split('=');

      // обработка данных вида: list[]=thing1&list[]=thing2
      var paramNum = undefined;
      var paramName = a[0].replace(/\[\d*\]/, function(v) {
        paramNum = v.slice(1,-1);
        return '';
      });

      // передача значения параметра ('true' если значение не задано)
      var paramValue = typeof(a[1])==='undefined' ? true : a[1];

      // преобразование регистра
      paramName = paramName.toLowerCase();
      paramValue = paramValue.toLowerCase();

      // если ключ параметра уже задан
      if (obj[paramName]) {
        // преобразуем текущее значение в массив
        if (typeof obj[paramName] === 'string') {
          obj[paramName] = [obj[paramName]];
        }
        // если не задан индекс...
        if (typeof paramNum === 'undefined') {
          // помещаем значение в конец массива
          obj[paramName].push(paramValue);
        }
        // если индекс задан...
        else {
          // размещаем элемент по заданному индексу
          obj[paramName][paramNum] = paramValue;
        }
      }
      // если параметр не задан, делаем это вручную
      else {
        obj[paramName] = paramValue;
      }
    }
  }

  return obj;
}

    // фильтр в категории
    $('.js-filter-price').on('click', function(){
        var url = window.location.href.slice(0,window.location.href.indexOf('\?'));
        if ( url.charAt(url.length -1) != '/' ) {
            url += '/';
        }
        if ( getAllUrlParams().location == null ) {
            url += '?';
        } else {
            url += '?' + 'location=' + getAllUrlParams().location + '&';
        }

        // если фильтр еще не активен - активируем его
        if ( $(this).hasClass('no-active') ) {
            $(this).removeClass('no-active').addClass('active');
        }
        // меняем направление сортировки
        if ( $(this).hasClass('desc') ) {
            $(this).removeClass('desc').addClass('acs');
            window.location.href = url + 'price=Дорогие';
        } else {
            $(this).removeClass('asc').addClass('desc');
            window.location.href = url + 'price=Дешевые';
        }
    });


    $('.filter .f-select').on('click', function(){
        if ( $('.filter .f-select .list:visible').length > 0 && $(this).find('.list:visible').length == 0 ) {
            $('.filter .f-select .list').hide();
        }
        $(this).find('.list').toggle();
    });
    $(document).mouseup(function (e){
        if ( $(e.target).closest('.filter .f-select').length === 0 ) {
            $('.filter .f-select').find('.list').hide();
        }
    });

});

$(window).load(function() {

    $(".loader_inner").fadeOut();
    $(".loader").delay(400).fadeOut("slow");

});