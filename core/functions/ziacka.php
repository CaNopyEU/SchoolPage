<?php 

function ziacka_data($id_user) {
	
	$id_user = (int)$id_user;
	$data = mysql_query(" SELECT P.Meno, P.Priezvisko, P.d_narodenia, P.pPravo, S.id_studenta, S.rocnik, S.trieda, Z.id_znamky, Z.id_predmet, Z.znamka  FROM pouzivatelia P, student S, znamky Z WHERE P.IDpouzivatel = S.id_studenta AND S.id_studenta = Z.id_student AND Z.id_student = '$id_user'  ");
	
	return $data;
}
function zapisat_znamku($register_data) {
	array_walk($register_data, 'array_sanitize');
		
	$fields = '`' . implode('`, `', array_keys($register_data)) . '`';
	$data = '\'' . implode('\', \'', $register_data) . '\'';
	
	mysql_query("INSERT INTO `znamky` ($fields) VALUES ($data)");
}

function zapisat_du($register_data) {
	array_walk($register_data, 'array_sanitize');
		
	$fields = '`' . implode('`, `', array_keys($register_data)) . '`';
	$data = '\'' . implode('\', \'', $register_data) . '\'';
	
	mysql_query("INSERT INTO `domaca_uloha` ($fields) VALUES ($data)");
}


function pridat_predmet_pre_triedu($update_data, $id_triedy) {
	$id_triedy = (int)$id_triedy;
	$update = array();
	array_walk($update_data, 'array_sanitize');
	
	foreach($update_data as $field=>$data) {
		$update[] = '`' . $field . '` = \'' . $data . '\'';
	}
	
	mysql_query("UPDATE `trieda` SET " . implode(', ', $update) . " WHERE `id_trieda` = '$id_triedy'");
}

function pridat_predmet($register_data) {
	array_walk($register_data, 'array_sanitize');
		
	$fields = '`' . implode('`, `', array_keys($register_data)) . '`';
	$data = '\'' . implode('\', \'', $register_data) . '\'';
	
	mysql_query("INSERT INTO `predmet` ($fields) VALUES ($data)");
}

function znamka_from_predmet_student($id_predmet,$id_studenta) {
	$id_studenta = sanitize($id_studenta);
	$id_predmet = sanitize($id_predmet);
	return mysql_query("SELECT `znamka` FROM `znamky` WHERE `id_predmet`='$id_predmet' AND `id_student`='$id_studenta'");
	
}
function predmet_from_id($id_predmet) {
	$id_predmet = sanitize($id_predmet);
	return mysql_result(mysql_query("SELECT `predmet` FROM `predmet` WHERE `id_predmet`='$id_predmet'"), 0, 'predmet');
	
}

function odobrat_predmet($id_predmet) {
	$sql = "DELETE FROM `predmet` WHERE id_predmet='$id_predmet'";
	$res = mysql_query($sql); 
}
function predmety_z_id_triedy($id_triedy) {
	$id_triedy = (int)$id_triedy;
	$data = mysql_fetch_assoc(mysql_query("SELECT `pred1`,`pred2`,`pred3`,`pred4`,`pred5`,`pred6`,`pred7`,`pred8`,`pred9`,`pred10` FROM `trieda` WHERE `id_trieda` ='$id_triedy'"));
	
	return $data;
}

function id_trieda_from_r_t($rocnik, $trieda){

	$rocnik = sanitize($rocnik);
	$trieda = sanitize($trieda);
	return mysql_result(mysql_query("SELECT `id_trieda` FROM `trieda` WHERE `rocnik` = '$rocnik' AND `trieda` = '$trieda'"), 0, 'id_trieda');
}

function r_t_from_id_trieda($id_trieda) {

	$id_trieda = sanitize($id_trieda);
	
	$data = mysql_fetch_assoc(mysql_query("SELECT `trieda`,`rocnik` FROM `trieda` WHERE `id_trieda`='$id_trieda'"));
	
	return $data;
}

function del_du($id_du) {
	$sql = "DELETE FROM `domaca_uloha` WHERE id_du='$id_du'";
	$res = mysql_query($sql); 
}
?>