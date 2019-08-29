<?php 
include'core/init.php';
protect_page();
admin_protect();
include'includes/overall/header.php'; 

if (empty($_POST) === false) {
	$required_fields = array('pMeno', 'pHeslo', 'over_pHeslo', 'Meno', 'Priezvisko', 'd_narodenia',);
	foreach ($_POST as $key=>$value){
		if (empty($value) && in_array($key, $required_fields) === true) {
			$errors[] = 'Vsetky udaje so znakom * su potrebne vyplnit';
			break 1;
		}
	}
	if (empty($errors) === true) {
		if (user_exists($_POST['pMeno']) === true ) {
			$errors[] = 'Pouzivatelske meno \'' . $_POST['pMeno'] . '\' uz bolo pouzite.';
		}
		if (preg_match("/\\s/", $_POST['pMeno']) == true) {
			$errors[] = 'Prihlasovacie meno nesmie obsahovat ziadne medzery.';
		}	
		if (strlen($_POST['pHeslo']) < 5) {
			$errors[] = 'Heslo musi byt dlhsie ako 5 znakov.';
		}
		if ($_POST['pHeslo'] !== $_POST['over_pHeslo']) {
			$errors[] = 'Heslo sa nezhoduje.';
		}
		
	}
}
?>

<h1> Registracia noveho pouzivatela</h1>

<?php 
if (isset($_GET['success']) && empty($_GET['success'])) {
	echo 'Registracia prebehla uspesne!';
} else {
	if (empty($_POST) === false && empty($errors) === true) {
		$register_data = array(
			'pMeno' 		=> $_POST['pMeno'],
			'pHeslo' 		=> $_POST['pHeslo'],
			'Meno' 			=> $_POST['Meno'],
			'Priezvisko' 	=> $_POST['Priezvisko'],
			'd_narodenia'	=> $_POST['d_narodenia'],
			'pPravo' 		=> $_POST['pPravo'],
		);

		register_user($register_data);
		header('Location: registracia.php?success');
		exit();
	
	} else if (empty ($errors) === false) {
		echo output_errors($errors);
	}
?>

<br><br>
<form action="#"  method="post">     
  <table align="left">
    <tr>
      <td>Prihlasovacie meno*: </td>
      <td><input type="text" name="pMeno" value="" size="25"/></td>
    </tr>
    <tr>
      <td>Heslo*: </td>
      <td><input type="password" name="pHeslo" value="" size="25"/></td>
    </tr>
    <tr>
      <td>Overenie hesla*: </td>
      <td><input type="password" name="over_pHeslo" value="" size="25" /></td>
    </tr>
	<tr>
      <td>Meno*: </td>
      <td><input type="text" name="Meno" value="" size="25" /></td>
    </tr>
	<tr>
      <td>Priezvisko*: </td>
      <td><input type="text" name="Priezvisko" value="" size="25" /></td>
    </tr>
	<tr>
      <td>Datum narodenia*: </td>
      <td><input type="date"  name="d_narodenia" min="1900-01-01" max="2017-12-21"></td>
    </tr>
	<tr>
      <td>Pouzivatelske pravo*: </td>
	  <td>
	  <select name="pPravo">
    	<option value="3">Student</option>
    	<option value="2">Ucitel</option>
		<option value="1">Admin</option>
  	  </select>
	 </td>
	<tr>
    <td><input type="submit" name="submit" value="Registrovat uzivatela" /></td>
      </tr>
  </table>
</form>


<?php 
}
include'includes/overall/footer.php';
?>