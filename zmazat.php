<?php 
include'core/init.php';
protect_page();
admin_protect();
include'includes/overall/header.php';

if (isset($_GET['success']) === true && empty($_GET['success'])) {
	echo 'Pouzivatel bol vymazany!' ;
} else {

	if (isset($_GET['del'])){
			$user_id = $_GET['del'];
			$sql = "DELETE FROM pouzivatelia WHERE IDpouzivatel='$user_id'";
			$res = mysql_query($sql); 
			
			header('Location: zmazat.php?success');
			exit();
		} 
		else if (empty($errors) === false) {
		echo output_errors($errors);
	}
}
include'includes/overall/footer.php'; ?>