<?php

include 'core/init.php';                                                    
logged_in_redirect();
if (empty($_POST) === false) {
	$pMeno = $_POST["pMeno"];     /* pouzivatelske meno zadane vo formulári pre  prihlasovanie */
	$pHeslo = $_POST["pHeslo"];   /* heslo zadané vo formulári pre prihlasovanie*/
	
	if (user_exists($pMeno) === false) {
		$errors[] = 'pouzivatelske meno sa neda najst';
	} else {
		
		if(strlen($pHeslo) > 32){
			$errors[] = 'Heslo je prilis dlhe';		
		}
		$login = login($pMeno, $pHeslo);
		if ($login === false) {
			$errors[] = 'zadali ste zle meno alebo heslo';
		} else {
			$_SESSION['IDpouzivatel'] = $login;
			header('Location: index.php');
			exit();
		}
	}
} else {
	$errors[] = 'Neobrdazli sa ziadne udaje';
}
include 'includes/overall/header.php';

if (empty($errors) === false) {
?>
	<h2>Pokusili sme sa vas prihlasit lenze...</h2>
<?php
	echo output_errors($errors);
}
include 'includes/overall/footer.php';
?>