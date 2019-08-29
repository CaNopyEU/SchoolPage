<?php 
include'core/init.php';
protect_page();
admin_protect();
include'includes/overall/header.php';

if (empty($_POST) === false) {
	$required_fields = array('Meno', 'Priezvisko');
	foreach ($_POST as $key=>$value){
		if (empty($value) && in_array($key, $required_fields) === true) {
			$errors[] = 'Vsetky udaje su potrebne vyplnit';
			break 1;
		}
	}
	if (empty($errors) === true) {
		if (preg_match("/\\s/", $_POST['pMeno']) == true) {
			$errors[] = 'Prihlasovacie meno nesmie obsahovat ziadne medzery.';
		}	
		if (strlen($_POST['pHeslo']) < 5) {
			$errors[] = 'Heslo musi byt dlhsie ako 5 znakov.';
		}		
	}
}
?>

<h1> Nastavenia </h1>
<?php 
if (isset($_GET['success']) === true && empty($_GET['success'])) {
	echo 'Informacie boli aktualizovane!';
} else {
	$pouzivatel = mysql_fetch_array(mysql_query("SELECT * FROM pouzivatelia WHERE IDpouzivatel='".$_GET["p_id"]."' "));
	$id_na_zmenu = $pouzivatel['IDpouzivatel'];

	if (empty($_POST) === false && empty($errors) === true) {
		$update_data = array(
			'pMeno' 		=> $_POST['pMeno'],
			'pHeslo' 		=> $_POST['pHeslo'],
			'Meno' 			=> $_POST['Meno'],
			'Priezvisko' 	=> $_POST['Priezvisko'],
			'd_narodenia'	=> $_POST['d_narodenia'],
			'pPravo' 		=> $_POST['pPravo'],
		);

		update_user($id_na_zmenu, $update_data);
		header('Location: nastavenia_all.php?success');
		exit();

	} else if (empty($errors) === false) {
		echo output_errors($errors);
	}
?>
<form class="w3-left" action=""  method="post">     
  <table align="left">
    <tr>
      <td>Prihlasovacie meno*: </td>
      <td><input type="text" name="pMeno" value="<?php echo $pouzivatel['pMeno'] ?>" size="25"/></td>
    </tr>
    <tr>
      <td>Heslo*: </td>
      <td><input type="password" name="pHeslo" value="<?php echo $pouzivatel['pHeslo']; ?>" size="25"/></td>
    </tr>
    <tr>
      <td>Meno*: </td>
      <td><input type="text" name="Meno" value="<?php echo $pouzivatel['Meno']; ?>" size="25" /></td>
    </tr>
	<tr>
      <td>Priezvisko*: </td>
      <td><input type="text" name="Priezvisko" value="<?php echo $pouzivatel['Priezvisko']; ?>" size="25" /></td>
    </tr>
	<tr>
      <td>Datum narodenia*: </td>
      <td><input type="date"  name="d_narodenia" min="1900-01-01" max="2017-12-21" value="<?php echo $pouzivatel['d_narodenia']; ?>"></td>
    </tr>
	<tr>
      <td>Pouzivatelske pravo:(1-admin, 2-ucitel, 3-ziak.) </td>
	  <td><input type="int"  name="pPravo" value="<?php echo $pouzivatel['pPravo']; ?>"></td>
    </tr>
	<tr>
    <td colspan="2"><input type="submit" name="submit" value="Upravit pouzivatela" /></td>
      </tr>
  </table>
</form>

<?php
}
include'includes/overall/footer.php'; 
?>