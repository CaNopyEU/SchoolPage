<?php 
include'core/init.php';
include'includes/overall/header.php';


 if (empty($_POST) === false && empty($errors) === true) {
		$register_data	= array(
			'predmet'	=> $_POST['predmet'],
						);
			
			pridat_predmet($register_data);
			} else if (empty ($errors) === false) {
		echo output_errors($errors);
	} 	



?>
	<h4>Pridat predmet:</h4>
	<form action="#"  method="post" >     
  	<table align="left" >
    	<tr>
    	  <td>Názov Predmetu : </td>
    	  <td><input type="text" name="predmet" value="" size="25"/></td>
    	</tr>

		<tr>
    	  <td><input type="submit" name="submit" value="Pridat dokument" /></td>
      	</tr>
  	</table>
	</form>
