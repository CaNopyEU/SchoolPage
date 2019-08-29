<?php

// DELETE 

function del_cont($id_cont) {
	$sql = "DELETE FROM `obsah` WHERE id_cont='$id_cont'";
	$res = mysql_query($sql); 
}

function del_gallery($id_cont) {
	$sql = "DELETE FROM `galeria` WHERE id_gal='$id_cont'";
	$res = mysql_query($sql); 
}

// INSERT
function insert_in_gallery($file_temp,$file_extn,$id_gal) {
	$file_path = 'images/gallery/' . substr(md5(time()), 0, 10) . '.' . $file_extn;
	move_uploaded_file($file_temp, $file_path);
	
	mysql_query("INSERT INTO `obrazky` (`id_gal`, `cesta`) VALUES ('$id_gal', '" . mysql_real_escape_string($file_path) . "')");
}

function add_name($register_data) {
	array_walk($register_data, 'array_sanitize');
		
	$fields = '`' . implode('`, `', array_keys($register_data)) . '`';
	$data = '\'' . implode('\', \'', $register_data) . '\'';
	
	mysql_query("INSERT INTO `nazov` ($fields) VALUES ($data)");
}

function add_content($register_data) {
	array_walk($register_data, 'array_sanitize');
		
	$fields = '`' . implode('`, `', array_keys($register_data)) . '`';
	$data = '\'' . implode('\', \'', $register_data) . '\'';
	
	mysql_query("INSERT INTO `obsah` ($fields) VALUES ($data)");
}

function add_gallery($register_data) {
	array_walk($register_data, 'array_sanitize');
		
	$fields = '`' . implode('`, `', array_keys($register_data)) . '`';
	$data = '\'' . implode('\', \'', $register_data) . '\'';
	
	mysql_query("INSERT INTO `galeria` ($fields) VALUES ($data)");
}

// UPDATE	
function update_rozvrh($file_temp,$file_extn,$id_trieda) {
	$file_path = 'images/rozvrh/' . substr(md5(time()), 0, 10) . '.' . $file_extn;
	move_uploaded_file($file_temp, $file_path);
	mysql_query("UPDATE `trieda` SET `rozvrh_c` = '" . mysql_real_escape_string($file_path) . "' WHERE `id_trieda` = " . (int)$id_trieda);
	
}

function update_image($file_temp,$file_extn,$id_cont) {
	$file_path = 'images/' . substr(md5(time()), 0, 10) . '.' . $file_extn;
	move_uploaded_file($file_temp, $file_path);
	mysql_query("UPDATE `obsah` SET `pic_c` = '" . mysql_real_escape_string($file_path) . "' WHERE `id_cont` = " . (int)$id_cont);
	
}

function update_document($file_temp,$file_extn,$id_cont) {
	$file_path = 'dokumenty/' . substr(md5(time()), 0, 10) . '.' . $file_extn;
	move_uploaded_file($file_temp, $file_path);
	mysql_query("UPDATE `obsah` SET `doc_c` = '" . mysql_real_escape_string($file_path) . "' WHERE `id_cont` = " . (int)$id_cont);
	
}

function update_content($id_cont,$update_data) {
	$update = array();
	array_walk($update_data, 'array_sanitize');
	
	foreach($update_data as $field=>$data) {
		$update[] = '`' . $field . '` = \'' . $data . '\'';
	}
	
	mysql_query("UPDATE `obsah` SET " . implode(', ', $update) . " WHERE `id_cont` = '$id_cont'");
}

function update_name($id_nazvu,$update_data) {
	$update = array();
	array_walk($update_data, 'array_sanitize');
	
	foreach($update_data as $field=>$data) {
		$update[] = '`' . $field . '` = \'' . $data . '\'';
	}
	
	mysql_query("UPDATE `nazov` SET " . implode(', ', $update) . " WHERE `id_nazvu` = '$id_nazvu'");
}

// OTHERS


function trieda_id_from_rocnik($rocnik, $trieda) {
	$rocnik = sanitize($rocnik);
	$trieda = sanitize($trieda);
	return mysql_result(mysql_query("SELECT `id_trieda` FROM `trieda` WHERE `rocnik` = '$rocnik' AND `trieda` = '$trieda'"), 0, 'id_trieda');
}

function cont_id_from_contname($nadpis) {
	$nadpis = sanitize($nadpis);
	return mysql_result(mysql_query("SELECT `id_cont` FROM `obsah` WHERE nadpis = '$nadpis'"), 0, 'id_cont');
}

function content_data($id_cont) {
	$data = array();
	$id_cont = (int)$id_cont;
	
	$func_num_args = func_num_args();
	$func_get_args = func_get_args();
	
	if ($func_num_args > 1) {
		unset($func_get_args[0]);
		
		$fields = '`' . implode('`, `', $func_get_args) . '`';
		$data = mysql_fetch_assoc(mysql_query("SELECT $fields FROM `obsah` WHERE `id_cont` = '$id_cont'"));
		
		return $data;
	}
}

?>