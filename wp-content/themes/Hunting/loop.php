<?php
    $geo_map = get_field_object('geo_map');
    
    if(isset($_GET['location']) AND
       $_GET['location'] != '' AND
        strpos($geo_map['value'], $_GET['location']) === false){
        
    }else{

?>
<div class="item_slider full_item col-md-4">
                        <div class="poster">
                                                <a target="_blank" href="<?php the_permalink(); ?>"><img src="<?php $thumb_id = get_post_thumbnail_id(); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0];?>" class="img-responsive" alt=""></a></div>
                        <div class="title"><a target="_blank" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                        <div class="map"><?php 
                                                
                                    $arr = explode('/', $geo_map['value']);
                                    if(isset($arr[1])){
                                        echo $arr[0].'/'.$arr[1];                        
                                    }else{
                                        echo $arr[0];                        
                                    }
                                                                                                
                                    ?></div>
                        <div class="price"><?php the_field('start_price_tour'); ?>Р<span class="info"><?php the_field('summa_day_tour'); ?>, <?php the_field('summa_hunters'); ?></span></div>
</div>

<?php } ?>