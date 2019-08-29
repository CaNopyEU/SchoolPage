<?php 
include'core/init.php';
protect_page();
admin_protect();
include'includes/overall/header.php';

if (isset($_GET['success']) === true && empty($_GET['success'])) {
	echo 'Obsah bol vymazany!' ;
} else {

	if (isset($_GET['del'])){
			$id_cont = $_GET['del'];
			del_gallery($id_cont); 
			
			header('Location: zmazat_galeriu.php?success');
			exit();
		} 
		else if (empty($errors) === false) {
		echo output_errors($errors);
	}
}
include'includes/overall/footer.php'; ?>