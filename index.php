<?php 
include'core/init.php';
include'includes/overall/header.php';
$domov = $domov['nazov_s'];
?>
<h2><?php echo $domov ?></h2>
<?php
if (!empty($session_user_id)) {
	if (isset($_GET['successwo']) && empty($_GET['successwo'])) {
		echo 'Aktualita bez obrazku bola pridana!';
	} else if (isset($_GET['successw']) && empty($_GET['successw'])) {
		echo 'Aktualita s obrazkom bola pridana!';
	} else if (!empty($session_user_id)) {
		if (has_access($session_user_id, 1) === true) {
			if (empty($_POST) === false) {
				$required_fields = array('nadpis','text','date');
				foreach ($_POST as $key=>$value){
					if (empty($value) && in_array($key, $required_fields) === true) {
						$errors[] = 'Nazov aktuality, text a datum je potrebne vyplnit!';
						break 1;
					}
				}
			}
			if (empty($_POST) === false && empty($errors) === true) {
				
				$nadpis = $_POST['nadpis'];
				$register_data = array(
					'nazov_s'		=> 'domov',
					'nadpis' 		=> $_POST['nadpis'],
					'text' 			=> $_POST['text'],
					'date'			=> $_POST['date'],
					);
					
					add_content($register_data);
					$id_cont = cont_id_from_contname($nadpis);
					
					if (isset($_FILES['file']) === true) {
						if (!empty($_FILES['file']['name']) === true) {
						
									$file = $_FILES['file'];
																						
									$file_name 	= $file['name'];
									$file_temp 	= $file['tmp_name'];
									$file_error = $file['error'];
									
									$file_extn = strtolower(end(explode('.', $file_name)));
									
									$allowed = array('jpg', 'jpeg', 'gif', 'png');
									
									if (in_array($file_extn, $allowed) === true) {
										if ($file_error === 0){
											
											update_image($file_temp, $file_extn, $id_cont);
											header('Location: index.php?successw');
											exit();
										}
								}
						}
				 
		}	
					
					
					header('Location: index.php?successwo');
					exit();
		} else  if (empty ($errors) === false) {
				echo output_errors($errors);
		}
	?>

<br />
	<h4>Pridanie aktuality :</h4>
	<form action="#"  method="post" enctype="multipart/form-data">    
  	<table align="left" style="width:100%">
    	<tr>
    	  <td>Nazov aktuality:</td>
    	  <td><input type="text" name="nadpis" value="" size="25"/></td>
    	</tr>
		<tr>
    	  <td>Text k aktualite:</td>
    	  <td><input type="text" name="text" value="" size="25"/></td>
    	</tr>
		<tr>
		  <td>Pripadny obrazok:</td>
    	  <td><input type="file" name="file" value="" size="25"/></td>
    	</tr>
		<tr>
    	  <td>Datum aktuality: </td>
  	  	  <td><input type="date"  name="date" min="2018-01-01" max="2100-12-31"></td>
  	    </tr>
		<tr>
    	  <td><input type="submit" name="submit" value="Pridat aktualitu" /></td>
      	</tr>
  	</table>
	</form>

<br /><br /><br  />
<?php 	
	} 
} else if (has_access($session_user_id, 2) === true) {
		echo 'Toto vidi len a iba ucitel!';
	}

}
    
$sql = mysql_query("SELECT * FROM `obsah` WHERE `nazov_s`= 'Domov' ORDER BY id_cont DESC");
	while ($hodnota=mysql_fetch_array($sql)) { ?>
	
	<table style="width:100%" class="w3-table  w3-bordered w3-card-4">
		<tr><td><h4> <?php echo $hodnota['nadpis']?> </h4></td></tr>
		<?php if ($hodnota["pic_c"]>"NULL") { ?>
		<tr><td width="40%" class="w3-left"><p><?php echo $hodnota['text']?></p> </td>	
		<td width="20%" class="w3-left"><img src="<?php echo $hodnota["pic_c"]; ?>" width="350px" alt="" /></td></tr>
		<?php } else {?>
		<tr><td width="100%" class="w3-left"><p><?php echo $hodnota['text']?></p> </td>	
		<?php } ?>
		</tr><tr><td><p class="w3-left"> Pridané dňa <?php echo $hodnota['date']; ?></p></td>
 		</tr>
		<?php 
		if (!empty($session_user_id)) {
			if (has_access($session_user_id, 1) === true) { ?>
		<td><a href="zmazat_cont.php?del=<?php echo $hodnota['id_cont']?>" onClick="return confirm('Ste si istý, že chcete vymazat daný obsah?');">Zmazat clanok.</a></td> 
<?php 
		}
	} echo '</table><br>';
}
?> 

<?php
include'includes/overall/footer.php'; ?>