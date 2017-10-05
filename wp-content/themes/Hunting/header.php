<?php
/**
 * Шаблон шапки (header.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); // вывод атрибутов языка ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); // кодировка ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!--link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/style.css"-->
	<title><?php typical_title(); // выводи тайтл, функция лежит в function.php ?></title>
        <link href="/favicon.ico" rel="shortcut icon" />
        <link href="/favicon.ico" rel="icon" type="image/x-icon" />
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
        <script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
          
	ga('create', 'UA-97256337-1', 'auto');
	ga('send', 'pageview');
        </script>
</head>
<body <?php body_class(); // все классы для body ?>>

<div id="hnav">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <nav class="pull-left hidden-lg hidden-md">
                    <a href="/" class="arrow-back hidden-sm hidden-home pull-left"><i class="material-icons">arrow_back</i></a>
                    <?php if ( is_front_page() ) { ?>
                        <a class="nav-open" href="#"><i class="material-icons">menu</i></a>
                    <?php } else { ?>
                        <a class="nav-open hidden-xs" href="#"><i class="material-icons">menu</i></a>
                    <?php } ?>
                    <?php if ( is_category() ) { ?>
                        <span class="mob-title-cat hidden-sm"><?php wp_title(''); ?></span>
                    <?php } ?>
                    <div class="nav">
                        <div class="nav-top"><img width="70%" src="/wp-content/themes/Hunting/img/logo-white-min.png" title="Logo Ivolga.io" alt="Logo Ivolga.io"></div>
                        <a class="close-nav" href="#"><i class="material-icons">close</i></a><?php
                        $args = array('theme_location' => 'bottom', 'container'=>false, 'menu_class' => 'mob-menu');
                            wp_nav_menu($args);
                        ?>
                        <div class="nav-bottom">
                            <a href="/contact/" class="btn-transparent write-us">Написать нам</a>
                        </div>
                    </div>
                </nav>
                <div class="logo">
                    <a href="/" class="logotype"><img width="70%" src="/wp-content/themes/Hunting/img/logo-white-min.png" title="Logo Ivolga.io" alt="Logo Ivolga.io"></a>
                </div>
            </div>
            <div class="col-md-8 col-sm-6">
                <a href="/contact/" class="btn-transparent pull-right write-us write-us__top">Написать нам</a>
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'top',
                    'menu_class'     => 'top-menu',
                ) );
                ?>

                
            </div>
        </div>
    </div>
</div>



