<?php
/*
Template Name: Спасибо
*/
?>

<!DOCTYPE html>
<html <?php language_attributes(); // вывод атрибутов языка ?> class="thanks_application">
<head>
	<meta charset="<?php bloginfo( 'charset' ); // кодировка ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/style.css">
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

<div class="container">
            <div class="thanks_page">
                <div class="logotype"><a href="/"><span></span></a></div>
                <div class="title">Спасибо за бронирование</div>
                <div class="content">Вам на почту выслано письмо с контактами охотхозяйства и подробной информацией тура. <br>Удачной охоты!</div>
                <div class="link"><a href="/">Вернуться на главную страницу</a> </div>
            </div>
        </div>

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