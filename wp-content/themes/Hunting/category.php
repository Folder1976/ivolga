<?php get_header(); // подключаем header.php ?>

<?php $locations = array(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); // если посты есть - запускаем цикл wp ?>
		<?php
            $geo_map = get_field_object('geo_map');
        
            $arr = explode('/', $geo_map['value']);
            $locations[trim($arr[0])][trim($arr[1])] = trim($arr[1]);  
         
            //echo '<pre>'; print_r(var_dump( get_field_object(null)  ));
            
            //get_template_part('loop'); // для отображения каждой записи берем шаблон loop.php ?>
	<?php endwhile; // конец цикла
	else: echo ''; endif; // если записей нет, напишим "простите" ?>	

<?php //echo '<pre>'; print_r(var_dump( $_SERVER['REDIRECT_URL']  )); ?>

<main id="main">
            <div class="page_title">
                <div class="container">
                    <div class="title-cat hidden-xs"><?php wp_title(''); ?></div>
                    <div class="filter">

                        <?php
                        // оприделяем классы для фильтра цены
                        if (isset($_GET['price']) AND $_GET['price'] != '') {
                            if ( $_GET['price'] == 'Дорогие') {
                                $price_class = 'active asc';
                            } else {
                                $price_class = 'active desc';
                            }
                        } else {
                            $price_class = 'no-active';
                        }
                        ?>
                        <div class="js-filter-price price <?php echo $price_class; ?>">
                            <div>
                                <span>По цене </span><i class="material-icons">arrow_drop_down</i>
                            </div>
                        </div>


                        <div class="location f-select <?php if(isset($_GET['location']) AND $_GET['location'] != '') echo 'active' ?>">
                            <div class="title">
                                <?php if(isset($_GET['location']) AND $_GET['location'] != ''){ ?>
                                    <span><?php echo $_GET['location']; ?></span>
                                <?php }else{ ?>
                                    <span>Место охоты</span>
                                <?php } ?>
                                <i class="material-icons">arrow_drop_down</i></div>
                            <div class="list">
                                <?php foreach($locations as $country => $regions){ ?>
                                    <ul>
                                        <li class="header"><?php echo $country; ?></li>
                                        <?php foreach($regions as $region){ ?>
                                            <li><?php echo $region;?></li>
                                        <?php } ?>    
                                    </ul>
                                <?php } ?>
                            </div>
                        </div>
                        <!--div class="region_list">
                            <?php //region_list();?>
                        </div-->
                  
                    </div>
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

<?php //Строка для параметра локации
    
    $url = $_SERVER['REDIRECT_URL'];
    $url_location = $url.'?';
    $url_price = $url.'?';
    
    foreach($_GET as $index => $value){
        
        if($index != 'location'){
            $url_location .= $index .'='.$value.'&';
        }
        if($index != 'price'){
            $url_price .= $index .'='.$value.'&';
        }
        
    }
?>

<script>
    $(document).on('click', '.location li', function(){
       
        var html = $(this).html();
        
        console.log(location);
        location.href = '<?php echo $url_location; ?>location='+html;
        
    });
    $(document).on('click', '.price li', function(){
       
        var html = $(this).html();
        
        console.log(location);
        location.href = '<?php echo $url_price; ?>price='+html;
        
    });
</script>

<?php get_footer(); // подключаем footer.php ?>
