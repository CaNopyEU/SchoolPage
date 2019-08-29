<?php
function nazov($id_nazvu) {
	$nazov = mysql_fetch_assoc(mysql_query("SELECT * FROM `nazov` WHERE `id_nazvu` = $id_nazvu"));
		
		return $nazov;	
}

function vypis_nazov($id_cont) {
	$nazov_s =  mysql_fetch_assoc(mysql_query("SELECT `nazov_s` FROM `obsah` WHERE `id_cont` = $id_cont"));
	
		return $nazov_s;
}
function logged_in_redirect() {
	if (logged_in() === true ) {
		header('Location: index.php');	
		exit();
	}
}

function protect_page() {
	if (logged_in() === false) {
		header('Location: ochrana.php');
		exit();	
	}
}

function admin_protect() {
	global $user_data;
	if (has_access($user_data['IDpouzivatel'], 1) === false) {
		header('Location: index.php');	
		exit();
	}
}

function array_sanitize(&$item) {
	$item = htmlentities(strip_tags(mysql_real_escape_string($item)));
}

function sanitize($data){
	return htmlentities(strip_tags(mysql_real_escape_string($data)));
}

function output_errors($errors){
	return '<ul><li>' . implode('</li><li>', $errors) . '</li></ul>';
}
?>