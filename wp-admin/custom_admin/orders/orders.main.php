<script src="js/jquery/jquery-1.8.2.min.js"></script>

<?php
	
	session_start();
	
	$alta_m = mysqli_connect(MAGAZSQLHOST,MAGAZSQLUSER,MAGAZSQLPASS,MAGAZSQLBASE) or die("Error alta " . mysqli_error($folder)); 
	mysqli_set_charset($alta_m,"utf8");
		

	defined('SHP_VALID') or die('Direct Access is not allowed.');

	$page = 1;
	if(isset($_GET['page'])) $page = (int)$_GET['page'];
	
	$limit = 100;
	if(isset($_GET['limit'])) $limit = (int)$_GET['limit'];
	

	//Подключим класс 	
	include 'models/Logs.php';
	$Logs = new Logs();
	
	include 'models/ProductEdit.php';
	$ProductEdit = new ProductEdit();

	//Подключение класса с проверкой
	$exists = FALSE;
	$className = strtolower( 'Users' );
	foreach ( get_declared_classes() as $c ) {
		if ( $className === strtolower( $c ) ) {
			$exists = TRUE;
			break;
		}
	}
	if(!$exists){
		include 'models/Users.php';	
	}
	$Users = new Users();

	//Список редакторов
	
	$sql = 'SELECT distinct edit_user FROM '.$ppt.'nomenkl_edit_log Group BY edit_user';
	$r = $hlnk->query($sql) or die($sql);
	
	$users = array();
	if($r->num_rows){
		while($row = $r->fetch_assoc()){
			$users[$row['edit_user']] = $row['edit_user'];
		}
	}
	
	//Содаем массив пользователей
	$sql = 'SELECT user_id, firstname, lastname FROM user WHERE user_id IN ('.implode(',',$users).') ORDER BY username';
	$r = $alta_m->query($sql);
	if($r->num_rows){
		while($row = $r->fetch_assoc()){
			$users[$row['user_id']] = $row['firstname'].' '.$row['lastname'];
		}
	}
	
	/*
	header("Content-Type: text/html; charset=UTF-8");
	echo '<pre>'; print_r(var_dump( $_COOKIE  ));
	die();
	*/
	
	
	$filter_data = array(
						 'page' => $page,
						 'limit' => $limit
						 );
	
	if(isset($_GET['find_text']) AND $_GET['find_text'] != ''){
		
		$filter_data['find_text'] = $_GET['find_text'];
	}
	
	if(isset($_GET['tovnazv']) AND $_GET['tovnazv'] != ''){
		
		$filter_data['find_name'] = $_GET['tovnazv'];
	}
	
	if(isset($_GET['tovbycode']) AND $_GET['tovbycode'] != ''){
		
		$filter_data['find_code'] = $_GET['tovbycode'];
	}
	
	if(isset($_GET['uadm_id']) AND $_GET['uadm_id'] > 0){
		
		$filter_data['uadm_id'] = (int)$_GET['uadm_id'];
	}
	
	
	//получим пользователя
	$user_id = $Users->convertUserIdFromSysToMag(ADMUZERID);
	$user = $Users->getUserFromMag($user_id);
	
	//Если это не админ - подставляем ИД пользователя
	if((int)$user['user_group_id'] != 1){
		$filter_data['uadm_id'] = $_GET['uadm_id'] = $user_id;
	}
		
	
	$products = $Logs->getProductLogList($filter_data);
	$products_total = $Logs->getProductLogListTotal($filter_data);
	
	
	
	?>
	
		<h2>Лог редактирования товаров</h2>
		
		<form name="search" method="get" action="index.php">
		<input type="hidden" name="modid" value="<?php echo $_GET['modid']; ?>">
		<input type="hidden" name="modact" value="<?php echo $_GET['modact']; ?>">
		<input type="hidden" name="functid" value="<?php echo $_GET['functid']; ?>">
		<table border="1" cellspacing="0" cellpadding="3" align="center">

		<tbody><tr><td>по артикулу</td><td><input type="text" name="tovbycode" size="40" value="<?php echo isset($_GET['tovbycode']) ? $_GET['tovbycode'] : ''; ?>"></td></tr>
		<tr><td>по названию</td><td><input type="text" name="tovnazv" size="60" value="<?php echo isset($_GET['tovnazv']) ? $_GET['tovnazv'] : ''; ?>"></td></tr>
		<tr><td>Выбрать редактора</td><td>
			<select name="uadm_id" style="width: 300px;">
				<option value="0">Все</option>
				<?php foreach($users as $index => $row){ ?>
					<?php if(isset($_GET['uadm_id']) AND $_GET['uadm_id'] == $index){ ?>
						<option selected value="<?php echo $index; ?>"><?php echo $row;?></option>
					<?php }else{ ?>
						<option value="<?php echo $index; ?>"><?php echo $row;?></option>
					<?php } ?>
				<?php } ?>
			</select>
		</td></tr>
		<tr><td bgcolor="silver" align="center" colspan="2"><input type="submit" value="Искать"></td></tr>
		</tbody></table></form>
		
		<?php
		
			if($products_total > $limit){
				echo '<div class="parination_wrapper">';
				
				$count = 1;
				while($products_total > 0){
					
					echo '<a href="/orders/index.php?modid='.$_GET['modid'].
							'&modact='.$_GET['modact'].
							'&functid='.$_GET['functid'].
							(isset($filter_data['uadm_id']) ? '&uadm_id='.$filter_data['uadm_id'] : '').
							(isset($filter_data['find_text']) ? '&find_text='.$filter_data['find_text'] : '').
							(isset($filter_data['find_name']) ? '&tovnazv='.$filter_data['find_name'] : '').
							(isset($filter_data['find_code']) ? '&tovbycode='.$filter_data['find_code'] : '').
							'&page='.$count.'"class="parination">'.$count++.'</a>';
					$products_total -= $limit;
				}
				
				echo '</div>';
			}
		
		?>
		<table border="1" cellspacing="0" cellpadding="3" align="center" class="product_list" width="100%"
					style="background-color: #C8C1FF;">
		<!--tr bgcolor="silver" align="center">
			<th><b>Поиск</b></th>
			<th colspan="4">
				<form method="GET">
					<input type="hidden" name="modid" value="<?php echo $_GET['modid'];?>">
					<input type="hidden" name="modact" value="<?php echo $_GET['modact'];?>">
					<input type="hidden" name="functid" value="<?php echo $_GET['functid'];?>">
					<input type="text" style="min-width:200px;" name="find_text" value="<?php if(isset($_GET['find_text'])) echo $_GET['find_text'];?>">
					<input type="submit" name="find" value="find">
				</form>
				Часть назнания или артикл. Для маски применяйте '%' например [alfeco%ALF.%]
			</th>
		</tr>
		<tr bgcolor="white" align="center">
			<th colspan="5"><b>&nbsp;</b></th>
		</tr-->
		
		<?php if(!$products){ ?>
			
				<tr bgcolor="white" align="center">
				<th colspan="4" style="color:red;"><b>Нет товаров для отображения.</b></th>
				</tr>
			
		<?php
				return false;
			} ?>
		
		<tr align="center" bgcolor="silver">
			<th><b>Редактор</b></th>
			<!--th><b>Артикл[ред]</b></th>
			<th><b>Название</b></th-->
			<th><b>Дата</b></th>
			<th colspan="1"><b>****</b></th>
		</tr>
		
	<?php foreach($products AS $index => $row){ ?>
		<?php
		
			$product = $ProductEdit->getProductInfo($row['product_id']);
			
			$editors = $Logs->getProductEditors($row['product_id']);
			$editor_text = '';
			
			foreach($editors as $row_ed){
				$editor_text .= $row_ed.', ';
			}
			$editor_text = trim($editor_text, ', ');
			
		?>
		<tr id="<?php echo date('Y-m-d',strtotime($row['date'])).'_'.$row['edit_user'];?>"
					data-date="<?php echo date('Y-m-d',strtotime($row['date'])); ?>"
					data-user="<?php echo $row['edit_user'];?>">
			<td><?php echo $editor_text; ?></td>
			<!--td><a href="/orders/nomenklatur/edit-magaz-tovar.php?tovid=<?php echo $row['product_id'];?>" target="_blank"><?php echo $product['model']; ?></a></td>
			<td><?php echo $product['name']; ?></td-->
			<td><?php echo date('Y-m-d', strtotime($row['date'])); ?></td>
			<td><a href="javascript:;" class="list_view">Развернуть</a></td>
			<!--td><a href="javascript:;" class="history_dell"><img src="/image/buttons/remove.png" title="удалить" width="16" height="16"></a></td-->
			
		</tr>
		<tr class="history_wrapper log_<?php echo date('Y-m-d',strtotime($row['date'])).'_'.$row['edit_user'];?>">
			<td colspan="5" id="log_<?php echo date('Y-m-d',strtotime($row['date'])).'_'.$row['edit_user'];?>" style="padding: 0;"></td>
		</tr>
				
	<?php }	?>
			
		</table>
	
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
<script>
	$(document).on('click', '.list_view', function(){
		
		var product_id = $(this).parent('td').parent('tr').attr('id');
		//debugger;
		
		var tovbycode = "<?php echo isset($_GET['tovbycode']) ? $_GET['tovbycode'] : '';?>";
		var tovnazv = "<?php echo isset($_GET['tovnazv']) ? $_GET['tovnazv'] : '';?>";
		
		var user_id = $('#'+product_id).data('user');
		var date = $('#'+product_id).data('date');
		
		if($('.log_'+product_id).css('display') != 'none'){
			
			$('#log_'+product_id).html('');
			$('.log_'+product_id).hide();
			
		}else{
			
			$.ajax({
			url: '/orders/nomenklatur/log/ajax-log-product-list.php?uadm_id=' + user_id + '&date=' + date + '&tovbycode=' + tovbycode + '&tovnazv=' + tovnazv,
			method: "POST",
			dataType: 'text',
			success: function(json) {
				
				$('#log_'+product_id).html(json);
				$('.log_'+product_id).show();
				console.log(json);				
			}
			});
			
		}
			
	});
	
</script>	