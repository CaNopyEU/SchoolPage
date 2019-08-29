<?php 
include'core/init.php';
protect_page();
include'includes/overall/header.php';

if (empty($_POST) === false) {
	$required_fields = array('Meno', 'Priezvisko');
	foreach ($_POST as $key=>$value){
		if (empty($value) && in_array($key, $required_fields) === true) {
			$errors[] = 'Vsetky udaje su potrebne vyplnit';
			break 1;
		}
	}
}

?>

<h1> Nastavenia </h1>
<?php 
if (isset($_GET['success']) === true && empty($_GET['success'])) {
	echo 'Vase informacie boli aktualizovane!';
} else {

	if (empty($_POST) === false && empty($errors) === true) {
		$update_data = array(
			'Meno' 			=> $_POST['Meno'],
			'Priezvisko' 	=> $_POST['Priezvisko'],
		);
	
		update_user($session_user_id, $update_data);
		header('Location: nastavenia.php?success');
		exit();
	
	} else if (empty($errors) === false) {
		echo output_errors($errors);
	}
	?>

	<form class="w3-left" action="" method="post">
	 <table>
	  <tr>
		<td>Meno:</td>
		<td><input type="text" name="Meno" value="<?php echo $user_data['Meno']; ?>"></td>
	  </tr><br  />
	  <tr>
		<td>Priezvisko:</td>
		<td><input type="text" name="Priezvisko" value="<?php echo $user_data['Priezvisko']; ?>"></td>
	  </tr>
	   <tr>
	   	<td>&nbsp;</td>
		<td><input type="submit" value="update"></td>
	  </tr>
	  </table>
	</form>
<?php
}
include'includes/overall/footer.php'; 
?>