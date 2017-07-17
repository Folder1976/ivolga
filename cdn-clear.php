<?php
	
	if(isset($_GET['cdn']) AND $_GET['cdn'] != ''){
		
		$ImgToClear = 'http://'.$_GET['cdn'];
		$RealREQ 	= "http://api.cdnvideo.ru:8888/0/purge1?id=00391_altakarter&type=http&object=".$ImgToClear;
		$RealREQTwo = "http://api.cdnvideo.ru:8888/0/list1?id=00391_altakarter&type=http&object=".$ImgToClear;
		$ToClear = file_get_contents($RealREQ);
		$ToClear1 = file_get_contents($RealREQTwo);
		echo '.';
		
		echo $RealREQ.'<br><pre>'; print_r(var_dump( $ToClear  )); echo '</pre>';
		echo $RealREQTwo.'<br><pre>'; print_r(var_dump( $ToClear1  )); echo '</pre>';
		
		die();
	}

?>

<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 'On');

defined('SHP_VALID') or die('Direct Access is not allowed.');
set_time_limit(1000);
$PUrl = $FSubUrl;

if(!isset($_GET["spsub"])) {
	$SpSub = "";
	echo $FunctName;
}
else {
	$SpSub = $_GET["spsub"];
	echo '<a href="'.$PUrl.'">'.$FunctName.'</a> | ';
}

		echo "
		<h3>Введите адрес картинки которую следует очистить из кэша (вместе с http://)</h3>
		<p><form name=\"sct\" method=post action=\"".$PUrl."&spsub=clearimg\">
		<input type=text name=\"imgtoclear\" class=\"imgtoclear\" size=80 placeholder=\"cdn file url\">&nbsp;<br><br>
		<input type=text name=\"pagetoclear\" class=\"pagetoclear\" size=80 placeholder=\"Урл на страницу\">&nbsp;<br><br>
		<input type=submit value=\"Отправить запрос на очистку\">
		</form>";
		
		$catalog = 'catalog/view/theme/4WB/css/';
		
		if(strpos($SCPUrl, '4wheeledbeast') === false){
			
			if ($handle = opendir($SCPUrl.$catalog)) {
				echo "<br><br>Стили:<br>";
				
				while (false !== ($file = readdir($handle))) {
					if($file != '.' AND $file != '..'){
						echo "<br><a href='javascript:;' class='css' data-id='http://cdn.alta-karter.ru/$catalog$file'>$file</a>";
					}
				}
			
				closedir($handle); 
			}
		}
		?>
		<script>
			$(document).on('click', '.css', function(){
				var url = $(this).data('id');
				$('.imgtoclear').val(url);
			});
		</script>
		<?php

switch($SpSub) {

	case "":

	break;
	
	case "clearimg":
		
		if($_POST['pagetoclear'] != ''){
			
			$page = file_get_contents($_POST['pagetoclear']);
			
			$cdns = explode('://cdn.', $page);
			
			foreach($cdns as $index => $row){
				
				$tmp = explode('"', $row);
				$tmp1 = $tmp[0];
				$tmp2 = explode("'", $tmp1);
				$tmp3 = $tmp2[0];
				
				$cdns[$index] = $tmp3;
				
				if(strpos($tmp3,'/fonts/') !== false){
					unset($cdns[$index]);
				}
				if(strpos($tmp3,'/') === false){
					unset($cdns[$index]);
				}
				
				unset($tmp);
				unset($tmp1);
				unset($tmp2);
				unset($tmp3);
			}
			
			echo "<br><br><b>Найдено ".count($cdns).' файлов для обновления.</b><br>
						<div class="pro" style="color:red;">';
						for($i=1;$i<=count($cdns);$i++)echo '.';
			echo '</div>
						<div class="process" style="color:green;"></div>';
			
			?>
			<script>
				function clear_cdn(url){
				
					$.ajax({
					url: '/orders/nomenklatur/cdn-clear.php?cdn='+url,
					method: "POST",
					dataType: 'text',
					success: function(json) {
						console.log(json);
						$('.process').append(json);
					}
					});
					
				}
			</script>
			<script>
				$(document).ready(function(){
					
			<?php
			$steep = 1000;
			foreach($cdns as $index => $row){
				echo 'setTimeout(function(){clear_cdn("'.$row.'")},'.$steep.');';
				$steep += 5000;
			}
			
			?>});</script><?php
			
		}else{
		
				if (!isset($_POST["imgtoclear"]) || $_POST["imgtoclear"] == "" /*|| substr_count($_POST["imgtoclear"], "http:") == 0*/) {die("<h2>Ошибка не введен урл для очистки!</h2>");}
				
				
				if(strpos($_POST["imgtoclear"], '4wheeledbeast') !== false){
					$ImgToClear = str_replace('cdn.', 'www', $_POST["imgtoclear"]);
				}else{
					$ImgToClear = str_replace('cdn.', '', $_POST["imgtoclear"]);	
				}
				
				$RealREQ 	= "https://api.cdnvideo.ru:8888/0/purge1?id=00391_altakarter&type=http&object=".$ImgToClear;
				$RealREQTwo = "https://api.cdnvideo.ru:8888/0/list1?id=00391_altakarter&type=http&object=".$ImgToClear;
				
				echo '<br>'.$RealREQ.'<br>';
				echo $RealREQTwo.'<br>';
				
				$ToClear = file_get_contents($RealREQ);
				echo "<h3>Try to clear: ".$RealREQ.". Answer:</h3><pre>";
				var_dump($ToClear);
				echo "<hr>";
				$ToClear = file_get_contents($RealREQTwo);
				var_dump($ToClear);
		}
	break;
}
?>