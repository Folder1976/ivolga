<?php get_header(); // подключаем header.php ?>
<main id="main">
            <div class="container">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); // старт цикла ?>
<?php the_content(); // контент ?>
<?php endwhile; // конец цикла ?>
            </div>
        </main>
<?php get_footer(); // подключаем footer.php ?>