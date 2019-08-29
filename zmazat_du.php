<?php 
include'core/init.php';
protect_page();
admin_protect();
include'includes/overall/header.php';

if (isset($_GET['success']) === true && empty($_GET['success'])) {
	echo 'Obsah bol vymazany!' ;
} else {

	if (isset($_GET['del'])){
			$id_du = $_GET['del'];
			del_du($id_du); 
			
			header('Location: zmazat_du.php?success');
			exit();
		} 
		else if (empty($errors) === false) {
		echo output_errors($errors);
	}
}
include'includes/overall/footer.php'; ?>