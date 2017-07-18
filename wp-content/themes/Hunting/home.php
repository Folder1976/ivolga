<?php get_header(); // подключаем header.php ?> 

<?php if( get_field('title_header','option') || get_field('bg_header','option') || get_field('txt_url_header','option') || get_field('txt_url_header','option') ): ?>
<header id="header"<?php if( get_field('bg_header','option') ): ?> style="background-image: url(<?php the_field('bg_header','option'); ?>);"<?php endif; ?>>
            <div class="container">
                <?php if( get_field('title_header','option') ): ?><div class="top"><?php the_field('title_header','option'); ?></div><?php endif; ?>
                <?php if( get_field('sub_title_header','option') ): ?><div class="sub_top"><?php the_field('sub_title_header','option'); ?></div><?php endif; ?>
                <?php if( get_field('txt_url_header','option') ): ?><div class="link"><a href=".animal_select"><?php the_field('txt_url_header','option'); ?></a></div><?php endif; ?>
            </div>
        </header>
<?php endif; ?>

        <main id="main">
            <div class="container">


<?php $categories = get_categories( array( 'orderby' => 'name', 'order'   => 'ASC') ); if($categories): ?>
<section class="animal_select"><div class="row">
<?php foreach( $categories as $category): ?>
<div class="col-md-4">
<a href="<?php echo $category->slug ?>" class="item"<?php if($imgcat1=get_field("category_bg",$category)){?> style="background-image:url(<?php echo $imgcat1;?>);"<?php }?>>
<div class="title"><?php echo $category->name ?></div>
<div class="number"><?php echo num_decline( $category->count , 'тур, тура, туров' ); ?></div>
</a>
</div>
<?php endforeach; ?>
</div></section>
<?php endif; ?>

<?php $posts = get_field('home_recomended_tour','option'); if( $posts ): ?>
<section class="recommended_tours">
<div class="row_title">Рекомендуемые туры</div>
<div class="recommended_slider">

<?php foreach( $posts as $post): ?>
<div class="item_slider full_item">
<div class="poster"><a href="<?php the_permalink(); ?>"><img src="<?php $thumb_id = get_post_thumbnail_id(); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0];?>" class="img-responsive" alt=""></a></div>
<div class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
<div class="price"><?php the_field('start_price_tour'); ?>Р<span class="info"><?php the_field('summa_day_tour'); ?>, <?php the_field('summa_hunters'); ?></span></div>
</div>
<?php endforeach; ?><?php wp_reset_postdata();?>
                            
</div>
</section>
<?php endif; ?>


            </div>
        </main>


<?php get_footer(); // подключаем footer.php ?>