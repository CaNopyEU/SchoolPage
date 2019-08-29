<?php 
include'core/init.php';
protect_page();
admin_protect();
include'includes/overall/header.php';
?>
<h2 align="center">Nastavenia stranky</h2>
<div class="w3-responsive w3-card-4">

<?php 
if (isset($_GET['success']) && empty($_GET['success'])) {
	echo 'Informacie boli uspesne aktualizovane!';
} else if (empty($_GET) === true) {

	$nazov = mysql_fetch_array(mysql_query("SELECT * FROM nazov WHERE id_nazvu='1'"));
	$nazov_zmena = $nazov['id_nazvu'];
	
	if (empty($_POST) === false && empty($errors) === true) {
		$update_data = array(
			'nazov_c' 		=> $_POST['nazov_c'],
			'nazov_s' 		=> $_POST['nazov_s'],
			'fb_page' 		=> $_POST['fb_page'],
			
			);
		
		update_name($nazov_zmena, $update_data);
		header('Location: nast_stranky.php?page2');
		exit();
}		
	?> 
<form action="#"  method="post">     
  <table align="left" class="w3-table w3-striped w3-bordered">
    <tr>
      	<td>Zadajte cely nazov skoly: </td>
      	<td><input type="text" name="nazov_c" value="<?php echo $nazov['nazov_c'] ?>" size="25"/></td>
    </tr>
    <tr>
      	<td>Zadajte skrateny nazov skoly: </td>
      	<td><input type="text" name="nazov_s" value="<?php echo $nazov['nazov_s'] ?>" size="25" /></td>
    </tr>
	<tr>
    	<td>Zadajte URL adresu FB stranky skoly</td>
     	<td><input type="text" name="fb_page" value="<?php echo $nazov['fb_page'] ?>" size="25" /></td>
    </tr>

	<tr>
		<td><input type="submit" name="submit" value="Pokracovat" /></td>
	</tr>
  </table>
</form> <?php
	
} else if (isset($_GET['page2']) && empty($_GET['page2'])) {
	
	$nazov = mysql_fetch_array(mysql_query("SELECT * FROM nazov WHERE id_nazvu='2'"));
	$nazov_zmena = $nazov['id_nazvu'];
	
	if (empty($_POST) === false && empty($errors) === true) {
		$update_data = array(
			'nazov_c' 		=> $_POST['nazov_c'],
			'nazov_s' 		=> $_POST['nazov_s'],
			'fb_page' 		=> $_POST['fb_page'],
			'os_adm'		=> $_POST['os_adm'],
			);
		
		update_name($nazov_zmena, $update_data);
		header('Location: nast_stranky.php?page3');
		exit();
}		
	?>
	
<h3> Kontaktne udaje (1/2) </h3>
<form action="#"  method="post">     
  <table align="left" class="w3-table w3-striped w3-bordered">
    <tr>
      	<td>Adresa Skoly: </td>
      	<td><input type="text" name="nazov_c" value="<?php echo $nazov['nazov_c'] ?>" size="25"/></td>
    </tr>
    <tr>
      	<td>tel cislo mobilne: </td>
      	<td><input type="text" name="nazov_s" value="<?php echo $nazov['nazov_s'] ?>" size="25" /></td>
    </tr>
	<tr>
    	<td>pevna linka:</td>
     	<td><input type="text" name="fb_page" value="<?php echo $nazov['fb_page'] ?>" size="25" /></td>
    </tr>
	<tr>
    	<td>tel. cislo jedalne:</td>
     	<td><input type="text" name="os_adm" value="<?php echo $nazov['os_adm'] ?>" size="25" /></td>
    </tr>
	<tr>
		<td><input type="submit" name="submit" value="Pokracovat" /></td>
	</tr>
  </table>
</form>
	<?php
} else if (isset($_GET['page3']) && empty($_GET['page3'])) {
	
	$nazov = mysql_fetch_array(mysql_query("SELECT * FROM nazov WHERE id_nazvu='3'"));
	$nazov_zmena = $nazov['id_nazvu'];
	
	if (empty($_POST) === false && empty($errors) === true) {
		$update_data = array(
			'nazov_c' 		=> $_POST['nazov_c'],
			);
		
		update_name($nazov_zmena, $update_data);
		header('Location: nast_stranky.php?success');
		exit();
}
?>
<h3> Kontaktne udaje (2/2) </h3>
<form action="#"  method="post">     
  <table align="left" class="w3-table w3-striped w3-bordered">
    <tr>
      	<td>Email skoly: </td>
      	<td><input type="text" name="nazov_c" value="<?php echo $nazov['nazov_c'] ?>" size="25"/></td>
    </tr>
    <tr>
		<td><input type="submit" name="submit" value="Dokoncit" /></td>
	</tr>
  </table>
</form>
<?php	
	
	} else if (empty ($errors) === false) {
		echo output_errors($errors);
	}

include'includes/overall/footer.php'; ?>