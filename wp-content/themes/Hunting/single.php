<?php get_header(); // подключаем header.php

?>

        <main id="main">
            <div class="container">
                <div class="row row_flex">

<?php //query_posts('order=ASC' ); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); // старт цикла ?>

<?php 
$start_date = get_field('start_date_tour', false, false);
$start_date = new DateTime($start_date);
$finish_date = get_field('finish_date_tour', false, false);
$finish_date = new DateTime($finish_date);
?>


<script>
$(document).ready(function(){
    $(".datepicker").datepicker({
		dateFormat: "dd/mm/yy",
		firstDay: 1,
		minDate:"<?php echo $start_date->format('j/m/Y'); ?>",
 		maxDate:"<?php echo $finish_date->format('j/m/Y'); ?>",
		beforeShow: function() {
			setTimeout(function(){
				$('.ui-datepicker').css('z-index', 105);
			}, 0);
    }
	});
	//valParam();


	function valParam () {
		
		
		//var start = "0";
		//var end = "0";
		var kol_day = 1;
		var start = $('#tour_start').datepicker('getDate');
		var end   = $('#tour_finish').datepicker('getDate');
		
		if(start == null || end == null){
			return false;
		}
		
		if (start > 0 ) {
			if (start<end) {
				var days   = (end - start)/1000/60/60/24;
				var kol_day = days + 1;
			}
		}
		
		var kol_ohotnik = $('#select_hunters').val(),
		kol_gost = $('#select_guest').val(),
		kol_trof = $('#summa_trophies').val(),
		
		price_trof = <?php the_field('price_trof'); ?> * kol_trof,
		price_eger = <?php the_field('price_eger'); ?> * kol_day * kol_ohotnik,
		price_avto = <?php the_field('price_avto'); ?> * kol_day * kol_ohotnik,
		price_razdel = <?php the_field('price_razdel'); ?> * kol_trof,
		price_veter = <?php the_field('price_veter'); ?> * kol_trof,
		
		price_uslug =  (+price_veter + +price_razdel) * kol_trof;
		
		itog_pit = <?php the_field('itog_pit'); ?> * ( +kol_ohotnik +  +kol_gost ) * +kol_day,
		itog_home = <?php the_field('itog_home'); ?> * ( +kol_day * (+kol_ohotnik + +kol_gost) ),
		itog_baza = <?php the_field('itog_baza'); ?>,
		
		summa = +price_trof + +price_eger + +price_avto + +price_razdel + +price_veter + +itog_pit + +itog_home + +itog_baza;
		
		$('.cur').html(summa + ' руб.');
		$('#tour_price').val(summa + ' руб.');
		$('#tour_date').val(kol_day);
		
		$('#tour_hunters').val(kol_ohotnik);
		$('#summa_tour_hunters').val( (<?php the_field('itog_pit'); ?> * +kol_ohotnik * +kol_day) + (<?php the_field('itog_home'); ?> * (+kol_day * +kol_ohotnik)) );
		$('#p_summa_tour_hunters').html($('#summa_tour_hunters').val());
		$('#p_kol_ohotnik').html(kol_ohotnik);
		$('#p_kol_ohotnik1').html(kol_ohotnik);
		$('#p_kol_day1').html(kol_day);
		
		$('#tour_gost').val(kol_gost);
		$('#summa_tour_gost').val( (<?php the_field('itog_pit'); ?> * +kol_gost * +kol_day) + (<?php the_field('itog_home'); ?> * (+kol_day * +kol_gost) ) );
		$('#p_summa_tour_gost').html($('#summa_tour_gost').val());
		$('#p_kol_gost').html(kol_gost);
		$('#p_kol_day2').html(kol_day);
	
		
		
		$('#tour_trof').val(kol_trof);
		$('#p_tour_trof').html(kol_trof);
		
		$('#summa_trof').val(price_trof);
		$('#p_summa_trof').html(price_trof);
	
		$('#summa_tour_eger').val(price_eger + price_uslug);
		$('#summa_tour_avto').val(price_avto);
	
		$('#p_summa_uslugi').html(price_avto + price_eger + price_uslug);
		$('#p_kol_day3').html(kol_day);
		
		
		//Подпись дней
		var day_name = 'день';
		if(kol_day > 1 && kol_day < 5){
			day_name = 'дня';
		}else if(kol_day >= 4){
			day_name = 'дней';
		}
		$('#p_kol_day_name1').html(day_name);
		$('#p_kol_day_name2').html(day_name);
		$('#p_kol_day_name3').html(day_name);
		
		//Подпись трофеев
		var trof_name = 'трофей';
		if(kol_trof > 1 && kol_trof < 5){
			trof_name = 'трофея';
		}else if(kol_trof >= 4){
			trof_name = 'трофеев';
		}
		$('#p_trof_name').html(trof_name);

		//Подпись охотников
		var ohotnik_name = 'охотник';
		if(kol_ohotnik > 1 && kol_ohotnik < 5){
			ohotnik_name = 'охотника';
		}else if(kol_ohotnik >= 4){
			ohotnik_name = 'охотников';
		}
		$('#p_ohotnik_name').html(ohotnik_name);
		$('#p_ohotnik_name1').html(ohotnik_name);

		
		//Подпись гостей
		var gost_name = 'гостей';
		if(kol_gost == 1){
			gost_name = 'гость';
		}else if(kol_gost > 1 && kol_gost < 5){
			gost_name = 'гостя';
		}else if(kol_gost >= 4){
			gost_name = 'гостей';
		}
		$('#p_gost_name').html(gost_name);

		
		var form_star_tour = $('#tour_start').datepicker().val();
		var form_end_tour = $('#tour_finish').datepicker().val();
		
		if ( form_star_tour != "" && form_star_tour != "") {
			$('#tour_date_srok').val( form_star_tour + ' – ' + form_end_tour);
		} else {
			$('#tour_date_srok').val( '<?php the_field('start_date_tour'); ?> – <?php the_field('finish_date_tour'); ?>');
		}
	};
	
	$('.price_block, .price_block input, .price_block select, .ui-datepicker').on('click keyup change', valParam);
	
	$(' a.finish').on('click keyup change', function(){
		
		var baz = true;
		
		
		
		$('#tour_start_err').hide();
		$('#tour_finish_err').hide();
		
		var start = $('#tour_start').datepicker('getDate');
		var end   = $('#tour_finish').datepicker('getDate');
		
		var valid = 1;
		
		if(start == null){
			$('#tour_start_err').show();
			valid = 0;
		}
		if(end == null){
			$('#tour_finish_err').show();
			valid = 0;
		}
		
		if(valid == 1){
			valParam();
			
			if($('.finish').data('fancybox')){
				
			}else{
				$('.finish').data('fancybox', baz).attr('data-fancybox', baz);
				//$('.finish').trigger('click');
			}
		}else{
			setTimeout(hide_all_err, 3000);
		}
		
	});
	
	});
</script>



<div class="col-md-4 col-md-push-8 fixed_block">
	<style>
		.shirma{
			width: 100%;
			height: 65px;
			background-color: gray;
			position: absolute;
			z-index: 9;
			cursor: pointer;
			opacity: 0;
		}
		#more_info{
			position: absolute;
			width: 358px;
			/*right: 353px;*/
			height: 170px;
			z-index: 100;
			overflow: hidden;
			background-color: white;
			margin-left: -28px;
			padding: 25px;
			border: 3px solid #ff8a00;
			/*margin-top: -28px;*/
			display: none;
			 
		}
		/*
		#key_more_info{
			position: absolute;
			border: 3px solid #ff8a00;
			width: 100px;
			height: 100px;
			transform: rotate(45grad);
		}
		*/
		.ui-datepicker{
			z-index:103;
		}
		#key_more_info {
			width: 150px;
			height: 0;
			background: red;
			position: absolute;
			margin-left: 90px;
		}
		#key_more_info:before {
			content: "";
			position: absolute;
			top: -20px; 
			left: 0;
			width: 0;
			height: 0;
			border-left: 65px solid transparent;
			border-right: 65px solid transparent;
			border-bottom: 20px solid #ff8a00;
		}
		
		div.is_stuck div#more_info{
			/*right: 332px;*/
			margin-right: 2px;
		}
		.price_finish{
			z-index:101;
			position: relative;
			background-color: white;
		}

	</style>
	<script>
		$(document).on('mouseenter', '#key_more_info', function(){
			if ($(window).width() > '768'){
				$('#more_info').show(0);
				$('#more_info').animate(
										{
											height:"362px",
											'margin-top':"-360px"
										}, 500, function(){});
				
			}
		});
		$(document).on('mouseleave', '#more_info', function(){
			setTimeout(function(){$('#more_info').hide(0);},500);
			$('#more_info').animate(
										{
											height:"170px",
											'margin-top':"0"
										}, 500, function(){});
		});
		$(document).ready(function(){
			//console.log($('div.price_block').height());
			//console.log($('div.price_block').outerHeight());
			//console.log($('div.price_block').css('height'));
			//$('div#more_info').css('height', $('div.price_block').outerHeight()+'px');
		});
	</script>
	<style>
		.data_err{
			position: absolute;
			margin-top: -80px;
			margin-left: 10px;
			background-color: #E5E377;
			padding: 8px 10px;
			border: 2px solid red;
			border-radius: 15px;
			display: none;
			opacity: 0.8;
			z-index: 99;
		}
	</style>
						
                        <div class="price_block" style="z-index:10;">
<?php if( get_field('page_tour_reg') ): ?>
						
			                    <div class="top_price">цена от <span><?php the_field('start_price_tour'); ?>Р</span></div>
                                <div class="top_sub_price">за <?php the_field('summa_day_tour'); ?>, <?php the_field('summa_hunters'); ?></div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="item_form">
                                            <label for="">Начало охоты</label>
                                            <div class="icon">
                                                <i class="material-icons">today</i>
												
                                          <input id="tour_start" type="text" placeholder="дд/мм/гггг" class="datepicker">
												 <!-- value="<?php echo date('d/m/Y', strtotime($start_date->format('m/j/Y'))); ?>" -->
                                            </div>
											
											<div id="tour_start_err" class="data_err">Укажите дату</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="item_form">
                                            <label for="">Конец охоты</label>
                                            <div class="icon">
                                                <i class="material-icons">today</i>
                                          <input id="tour_finish" type="text"  placeholder="дд/мм/гггг" class="datepicker">
												 <!-- value="<?php echo date('d/m/Y', strtotime($finish_date->format('m/j/Y'))); ?>" -->
                                            </div>
											<div id="tour_finish_err" class="data_err">Укажите дату</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="item_form">
                                            <!--label for="">Охотники</label-->
                                            <select class="small_bg" name="" id="select_hunters">
                                                <option value="1">1 охотник</option>
												<option value="2">2 охотника</option>
                                                <option value="3">3 охотника</option>
                                                <option value="4">4 охотника</option>
                                                <option value="5">5 охотников</option>
                                                <option value="6">6 охотников</option>
                                                <option value="7">7 охотников</option>
                                                <option value="8">8 охотников</option>
                                                <option value="9">9 охотников</option>
                                                <option value="10">10 охотников</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="item_form">
                                            <!--label for="">Гости</label-->
                                            <select class="small_bg" name="" id="select_guest">
                                                <option value="0">0 гостей</option>
                                                <option value="1">1 гость</option>
                                                <option value="2">2 гостя</option>
                                                <option value="3">3 гостя</option>
                                                <option value="4">4 гостя</option>
                                                <option value="5">5 гостей</option>
                                                <option value="6">6 гостей</option>
                                                <option value="7">7 гостей</option>
                                                <option value="8">8 гостей</option>
                                                <option value="9">9 гостей</option>
                                                <option value="10">10 гостей</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom: 20px;">
                                    <div class="col-sm-12">
                                        <div class="item_form">
                                            <!--label for="">Количество трофеев</label-->
                                            <select name="" id="summa_trophies">
                                                <option value="1">1 трофей</option>
                                                <option value="2">2 трофея</option>
                                                <option value="3">3 трофея</option>
                                                <option value="4">4 трофея</option>
                                                <option value="5">5 трофеев</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
						<div id="key_more_info"></div>
						<div id="more_info">
							
								<div class="checkout">
                                    <div class="title">Проживание и питание</div>
                                    <div class="content">
                                        <ul>
											<li><span id="p_kol_ohotnik">1</span> <span id="p_ohotnik_name">охотник</span> х <span id="p_kol_day1"></span> <span id="p_kol_day_name1">день</span> = <span id="p_summa_tour_hunters"></span> Р</li>
											<li><span id="p_kol_gost">0</span> <span id="p_gost_name">гостей</span> х <span id="p_kol_day2"></span> <span id="p_kol_day_name2">день</span> = <span id="p_summa_tour_gost"></span> Р</li>
                                        </ul>
                                    </div>
                                </div>
	
                                <div class="checkout">
                                    <div class="title">Трофеи</div>
                                    <div class="content">
                                        <ul>
                                            <li><span id="p_tour_trof">1</span> <span id="p_trof_name">трофей</span> = <span id="p_summa_trof"></span> Р</li>
                                        </ul>
                                    </div>
                                </div>
								
								<div class="checkout">
                                    <div class="title">Услуги на охоте</div>
                                    <div class="content">
                                        <ul>
                                            <li><span id="p_kol_ohotnik1">1</span> <span id="p_ohotnik_name1">охотник</span> х <span id="p_kol_day3"></span> <span id="p_kol_day_name3">день</span> = <span id="p_summa_uslugi"></span> Р</li>
                                        </ul>
                                    </div>
                                </div>
			
						</div>
            

                                <div class="price_finish" style="">
                                    <div class="summa">Итого: <span class="cur"><?php the_field('start_price_tour'); ?> руб.</span></div>
                                    <a href="#modal_form_price" class="finish"  >Рассчитать тур</a>
                                    <div class="no_money_block">вы пока ни за что не платите</div>
                                </div>
                                <div class="hide">
									
									<script>
										function hide_all_err(){
											$('.soglashenir').hide(500);
											$('.name_form').hide(500);
											$('.email_form').hide(500);
											$('.phone_form').hide(500);
											$('.data_err').hide(500);
										}
										
										$(document).on('click','.shirma', function(){
											
											var valid = 1;
											$('.soglashenir').hide();
											$('.name_form').hide();
											$('.email_form').hide();
											$('.phone_form').hide();
											
											if($('#name_form').val() == ''){
												$('.name_form').show();
												valid = 0;
											}
											
											if($('#email_form').val() == ''){
												$('.email_form').show();
												valid = 0;
											}
											
											if($('#phone_form').val() == ''){
												$('.phone_form').show();
												valid = 0;
											}
											
											console.log($('#agreement').prop('checked'));
											
											if($('#agreement').prop('checked') == false){
												$('.agreement').show();
												valid = 0;
											}
											
											if(valid == 1){
												//debugger;
												
												$(".shirma").hide();
												$('.submit').trigger('click');
											}else{
												
												setTimeout(hide_all_err, 3000);
											}
											
										});
										
									</script>
									<style>
										.valid_msg{
											position: absolute;
											margin-top: -80px;
											margin-left: 120px;
											background-color: #E5E377;
											padding: 8px 15px;
											border: 2px solid red;
											border-radius: 15px;
											display: none;
											opacity: 0.8;
											z-index: 99;
										}
									</style>
                                    <div id="modal_form_price" class="modal_form">
<form action="<?php the_field('page_tour_reg'); ?>" method="post" class="block_form_name">
                                        <div class="modal_title">Заполните ваши контактные данные</div>
                                        <div class="form_item">
                                            <label for="">Ваше имя</label>
											<input type="text"  name="name_form"  id="name_form" placeholder="Руслан Русланов"  >
											<div class="valid_msg name_form">Вы не представились</div>
                                        </div>
                                        <div class="form_item">
                                            <label for="">Ваш email</label>
										    <input type="text" data-oninvalid="Введите ваш email" name="email_form" id="email_form" placeholder="ruslan@sitename.ru"  >
											<div class="valid_msg email_form">Введите ваш email</div>
                                        </div>
                                        <div class="form_item">
                                            <label for="">Ваш телефон</label>
										    <input type="text" data-oninvalid="Укажите номер для контакта" name="phone_form" id="phone_form" placeholder="+7 (904) 444-22-11" >
											<div class="valid_msg phone_form">Укажите номер для контакта</div>
                                        </div>
                                        <div class="modal_form_bottom">
                                            <div class="checkbox_form">
												<input id="agreement" name="Согласен" checked type="checkbox" >
												<div class="valid_msg agreement">Вы должны согласиться с пользовательским соглашением</div>
												<label for="agreement">Я принимаю условия <a href="/terms/">пользовательского соглашения</a></label>
											</div>
                                            <div class="more_form">
												<i class="material-icons">arrow_forward</i>
<input type="hidden" id="tour_date" name="tour_date" value="1">
<input type="hidden" id="tour_hunters" name="tour_hunters" value="1">
<input type="hidden" id="tour_gost" name="tour_gost" value="0">
<input type="hidden" id="tour_trof" name="tour_trof" value="1">
<input type="hidden" id="summa_trof" name="summa_trof" value="<?php the_field('price_trof')?>">
<input type="hidden" name="tour_date_srok" id="tour_date_srok" value="<?php echo $start_date->format('j/m/Y'); ?> – <?php echo $finish_date->format('j/m/Y'); ?>">
<input type="hidden" name="tour_name" value="<?php the_title();?>">
<input type="hidden" id="tour_price" name="tour_price" value="<?php the_field('start_price_tour'); ?> руб.">
<input type="hidden" id="summa_tour_hunters" name="summa_tour_hunters" value="0">
<input type="hidden" id="summa_tour_gost" name="summa_tour_gost" value="0">
<input type="hidden" id="summa_tour_eger" name="summa_tour_eger" value="0">
<input type="hidden" id="summa_tour_avto" name="summa_tour_avto" value="0">

<?php if( get_field('geo_map')): ?><input type="hidden" name="geo_map" value="<?php the_field('geo_map'); ?>"><?php endif; ?>

	<?php if( get_field('deposit') || get_field('term_deposit') || get_field('full_payment') || get_field('cancel_reservation') || get_field('podrantok') || get_field('missing') || get_field('supplement_trophy') ): ?>
		<input type="hidden" name="tour_yslov_money" value="<p><?php if( get_field('deposit') ): ?><span>Депозит</span>: <?php the_field('deposit'); ?><br><?php endif; ?><?php if( get_field('term_deposit') ): ?><span>Срок внесения депозита</span>: <?php the_field('term_deposit'); ?><br><?php endif; ?><?php if( get_field('full_payment') ): ?><span>Полная оплата</span> : <?php the_field('full_payment'); ?><br><?php endif; ?><?php if( get_field('cancel_reservation') ): ?><span>Отмена бронирования</span> : <?php the_field('cancel_reservation'); ?><br><?php endif; ?><?php if( get_field('podrantok') ): ?><span>Подранок</span>: <?php the_field('podrantok'); ?><br><?php endif; ?><?php if( get_field('missing') ): ?><span>Промах</span>: <?php the_field('missing'); ?><br><?php endif; ?><?php if( get_field('supplement_trophy') ): ?><span>Доплата за трофей</span>: <?php the_field('supplement_trophy'); ?><?php endif; ?></p>">
	<?php endif; ?>
												<div class="shirma"></div>
												<input type="submit" name="submit" class="submit" value="Далее">
											</div>
                                            <div class="no_money">Вы пока ни за что не платите</div>
                                        </div>
</form>
                                    </div>
                                </div>
<?php //else: ?>
<!--div class="checkout_price" style="margin-bottom:0;">Все туры проданы</div-->
<?php endif; ?>
                        </div>
                    </div>

<div class="col-md-8 col-md-pull-4">

<section class="top_info_block margin_bottom">
<?php if( get_field('gallery_top') ): ?>

<?php $images = get_field('gallery_top'); if( $images ): ?>
    <div class="owl-carousel tour_gallery_slider">
        <?php
		//echo '<pre>'; print_r(var_dump( $images  ));
		//die();
		?>
		<?php foreach( $images as $image ): ?>
					  <!--img ypeof="foaf:Image"  src="<?php echo $image['sizes']['big-thumb']; ?>" alt="<?php echo $image['alt']; ?>"-->
					  <img ypeof="foaf:Image"  src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>">
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php endif; ?>

<div class="top_single_tour">
<h1 class="title_tour"><?php the_title();?></h1>
<?php if( get_field('geo_map')): ?><div class="sub_title_tour"><?php the_field('geo_map'); ?></div><?php endif; ?>
</div>

<?php if( get_field('trophy_checkbox') == 'Да' || get_field('сarbine_checkbox') || get_field('food_checkbox') || get_field('accomodation_checkbox') == 'Да' || get_field('transport_checkbox') == 'Да' || get_field('transfer_checkbox') == 'Да'): ?>                            
<div class="conditions">
                                <?php if( get_field('trophy_checkbox') == 'Да' ): ?>
								<div class="item">
                                    <div class="icon"><img src="<?php echo get_template_directory_uri();?>/img/icon/horns.svg" alt=""></div>
                                    Трофей
                                </div>
								<?php endif; ?>

                                <?php if( get_field('сarbine_checkbox') ): ?>
								<div class="item">
                                    <div class="icon"><img src="<?php echo get_template_directory_uri();?>/img/icon/hunting.svg" alt=""></div>
                                    <?php the_field('сarbine_checkbox'); ?>
                                </div>
								<?php endif; ?>

                                <?php if( get_field('food_checkbox') && get_field('food_checkbox', false, false) != 5): ?>
								<div class="item">
                                    <div class="icon"><img src="<?php echo get_template_directory_uri();?>/img/icon/restaurant-cutlery.svg" alt=""></div>
                                    <?php the_field('food_checkbox'); ?>
                                </div>
								<?php endif; ?>

                                <?php if( get_field('accomodation_checkbox') == 'Да' ): ?>
								<div class="item">
                                    <div class="icon"><img src="<?php echo get_template_directory_uri();?>/img/icon/house.svg" alt=""></div>
                                    Жилье
                                </div>
								<?php endif; ?>

                                <?php if( get_field('transport_checkbox') == 'Да' ): ?>
								<div class="item">
                                    <div class="icon"><img src="<?php echo get_template_directory_uri();?>/img/icon/jeep.svg" alt=""></div>
                                    Транспорт на охоте
                                </div>
								<?php endif; ?>

                                <?php if( get_field('transfer_checkbox') == 'Да' ): ?>
								<div class="item">
                                    <div class="icon">
                                        <img src="<?php echo get_template_directory_uri();?>/img/icon/route.svg" alt="">
                                    </div>
                                    Трансфер
                                </div>
								<?php endif; ?>
                            </div>
<?php endif; ?>
<?php if( get_field('start_date_tour') ): ?>
                            <div class="date_tour">
                                <div class="icon"><i class="material-icons">date_range</i></div>
                                <div>
                                    <div class="title">Период охоты</div>
                                    <div class="datte"><?php the_field('start_date_tour'); ?> - <?php the_field('finish_date_tour'); ?></div>
                                </div>
                            </div>
<?php endif; ?>
                        </section>
                        <section class="full_information">
                            <section class="margin_bottom info_block">
                                <div class="row_title">О туре</div>
                                <div class="content"><?php the_content();?></div>
                            </section>

<?php if( get_field('trophy') || get_field('way_hunting') || get_field('chasseur_service') || get_field('transport_hunt') || get_field('area_land') ): ?>
                            <section class="margin_bottom info_block">
                                <div class="row_title">Охота</div>
                                <?php if( get_field('trophy') ): ?>
								<div class="row row_list">
                                    <div class="col-xs-5">Трофей</div>
                                    <div class="col-xs-7"><?php the_field('trophy'); ?></div>
                                </div>
								<?php endif; ?>
								<?php if( get_field('way_hunting') ): ?>
                                <div class="row row_list">
                                    <div class="col-xs-5">Способ охоты</div>
                                    <div class="col-xs-7"><?php the_field('way_hunting'); ?></div>
                                </div>
								<?php endif; ?>
								<?php if( get_field('chasseur_service') ): ?>
                                <div class="row row_list">
                                    <div class="col-xs-5">Егерское обслуживание</div>
                                    <div class="col-xs-7"><?php the_field('chasseur_service'); ?></div>
                                </div>
								<?php endif; ?>
								<?php if( get_field('transport_hunt') ): ?>
                                <div class="row row_list">
                                    <div class="col-xs-5">Транспорт на охоте</div>
                                    <div class="col-xs-7"><?php the_field('transport_hunt'); ?></div>
                                </div>
								<?php endif; ?>
								<?php if( get_field('area_land') ): ?>
                                <div class="row row_list">
                                    <div class="col-xs-5">Площадь угодий</div>
                                    <div class="col-xs-7"><?php the_field('area_land'); ?></div>
                                </div>
								<?php endif; ?>
                            </section>
<?php endif; ?>

<?php if( get_field('description_accommodation') || get_field('gallery_tour') || get_field('conditions_accommodation') ): ?>
                            <section class="margin_bottom info_block">
                                <div class="row_title">Проживание</div>
  
<?php $images = get_field('gallery_tour'); if( $images ): ?>
    <div class="gallery_more">
        <?php foreach( $images as $image ): ?>
            <div class="item_gallery">
                <a href="<?php echo $image['url']; ?>" data-fancybox="group">
                     <img src="<?php echo $image['sizes']['large']; ?>" class="img-responsive" alt="<?php echo $image['alt']; ?>" />
                </a>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
<?php if( get_field('description_accommodation') ): ?><div class="top_content"><?php the_field('description_accommodation'); ?></div><?php endif; ?>
<?php if( get_field('conditions_accommodation') ): ?><div class="content" id="uslov_live"><?php the_field('conditions_accommodation'); ?></div><?php endif; ?>
                            </section>
<?php endif; ?>


							<?php if( get_field('transport_description') ): ?>
                            <section class="margin_bottom info_block">
                                <div class="row_title">Трансфер</div>
                                <div class="content"><?php the_field('transport_description'); ?></div>
                            </section>
							<?php endif; ?>

<?php if( get_field('deposit') || get_field('term_deposit') || get_field('full_payment') || get_field('cancel_reservation') || get_field('podrantok') || get_field('missing') || get_field('supplement_trophy') ): ?>
                            <section class="margin_bottom info_block pay_info">
                                <div class="row_title">Условия оплаты</div>
                                <?php if( get_field('deposit') ): ?>
								<div class="row row_list">
                                    <div class="col-xs-5">
                                        <span class="icon"><i class="material-icons">add_shopping_cart</i></span>
                                        <span>Депозит</span>
                                    </div>
                                    <div class="col-xs-7"><?php the_field('deposit'); ?></div>
                                </div>
								<?php endif; ?>

                                <?php if( get_field('term_deposit') ): ?>
								<div class="row row_list">
                                    <div class="col-xs-5">
                                        <span class="icon"><i class="material-icons">access_time</i></span>
                                        <span>Срок внесения депозита</span>
                                    </div>
                                    <div class="col-xs-7"><?php the_field('term_deposit'); ?></div>
                                </div> 
								<?php endif; ?>

								<?php if( get_field('full_payment') ): ?>
                                <div class="row row_list">
                                    <div class="col-xs-5">
                                        <span class="icon image"><img src="<?php echo get_template_directory_uri();?>/img/icon/icon.svg" alt=""></span>
                                        <span>Полная оплата</span>
                                    </div>
                                    <div class="col-xs-7"><?php the_field('full_payment'); ?></div>
                                </div>
								<?php endif; ?>

								<?php if( get_field('cancel_reservation') ): ?>
                                <div class="row row_list">
                                    <div class="col-xs-5">
                                        <span class="icon"><i class="material-icons">not_interested</i></span>
                                        <span>Отмена бронирования</span>
                                    </div>
                                    <div class="col-xs-7"><?php the_field('cancel_reservation'); ?> <span class="red">(!)</span></div>
                                </div> 
								<?php endif; ?>

								<?php if( get_field('podrantok') ): ?>
                                <div class="row row_list">
                                    <div class="col-xs-5">
                                        <span class="icon image"><img src="<?php echo get_template_directory_uri();?>/img/icon/animal-paw-print.svg" alt=""></span>
                                        <span>Подранок</span>
                                    </div>
                                    <div class="col-xs-7"><?php the_field('podrantok'); ?></div>
                                </div>
								<?php endif; ?>

								<?php if( get_field('missing') ): ?>
                                <div class="row row_list">
                                    <div class="col-xs-5">
                                        <span class="icon image"><img src="<?php echo get_template_directory_uri();?>/img/icon/sad.svg" alt=""></span>
                                        <span>Промах</span>
                                    </div>
                                    <div class="col-xs-7"><?php the_field('missing'); ?></div>
                                </div>
								<?php endif; ?>

								<?php if( get_field('supplement_trophy') ): ?>
                                <div class="row row_list">
                                    <div class="col-xs-5">
                                        <span class="icon image"><img src="<?php echo get_template_directory_uri();?>/img/icon/payment-method.svg" alt=""></span>
                                        <span>Доплата за трофей</span>
                                    </div>
                                    <div class="col-xs-7"><?php the_field('supplement_trophy'); ?></div>
                                </div>
								<?php endif; ?>
                            </section> 
	<?php endif; ?>
<?php if( get_field('vaccination') ||  get_field('insurance') ): ?>
                            <section class="margin_bottom info_block">
                                <div class="row_title">Рекомендации</div>
								<?php if( get_field('vaccination') ): ?>
                                <div class="row row_list">
                                    <div class="col-xs-5">
                                        <span class="icon image"><img src="<?php echo get_template_directory_uri();?>/img/icon/syringe.svg" alt=""></span>
                                        <span>Вакцинация</span>
                                    </div>
                                    <div class="col-xs-7"><?php the_field('vaccination'); ?></div>
                                </div>
								<?php endif; ?>
								<?php if( get_field('insurance') ): ?>
                                <div class="row row_list">
                                    <div class="col-xs-5">
                                        <span class="icon image"><img src="<?php echo get_template_directory_uri();?>/img/icon/cardiogram.svg" alt=""></span>
                                        <span>Мед. страховка охотника</span>
                                    </div>
                                    <div class="col-xs-7"><?php the_field('insurance'); ?></div>
                                </div>
								<?php endif; ?>
                            </section>
<?php endif; ?>  

                        </section>
                        <a href="#" style="background-color: #FFEFE0;color: #ff8a00;" class="hide_information">
							<span>Подробнее</span> <i class="material-icons">more_horiz</i></a>


<?php if( get_field('reviews_block') ): ?>
<section class="margin_bottom reviews_block">
<div class="row_title">Отзывы охотников</div>
<div class="reviews_tab">
<?php while( have_rows('reviews_block') ): the_row(); 
$name_reviews = get_sub_field('name_reviews'); 
$datetour_reviews = get_sub_field('datetour_reviews');
$title_reviews = get_sub_field('title_reviews');
$txt_reviews = get_sub_field('txt_reviews');
?>


<div class="reviews_item">
<div class="name"><?php echo $name_reviews; ?> <span>(период тура <?php echo $datetour_reviews; ?>)</span></div>
<div class="title"><?php echo $title_reviews; ?></div>
<div class="message"><?php echo $txt_reviews; ?></div>
<div class="raiting">
	<?php if( get_sub_field('rait_reviews') == 0 ): ?>
	<i class="material-icons">star_rate</i>
	<i class="material-icons">star_rate</i>
	<i class="material-icons">star_rate</i>
	<i class="material-icons">star_rate</i>
	<i class="material-icons">star_rate</i>
	<?php endif; ?>
	<?php if( get_sub_field('rait_reviews') == 1 ): ?>
	<i class="material-icons active">star_rate</i>
	<i class="material-icons">star_rate</i>
	<i class="material-icons">star_rate</i>
	<i class="material-icons">star_rate</i>
	<i class="material-icons">star_rate</i>
	<?php endif; ?>
	<?php if( get_sub_field('rait_reviews') == 2 ): ?>
	<i class="material-icons active">star_rate</i>
	<i class="material-icons active">star_rate</i>
	<i class="material-icons">star_rate</i>
	<i class="material-icons">star_rate</i>
	<i class="material-icons">star_rate</i>
	<?php endif; ?>
	<?php if( get_sub_field('rait_reviews') == 3 ): ?>
	<i class="material-icons active">star_rate</i>
	<i class="material-icons active">star_rate</i>
	<i class="material-icons active">star_rate</i>
	<i class="material-icons">star_rate</i>
	<i class="material-icons">star_rate</i>
	<?php endif; ?>
	<?php if( get_sub_field('rait_reviews') == 4 ): ?>
	<i class="material-icons active">star_rate</i>
	<i class="material-icons active">star_rate</i>
	<i class="material-icons active">star_rate</i>
	<i class="material-icons active">star_rate</i>
	<i class="material-icons">star_rate</i>
	<?php endif; ?>
	<?php if( get_sub_field('rait_reviews') == 5 ): ?>
	<i class="material-icons active">star_rate</i>
	<i class="material-icons active">star_rate</i>
	<i class="material-icons active">star_rate</i>
	<i class="material-icons active">star_rate</i>
	<i class="material-icons active">star_rate</i>
	<?php endif; ?>
</div>
</div>
<?php endwhile; ?>
</div>
</section>    
<?php endif; ?>

<?php if( get_field('tour_on_map') ): ?>
                        <section class="margin_bottom map_tour">
                            <div class="row_title">Тур на карте 
                                <a target="_blank" href="<?php the_field('url_tour_map'); ?>" class="rcol">открыть в google карте</a>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">

<?php $location = get_field('tour_on_map'); if( ! empty($location) ): ?>
<div id="map" style="width: 100%; height: 350px;"></div>
<script src='https://maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyDgmGnnBxWg_ZyEoNQCbnKy30a6uAsp4xU' type='text/javascript'></script>

<script type="text/javascript">
  //<![CDATA[
	function load() {
	var lat = <?php echo $location['lat']; ?>;
	var lng = <?php echo $location['lng']; ?>;
	var latlng = new google.maps.LatLng(lat, lng);
	var myOptions = {zoom: 6,center: latlng,mapTypeId: google.maps.MapTypeId.ROADMAP};
	var map = new google.maps.Map(document.getElementById("map"), myOptions);
	var marker = new google.maps.Marker({
	position: map.getCenter(),
	map: map
   });
}
// call the function
   load();
//]]>
</script>
<?php endif; ?> 

                                </div>
                            </div>
                        </section>
<?php endif; ?>


<?php $posts = get_field('related_tours'); if( $posts ): ?>
                        <section class="recommended_tours">
                            <div class="row_title">Похожие туры</div>
                            <div class="row">
<?php foreach( $posts as $post): ?>
<div class="item_slider full_item col-sm-6">
<div class="poster"><a href="<?php the_permalink(); ?>"><img src="<?php $thumb_id = get_post_thumbnail_id(); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0];?>" class="img-responsive" alt=""></a></div>
<div class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
<div class="price"><?php the_field('start_price_tour'); ?>Р<span class="info"><?php the_field('summa_day_tour'); ?>, <?php the_field('summa_hunters'); ?></span></div>
</div>
<?php endforeach; ?><?php wp_reset_postdata();?>
                            </div>
                        </section>
<?php endif; ?>

                    </div>
<?php endwhile; // конец цикла ?>

				</div>
            </div>
        </main>
<a href=".fixed_block" class="tour_bron_form">Забронировать</a>

<script>
	$(document).ready(function(){
			$('#select_hunters').trigger('change');
	});
</script>

<?php get_footer(); // подключаем footer.php ?>


