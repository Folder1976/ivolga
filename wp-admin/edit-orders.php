<script src="//code.jquery.com/jquery-3.0.0.slim.min.js"></script>
<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
<link rel='stylesheet' id='acf-global-css'  href='https://ivolga.io/wp-content/plugins/advanced-custom-fields-pro/assets/css/acf-global.css?ver=5.5.5' type='text/css' media='all' />
<link rel='stylesheet' id='wpforms-menu-css'  href='https://ivolga.io/wp-content/plugins/wpforms-lite/assets/css/admin-menu.css?ver=1.3.8' type='text/css' media='all' />
<?php
/**
 * Edit Comments Administration Screen.
 *
 * @package WordPress
 * @subpackage Administration
 */

/** WordPress Administration Bootstrap */
require_once( dirname( __FILE__ ) . '/admin.php' );

require_once( ABSPATH . 'wp-admin/admin-header.php' );
?>

<div class="wrap">
<h1 class="wp-heading-inline">Заказы</h1>

<?php

	//include "../../../wp-config.php";
	include ABSPATH."/class/orders.php";
	$Orders = new Orders();
	
	$orders_list = $Orders->getOrders();
	
	//echo '<pre>'; print_r(var_dump( $orders_list  ));

	?>
	<style>
		.product_list td{
			padding-left: 3px;
			padding-right: 7px;
		}
		.parination_wrapper{
			padding: 5px;
			width: 100%;
		}
		.parination_wrapper a{
			padding: 3px;
			border: 1px solid gray;
			text-decoration: none;
			margin-right: 4px;
		}
		.history_wrapper{
			display: none;
		}
	</style>
	
	<table border="1" cellspacing="0" cellpadding="3" align="center" class="product_list" width="100%">
		<tr style="background-color: #9E9E9E;">
			<th>Заказ</th>
			<th>Дата</th>
			<th>Название тура</th>
			<th>Клиент</th>
			<th>Телефон</th>
			<th>Сумма</th>
			<th>* * *</th>
		</tr>
	<?php foreach($orders_list as $index => $row){ ?>
		<tr id="<?php echo $index; ?>">
			<td><?php echo $index; ?></td>
			<td><?php echo $row['date']; ?></td>
			<td><a href="<?php echo $row['tour_link']; ?>" target="_blank"><?php echo $row['tour_name']; ?></a></td>
			<td><?php echo $row['name_client']; ?></td>
			<td><?php echo $row['phone_client']; ?></td>
			<td style="text-align: right;"><?php echo $row['summa_tour']; ?> P</td>
			<td><a href="javascript:;" class="detail">Детально</a></td>
		</tr>		
		
		<tr id="detail_<?php echo $index; ?>" style="display: none;">
			<td colspan="7">
				<b>Номер заказа : </b><?php echo $index; ?><br>
				<b>Дата заказа : </b><?php echo $row['date']; ?><br>
				<b>Период : </b><?php echo $row['date_tour']; ?><br>
				<b>Тур : </b><?php echo $row['tour_name']; ?><br>
				<br>
				<b>Заказчик : </b><?php echo $row['name_client']; ?><br>
				<b>Телефон : </b><?php echo $row['phone_client']; ?><br>
				<b>Е-mail : </b><?php echo $row['email_client']; ?><br>
				<br>
				<b>Охотников : </b><?php echo $row['tour_hunters']; ?><br>
				<b>Гостей : </b><?php echo $row['tour_gost']; ?><br>
				<b>Трофеи : </b><?php echo $row['tour_trof']; ?><br>
				<br>
				<b>Охотхозяйство : </b><?php echo $row['name_contact']; ?><br>
				<b>Адрес : </b><?php echo $row['address_contact']; ?><br>
				<b>Телефон : </b><?php echo $row['email_contact']; ?><br>
				<b>Е-mail : </b><?php echo $row['phone_contact']; ?><br>
			</td>
		</tr>		
				
	<?php } ?>
	
	</table>	
	
<div id="ajax-response"></div>
<script>
	$(document).on('click', '.detail', function(){
		
		var product_id = $(this).parent('td').parent('tr').attr('id');
		
		if($('#detail_'+product_id).css('display') == 'none'){
			
			$('#detail_'+product_id).show(500);
			$(this).html('Скрыть');
			
		}else{
			
			$('#detail_'+product_id).hide(500);
			$(this).html('Детально');
			
		}
			
	});
</script>
<?php

include( ABSPATH . 'wp-admin/admin-footer.php' ); ?>
