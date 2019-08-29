<?php 

function has_access($IDpouzivatel,$pPravo) {
	$IDpouzivatel 	= (int)$IDpouzivatel;
	$pPravo 		= (int)$pPravo;
	return (mysql_result(mysql_query("SELECT COUNT(`IDpouzivatel`) FROM `pouzivatelia` WHERE `IDpouzivatel` = $IDpouzivatel AND `pPravo` = '$pPravo'"), 0) == 1) ? true : false;
}

function update_user($IDpouzivatel,$update_data) {
	$update = array();
	array_walk($update_data, 'array_sanitize');
	
	foreach($update_data as $field=>$data) {
		$update[] = '`' . $field . '` = \'' . $data . '\'';
	}
	
	mysql_query("UPDATE `pouzivatelia` SET " . implode(', ', $update) . " WHERE `IDpouzivatel` = '$IDpouzivatel'");
}

function update_student($update_data,$id_studenta) {
	$update = array();
	array_walk($update_data, 'array_sanitize');
	
	foreach($update_data as $field=>$data) {
		$update[] = '`' . $field . '` = \'' . $data . '\'';
	}
	
	mysql_query("UPDATE `student` SET " . implode(', ', $update) . " WHERE `id_studenta` = '$id_studenta'");
}

function update_ucitel($update_data,$id_ucitela) {
	$update = array();
	array_walk($update_data, 'array_sanitize');
	
	foreach($update_data as $field=>$data) {
		$update[] = '`' . $field . '` = \'' . $data . '\'';
	}
	
	mysql_query("UPDATE `ucitel` SET " . implode(', ', $update) . " WHERE `id_ucitela` = '$id_ucitela'");
}

function register_user($register_data) {
	array_walk($register_data, 'array_sanitize');
	$register_data['pHeslo'] = md5($register_data['pHeslo']);
	
	$fields = '`' . implode('`, `', array_keys($register_data)) . '`';
	$data = '\'' . implode('\', \'', $register_data) . '\'';
	
	mysql_query("INSERT INTO `pouzivatelia` ($fields) VALUES ($data)");
}

function register_ucitel($register_data) {
	array_walk($register_data, 'array_sanitize');
		
	$fields = '`' . implode('`, `', array_keys($register_data)) . '`';
	$data = '\'' . implode('\', \'', $register_data) . '\'';
	
	mysql_query("INSERT INTO `ucitel` ($fields) VALUES ($data)");
}

function register_student($register_data) {
	array_walk($register_data, 'array_sanitize');
		
	$fields = '`' . implode('`, `', array_keys($register_data)) . '`';
	$data = '\'' . implode('\', \'', $register_data) . '\'';
	
	mysql_query("INSERT INTO `student` ($fields) VALUES ($data)");
}

function ucitel_data($id_user) {
	
	$id_user = (int)$id_user;
	$data = mysql_fetch_assoc(mysql_query(" SELECT P.Meno, P.Priezvisko, P.d_narodenia, P.pPravo, U.id_ucitela, U.je_triedny, U.id_triedy, U.mesto, U.tel_c, U.ulica_cd, U.email, U.pred1, U.pred2, U.pred3, U.pred4 FROM pouzivatelia P, ucitel U WHERE P.IDpouzivatel = U.id_ucitela AND P.IDpouzivatel = '$id_user' ORDER BY P.Priezvisko "));
	
	return $data;
}

function student_data($id_user) {
	
	$id_user = (int)$id_user;
	$data = mysql_fetch_assoc(mysql_query(" SELECT P.Meno, P.Priezvisko, P.d_narodenia, P.pPravo, S.id_studenta, S.rocnik, S.trieda, S.zz_info, S.mesto, S.ulica_cd, S.tel_c, S.email FROM pouzivatelia P, student S WHERE P.IDpouzivatel = S.id_studenta AND P.IDpouzivatel = '$id_user' ORDER BY P.Priezvisko "));
	
	return $data;
}

function user_data($id_user) {
	$data = array();
	$id_user = (int)$id_user;
	
	$func_num_args = func_num_args();
	$func_get_args = func_get_args();
	
	if ($func_num_args > 1) {
		unset($func_get_args[0]);
		
		$fields = '`' . implode('`, `', $func_get_args) . '`';
		$data = mysql_fetch_assoc(mysql_query("SELECT $fields FROM `pouzivatelia` WHERE `IDpouzivatel` = '$id_user' "));
		
		return $data;
	}
}

function logged_in(){
	return (isset($_SESSION['IDpouzivatel'])) ? true : false;
}
function je_ucitel($id_user) {
	$id_user = sanitize($id_user);
	return (mysql_result(mysql_query("SELECT COUNT(id_ucitela) FROM `ucitel` WHERE id_ucitela = '$id_user'"), 0) == 1) ? true : false;
}

function user_exists($pMeno) {
	$pMeno = sanitize($pMeno);
	return (mysql_result(mysql_query("SELECT COUNT(IDpouzivatel) FROM pouzivatelia WHERE pMeno = '$pMeno'"), 0) == 1) ? true : false;
}

function user_id_from_username($pMeno) {
	$pMeno = sanitize($pMeno);
	return mysql_result(mysql_query("SELECT IDpouzivatel FROM pouzivatelia WHERE pMeno = '$pMeno'"), 0, 'IDpouzivatel');
}

function profil_pravo_from_id($user_id) {
	$user_id = sanitize($user_id);
	return mysql_result(mysql_query("SELECT `pPravo` FROM `pouzivatelia` WHERE IDpouzivatel = '$user_id'"), 0, 'pPravo');
}

function login($pMeno, $pHeslo) {
	$IDpouzivatel = user_id_from_username($pMeno);
	
	$pMeno = sanitize($pMeno);
	$pHeslo = md5($pHeslo);
	
	return (mysql_result(mysql_query("SELECT COUNT(IDpouzivatel) FROM pouzivatelia WHERE pMeno = '$pMeno' AND pHeslo = '$pHeslo'"), 0) == 1) ? $IDpouzivatel : false;
}
?>