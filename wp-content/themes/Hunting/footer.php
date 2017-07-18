<footer id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="ftext">
                            <div class="flogotype"></div>
                            Все права защищены © 2017 <span>mysitename</span><br>
                            <a href="#" class="copy">Пользовательское соглашение</a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="f_top">Трофеи</div>
                        <?php $args = array('theme_location' => 'bottom','container'=> false,'menu_class' => 'footer_list');
							wp_nav_menu($args);
						?>
                    </div>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                        <div class="f_social">
                   <?php if( get_field('url_vk','option') ): ?>
					<a target="_blank" href="<?php the_field('url_vk','option'); ?>"><img src="<?php echo get_template_directory_uri();?>/img/vk.svg" alt=""></a>
					<?php endif; ?>
                   <?php if( get_field('url_inst','option') ): ?>
                   <a target="_blank" href="<?php the_field('url_inst','option'); ?>"><img src="<?php echo get_template_directory_uri();?>/img/instagram.svg" alt=""></a>
					<?php endif; ?>
                   <?php if( get_field('url_facebook','option') ): ?>
                   <a target="_blank" href="<?php the_field('url_facebook','option'); ?>"><img src="<?php echo get_template_directory_uri();?>/img/facebook.svg" alt=""></a>
					<?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 tright">
<?php if( get_field('email_address','option') ): ?><a href="mailto:<?php the_field('email_address','option'); ?>" class="mail"><i class="material-icons">mail_outline</i> <?php the_field('email_address','option'); ?></a><?php endif; ?>
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