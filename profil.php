<?php 
include'core/init.php';
include'includes/overall/header.php';
if (!empty($session_user_id)) {
	if (isset($_GET['pMeno']) === true && empty ($_GET['pMeno']) === false) {
		$pMeno = $_GET['pMeno'];
		if (user_exists($pMeno) === true) {
			$profil_id		= user_id_from_username($pMeno);
			$profil_pravo	= profil_pravo_from_id($profil_id);
					
			if ($profil_pravo == 3) {
				include'includes/profil_student.php';		
				} else if ($profil_pravo == 2){
				include'includes/profil_ucitel.php';
				} else if ($pforil_pravo == 1) {
				 echo '<h1>Chyba 404!</h1><br><p>Lutujeme tato stranka neexistuje</p>';
				 }
			} else {
			echo '<h1>Chyba 404!</h1><br><p>Lutujeme tato stranka neexistuje</p>';
			}
	}
} else {
	header('Location: index.php');
	exit();
}

include'includes/overall/footer.php'; ?>