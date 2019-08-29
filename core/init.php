<?php 
session_start();
//error_reporting(0);

require 'database/connect.php';
require 'functions/general.php';
require 'functions/content.php';
require 'functions/ziacka.php';
require 'functions/users.php';

$nazvy		 = nazov('1');
$domov		 = vypis_nazov('26');
$dokument	 = vypis_nazov('14');
$galeria	 = vypis_nazov('13');
$historia	 = vypis_nazov('12');
$volny_cas	 = vypis_nazov('82');
$rozvrh		 = vypis_nazov('16');
$jlistok	 = vypis_nazov('17');

if (logged_in() === true){ 
	$session_user_id = $_SESSION['IDpouzivatel'];
	$user_data = user_data($session_user_id, 'IDpouzivatel', 'pMeno', 'pHeslo', 'Meno', 'Priezvisko','d_narodenia','pPravo');
	if (has_access($session_user_id, 2) === true) {
		$ucitel_info = ucitel_data($session_user_id);
		$pred1 = $ucitel_info['pred1'];
		$pred2 = $ucitel_info['pred2'];
		$pred3 = $ucitel_info['pred3'];
		$pred4 = $ucitel_info['pred4'];
	}
	if (has_access($session_user_id, 3) === true) {
		$student_info = student_data($session_user_id);
		$id_student = $session_user_id;
	}
}

$errors = array();
?>