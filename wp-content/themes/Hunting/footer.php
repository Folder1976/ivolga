    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
                    <div class="ftext">
                        <div class="flogotype">
                            <img src="/wp-content/themes/Hunting/img/logo-white-min.png" title="Logo Ivolga.io footer" alt="Logo Ivolga.io">
            		    </div>
                        <div class="text">
                            <p>Все права защищены © 2017 Иволга</p>
                        </div>
                        <!-- <a href="/terms/" class="copy">Пользовательское соглашение</a> -->
                    </div>
                </div>

                <div class="col-lg-5 col-md-6 col-sm-6 col-xs-12 mb0">
                    <?php $args = array('theme_location' => 'bottom','container'=> false,'menu_class' => 'footer_list');
    					wp_nav_menu($args);
    				?>
                </div>

                <div class="col-lg-5 col-md-3 col-sm-6 col-xs-12 tright">
                    <?php if( get_field('email_address','option') ): ?><a href="mailto:<?php the_field('email_address','option'); ?>" class="mail hidden-xs"><?php the_field('email_address','option'); ?></a><?php endif; ?>
                    <div class="f_social pull-right">
                        <?php if( get_field('url_vk','option') ): ?>
                            <a target="_blank" href="<?php the_field('url_vk','option'); ?>"><i class="ic-vk"></i></a>
                        <?php endif; ?>
                        <?php if( get_field('url_facebook','option') ): ?>
                            <a target="_blank" href="<?php the_field('url_facebook','option'); ?>"><i class="ic-fb"></i></a>
                        <?php endif; ?>
                        <?php if( get_field('url_inst','option') ): ?>
                            <a target="_blank" href="<?php the_field('url_inst','option'); ?>"><i class="ic-inst"></i></a>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </footer>

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