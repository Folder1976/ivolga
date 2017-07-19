<?php
/*
Template Name: Оформление тура
*/
?><!DOCTYPE html>
<html lang="ru-RU">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" type="text/css" href="/wp-content/themes/Hunting/style.css">
	<title><?php typical_title(); // выводи тайтл, функция лежит в function.php ?></title>
        <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/libs/owl/owl.carousel.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/libs/fancy/jquery.fancybox.min.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/bootstrap-grid.min.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/fonts.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/jquery-ui.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/style.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/media.css">
        <script src="<?php echo get_template_directory_uri();?>/libs/modernizr/modernizr.js"></script>
	<?php wp_head(); // необходимо для работы плагинов и функционала ?>
        <script src="<?php echo get_template_directory_uri();?>/libs/jquery/jquery-1.11.2.min.js"></script>
        <script src="<?php echo get_template_directory_uri();?>/js/jquery-ui.js"></script>
</head>
<body>

<main id="main" class="checkout_page">
            <div class="container">
                <div class="row row_flex">
                    <div class="col-md-4 col-md-push-8">
                        <div class="price_block grey">

<?php if( htmlspecialchars($_POST['geo_map']) ): ?>

                            <form class="form">

<input type="hidden" name="project_name" value="ivolga">
<input type="hidden" name="form_subject" value="Оформление тура – <?php echo htmlspecialchars($_POST['tour_name']); ?>">

<input type="hidden" name="tour_name" value="<?php echo htmlspecialchars($_POST['tour_name']); ?>">
<input type="hidden" name="tour_link" value="<?php the_field('page_tour'); ?>">

<input type="hidden" name="name_contact" value="<?php the_field('name_contact'); ?>">
<input type="hidden" name="phone_contact" value="<?php the_field('phone_contact'); ?>">
<input type="hidden" name="email_contact" value="<?php the_field('email_contact'); ?>">
<input type="hidden" name="address_contact" value="<?php the_field('address_contact'); ?>">

<input type="hidden" name="name_client" value="<?php echo htmlspecialchars($_POST['name_form']); ?>" >
<input type="hidden" name="phone_client" value="<?php echo htmlspecialchars($_POST['phone_form']); ?>" >
<input type="hidden" name="email_client" value="<?php echo htmlspecialchars($_POST['email_form']); ?>" >

<input type="hidden" name="date_tour" value="<?php echo htmlspecialchars($_POST['tour_date_srok']); ?>" >
<input type="hidden" name="summa_tour" value="<?php echo htmlspecialchars($_POST['tour_price']); ?>" >

<input type="hidden" name="summa_tour_eger" value="<?php echo htmlspecialchars($_POST['summa_tour_eger']); ?> Р за <?php echo num_decline( $_POST['tour_date'] , 'день, дня, дней' ); ?>" >
<input type="hidden" name="summa_tour_avto" value="<?php echo htmlspecialchars($_POST['summa_tour_avto']); ?> Р за <?php echo num_decline( $_POST['tour_date'] , 'день, дня, дней' ); ?>" >


<input type="hidden" name="tour_hunters" value="<?php echo num_decline( $_POST['tour_hunters'] , 'охотник, охотника, охотников' ); ?> х <?php echo num_decline( $_POST['tour_date'] , 'день, дня, дней' ); ?> = <?php echo htmlspecialchars($_POST['summa_tour_hunters']); ?> Р" >
<?php if (htmlspecialchars($_POST['tour_gost']) != 0 ) : ?>
<input type="hidden" name="tour_gost" value="<?php echo num_decline( $_POST['tour_gost'] , 'гость, гостя, гостей' ); ?> х <?php echo num_decline( $_POST['tour_date'] , 'день, дня, дней' ); ?> = <?php echo htmlspecialchars($_POST['summa_tour_gost']); ?> Р" >
<?php endif; ?>
<input type="hidden" name="tour_trof" value="<?php echo num_decline( $_POST['tour_trof'] , 'трофей, трофея, трофеев' ); ?> = <?php echo htmlspecialchars($_POST['summa_trof']); ?> Р">
<input type="hidden" name="tour_yslov_money" value="<?php echo htmlspecialchars($_POST['tour_yslov_money']); ?>" />

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); // старт цикла ?>
<input type="hidden" name="inclusion" value="<?php the_content();?>" >
<?php endwhile; // конец цикла ?>
                                <div class="checkout_price">Подтверждение бронирования</div>

                                <div class="checkout">
                                    <div class="title">Период охоты</div>
                                    <div class="content">
                                        <ul>
                                            <li><?php echo htmlspecialchars($_POST['tour_date_srok']); ?></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="checkout">
                                    <div class="title">Охотники и гости</div>
                                    <div class="content">
                                        <ul>
                                            <li><?php echo num_decline( $_POST['tour_hunters'] , 'охотник, охотника, охотников' ); ?> х <?php echo num_decline( $_POST['tour_date'] , 'день, дня, дней' ); ?> = <?php echo htmlspecialchars($_POST['summa_tour_hunters']); ?> Р</li>
<?php if (htmlspecialchars($_POST['tour_gost']) != 0 ) : ?>
<?php echo num_decline( $_POST['tour_gost'] , 'гость, гостя, гостей' ); ?> х <?php echo num_decline( $_POST['tour_date'] , 'день, дня, дней' ); ?> = <?php echo htmlspecialchars($_POST['summa_tour_gost']); ?> Р</li><?php endif; ?>
                                        </ul>
                                    </div>
                                </div>

                                <div class="checkout">
                                    <div class="title">Егерское обслуживание</div>
                                    <div class="content">
                                        <ul>
                                            <li><?php echo htmlspecialchars($_POST['summa_tour_eger']); ?> Р за <?php echo num_decline( $_POST['tour_date'] , 'день, дня, дней' ); ?></li>
                                        </ul>
                                    </div>
                                </div>

<div class="checkout">
                                    <div class="title">Аренда транспорта</div>
                                    <div class="content">
                                        <ul>
                                            <li><?php echo htmlspecialchars($_POST['summa_tour_avto']); ?> Р за <?php echo num_decline( $_POST['tour_date'] , 'день, дня, дней' ); ?></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="checkout">
                                    <div class="title">Трофеи</div>
                                    <div class="content">
                                        <ul>
                                            <li><?php echo num_decline( $_POST['tour_trof'] , 'трофей, трофея, трофеев' ); ?> = <?php echo htmlspecialchars($_POST['summa_trof']); ?> Р</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="summa">К оплате: <span><?php echo htmlspecialchars($_POST['tour_price']); ?></span></div>
								<input type="submit" name="submit" class="finish" value="Забронировать тур"><br>
                                <div class="no_money_block">вы пока ни за что не платите</div>
                                <div class="agreement"><a href="/terms/">Пользовательское соглашение</a></div>
                            </form>
<?php else: ?>
<div class="checkout_price">Информация не заполнена</div>
<a href="<?php the_field('page_tour'); ?>" class="finish">Вернуться на страницу тура</a>
<?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-8 col-md-pull-4">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); // старт цикла ?>

                        <section class="info_block margin_bottom">
                            <h1 class="title_tour"><?php wp_title(''); ?></h1>
                            <?php if( htmlspecialchars($_POST['geo_map']) ): ?>
								<div class="sub_title_tour"><?php echo htmlspecialchars($_POST['geo_map']); ?></div>
							<?php endif; ?>
                        </section>
                        <br>
                        <section class="info_block margin_bottom">
                            <div class="row_title">В Ваш тур включено</div>
                            <div class="content included_list">
                                <?php the_content();?>
                            </div>
                        </section>

<?php if( get_field('fines') ): ?>
<section class="info_block margin_bottom">
                            <div class="row_title">Штрафы</div>
                            <div class="content"><?php the_field('fines'); ?></div>
                        </section>
<?php endif; ?>

<?php endwhile; // конец цикла ?>


                    </div>
                </div>
            </div>
        </main>

        <div class="loader">
            <div class="loader_inner"></div>
        </div>

        <script src="<?php echo get_template_directory_uri();?>/js/masked.js"></script>
        <script src="<?php echo get_template_directory_uri();?>/libs/owl/owl.carousel.min.js"></script>
        <script src="<?php echo get_template_directory_uri();?>/js/thumb_slider.js"></script>
        <script src="<?php echo get_template_directory_uri();?>/libs/fancy/jquery.fancybox.min.js"></script>
		<script src="<?php echo get_template_directory_uri();?>/js/jquery.sticky-kit.min.js"></script>
<?php wp_footer(); // необходимо для работы плагинов и функционала  ?>
       <script src="<?php echo get_template_directory_uri();?>/js/common.js"></script>

</body>
</html>