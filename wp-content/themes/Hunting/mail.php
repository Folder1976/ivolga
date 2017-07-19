<?php

$method = $_SERVER['REQUEST_METHOD'];

//Script Foreach
$c = true;
if ( $method === 'POST' ) {
	$project_name = trim($_POST["project_name"]);
	$admin_email  = "support@huntingworld.com";
	$form_subject = trim($_POST["form_subject"]);

$tour_name = trim($_POST["tour_name"]);
$tour_link = trim($_POST["tour_link"]);

$name_client = trim($_POST["name_client"]);
$phone_client = trim($_POST["phone_client"]);
$email_client = trim($_POST["email_client"]);

$name_contact = trim($_POST["name_contact"]);
$phone_contact = trim($_POST["phone_contact"]);
$email_contact = trim($_POST["email_contact"]);
$address_contact = trim($_POST["address_contact"]);

$date_tour = trim($_POST["date_tour"]);
$summa_tour = trim($_POST["summa_tour"]);
$summa_tour_eger = trim($_POST["summa_tour_eger"]);
$summa_tour_avto = trim($_POST["summa_tour_avto"]);

$inclusion = trim($_POST["inclusion"]);
$yslov_money = trim($_POST["tour_yslov_money"]);

$ivolga = "ivolga";
$themes_admin = "Новое бронирование тура";
$themes_contact = "Новое бронирование тура на Ivolga";
$themes_client = "Бронирование охоты";

$tour_hunters = trim($_POST["tour_hunters"]);
$tour_gost = trim($_POST["tour_gost"]);
$tour_trof = trim($_POST["tour_trof"]);
}


$message_admin = "Забронирован тур <a href='$tour_link'>$tour_name</a><br>
<h4>Контакты охотхозяйства</h4>
Адрес: $address_contact<br>
Представитель: $name_contact<br>
Телефон: <a href='tel:$phone_contact'>$phone_contact</a> <br>
Email: <a href='mailto:$email_contact'>$email_contact</a> <br>
<h4>Контакты охотника</h4>
Имя: $name_client<br>
Телефон: <a href='tel:$phone_contact'>$phone_client</a> <br>
Email: <a href='mailto:$email_contact'>$email_client</a>
<h4>Детали бронирования</h4>
Период охоты : $date_tour <br>
$tour_hunters<br>
$tour_gost<br>
$tour_trof<br>
Аренда транспорта: $summa_tour_avto<br>
Егерское обслуживание: $summa_tour_eger <br>
Итого к оплате: <b>$summa_tour</b><br>
<h4>Условия оплаты</h4>$yslov_money
<h4>В тур включено</h4>$inclusion";

$message_client = "<h4>Добрый день.</h4>Спасибо за бронирование тура <a href='$tour_link'>$tour_name</a><br>
Мы выслали охотхозяйству ваши контакты. Теперь вы можете общаться напрямую. <br><br>Свяжитесь с охотхозяйство, обсудите детали тура и способ оплаты. Обратите внимание на срок внесения депозита. <br>
<h4>Контакты охотхозяйства</h4>
Адрес: $address_contact<br>
Представитель: $name_contact<br>
Телефон: <a href='tel:$phone_contact'>$phone_contact</a> <br>
Email: <a href='mailto:$email_contact'>$email_contact</a> <br>
<h4>Ваша охота</h4>
Период охоты : $date_tour <br>
$tour_hunters<br>
$tour_gost<br>
$tour_trof<br>
Аренда транспорта: $summa_tour_avto<br>
Егерское обслуживание: $summa_tour_eger <br>
Итого к оплате: $summa_tour
<h4>Условия оплаты</h4>$yslov_money
<h4>В тур включено</h4>$inclusion
<h4>Есть вопросы?</h4><a href='http://ivolga.io/contact/'>Свяжитесь с нами.</a>";

$message_contact = "<h4>Добрый день.</h4>У вас забронирован тур <a href='$tour_link'>$tour_name</a><br>
Мы выслали охотнику ваши контакты. Теперь вы можете общаться напрямую.<br><br>
Свяжитесь с охотником, обсудите детали тура и способ оплаты. <br>
<h4>Контакты охотника</h4>
Имя: $name_client<br>
Телефон: <a href='tel:$phone_contact'>$phone_client</a> <br>
Email: <a href='mailto:$email_contact'>$email_client</a>
<h4>Детали бронирования</h4>
Период охоты : $date_tour <br>
$tour_hunters<br>
$tour_gost<br>
$tour_trof<br>
Аренда транспорта: $summa_tour_avto<br>
Егерское обслуживание: $summa_tour_eger <br>
Итого к оплате: $summa_tour<br>
<h4>Условия оплаты</h4>$yslov_money
<h4>В тур включено</h4>$inclusion
<h4>Есть вопросы?</h4><a href='http://ivolga.io/contact/'>Свяжитесь с нами.</a>";

function adopt($text) {
	return '=?UTF-8?B?'.Base64_encode($text).'?=';
}

$headers_admin = "MIME-Version: 1.0" . PHP_EOL .
"Content-Type: text/html; charset=utf-8" . PHP_EOL .
'From: '.adopt($project_name).' <'.$ivolga.'>' . PHP_EOL. 
'Reply-To: '.$ivolga.'' . PHP_EOL;


$headers_contact = "MIME-Version: 1.0" . PHP_EOL .
"Content-Type: text/html; charset=utf-8" . PHP_EOL .
'From: '.adopt($project_name).' <'.$admin_email.'>' . PHP_EOL .
'Reply-To: '.$email_client.'' . PHP_EOL;

$headers_client = "MIME-Version: 1.0" . PHP_EOL .
"Content-Type: text/html; charset=utf-8" . PHP_EOL .
'From: '.adopt($project_name).' <'.$admin_email.'>' . PHP_EOL .
'Reply-To: '.$email_contact.'' . PHP_EOL;

//die($admin_email.' '.$email_client.' '.$email_contact);

$admin_email = $email_client = $email_contact = 'folder.list@gmail.com';


mail($admin_email, adopt($themes_admin), $message_admin, $headers_admin );
mail($email_client, adopt($themes_client), $message_client, $headers_client );
mail($email_contact, adopt($themes_contact), $message_contact, $headers_contact );
