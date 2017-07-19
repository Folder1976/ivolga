<?php
/**
 * Страница 404 ошибки (404.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
get_header(); // Подключаем header.php ?>

<style>
   section h1{
        text-align: center;
        font-size: 48px;
        }
   section p{
        text-align: center;
        font-size: 32px;
        }
</style>

<section>
<h1>Ой, это 404!</h1>
<p>Cтраница не найдена</p>
</section>

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


<?php //get_sidebar(); // подключаем sidebar.php ?>
<?php get_footer(); // подключаем footer.php ?>