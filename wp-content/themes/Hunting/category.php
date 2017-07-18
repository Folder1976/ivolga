<?php get_header(); // подключаем header.php ?> 
<main id="main">
            <div class="page_title">
                <div class="container">
                    <?php wp_title(''); ?>
                </div>
            </div>
            <div class="container">
                <div class="row">

<?php if (have_posts()) : while (have_posts()) : the_post(); // если посты есть - запускаем цикл wp ?>
		<?php get_template_part('loop'); // для отображения каждой записи берем шаблон loop.php ?>
	<?php endwhile; // конец цикла
	else: echo '<h2>Нет записей.</h2>'; endif; // если записей нет, напишим "простите" ?>	
</div>
                <div class="row">
                    <div class="col-xs-12"><?php pagination();?></div>
                </div>
            </div>
        </main>

<?php get_footer(); // подключаем footer.php ?>