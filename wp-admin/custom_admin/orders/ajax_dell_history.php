<?php
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	header("Content-Type: text/html; charset=UTF-8");
	require_once("../../core.php");
	
	$aglnk = mysqli_connect(MAGAZSQLHOST,  MAGAZSQLUSER,  MAGAZSQLPASS, MAGAZSQLBASE) or die(mysqli_error($aglnk)."<hr>Сервер  базы данных магазина недоступен или неверный логин-пароль");
	mysqli_query($aglnk, 'SET NAMES utf8');
	
	
	if(!isset($_POST['product_id']) AND !isset($_GET['product_id'])){
		
		die();
	}
	
	
	$product_id = 0;
	
	if(isset($_POST['product_id'])) $product_id = $_POST['product_id'];
	if(isset($_GET['product_id'])) $product_id = $_GET['product_id'];
	
	include('../../models/Logs.php');
	$Logs = new Logs($aglnk);
	

	$res = $Logs->dellProductHistory($product_id);
	
	/*
	foreach($res as $row){
		
		
		
	}
	*/
?>