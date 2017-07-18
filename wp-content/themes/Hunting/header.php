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
<body <?php body_class(); // все классы для body ?>>

<div id="hnav">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2 col-xs-4">
                        <a href="/" class="logotype"></a>
                    </div>
                    <div class="col-sm-8 col-xs-8 col-nav">
                        <a class="nav-open" href="#"><i class="material-icons">menu</i></a>
                        <div class="nav">
                            <a class="close-nav" href="#"><i class="material-icons">close</i></a>
                           <?php $args = array('theme_location' => 'top', 'container'=>false); wp_nav_menu($args); ?>
                           <?php if( get_field('email_address','option') ): ?><div class="mobile_mail"><a href="mailto:<?php the_field('email_address','option'); ?>" class="mail_link"><?php the_field('email_address','option'); ?></a></div><?php endif; ?>
                        </div>
                    </div>
                    <div class="col-sm-2 hidden-xs">
<?php if( get_field('email_address','option') ): ?><a href="mailto:<?php the_field('email_address','option'); ?>" class="mail_link"><?php the_field('email_address','option'); ?></a><?php endif; ?>
                    </div>
                </div>
            </div>
        </div>