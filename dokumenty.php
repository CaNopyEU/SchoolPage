<?php 
include'core/init.php';
include'includes/overall/header.php';
$dokument = $dokument['nazov_s']; 
?>

<h2><?php echo $dokument ?></h2>
<?php
if (!empty($session_user_id)) {
	if (has_access($session_user_id, 1) === true) {
		if (empty($_POST) === false) {
			$required_fields = array('nadpis');
			foreach ($_POST as $key=>$value){
				if (empty($value) && in_array($key, $required_fields) === true) {
					$errors[] = 'Nazov dokumentu je potrebne vyplnit!';
					break 1;
				}
			}
		}
		if (empty($_POST) === false && empty($errors) === true) {
			
			$nadpis = $_POST['nadpis'];
			$register_data = array(
				'nazov_s'		=> $dokument,
				'nadpis' 		=> $_POST['nadpis'],
				'text' 			=> $_POST['text'],
				);
				
				add_content($register_data);
				$id_cont = cont_id_from_contname($nadpis);
				
				if (isset($_FILES['file']) === true) {
					if (empty($_FILES['file']['name']) === true) {
						echo 'Prosim vyberte subor!';
						} else {
								$file = $_FILES['file'];
								
													
								$file_name 	= $file['name'];
								$file_temp 	= $file['tmp_name'];
								$file_error = $file['error'];
								
								$file_extn = strtolower(end(explode('.', $file_name)));
								
								$allowed = array('pdf');
								
								if (in_array($file_extn, $allowed) === true) {
									if ($file_error === 0){
										
										update_document($file_temp, $file_extn, $id_cont);
										header('Location: dokumenty.php?success');
										exit();
									}
							}
					} 
}
	} else  if (empty ($errors) === false) {
			echo output_errors($errors);
	}
?>
<br />
	<h4>Pridanie dokumentu :</h4>
	<form action="#"  method="post" enctype="multipart/form-data">    
  	<table align="left" style="width:100%">
    	<tr>
    	  <td>Nazov dokumentu:</td>
    	  <td><input type="text" name="nadpis" value="" size="25"/></td>
    	</tr>
		<tr>
    	  <td>Dodatocny popis dokumentu:</td>
    	  <td><input type="text" name="text" value="" size="25"/></td>
    	</tr>
		<tr>
    	  <td><input type="file" name="file" value="" size="25"/></td>
    	  <td><input type="submit" name="submit" value="Pridat dokument" /></td>
      	</tr>
  	</table>
	</form>


<?php 	
	} 
}
?>

<table align="left">
<tr></tr>
<?php
 $sql = mysql_query("SELECT * FROM `obsah` WHERE `nazov_s` = '$dokument' AND `doc_c` IS NOT NULL AND `nadpis` IS NOT NULL");
	while($hodnota=mysql_fetch_array($sql)) {
	?>
	<tr>
		<td><a class="w3-left" href="<?php echo $hodnota['doc_c'] ?>" ><b><?php echo $hodnota['nadpis']?></b></a></td>
		<td><p><?php echo $hodnota['text'] ?></p></td>
		<?php 
		if (!empty($session_user_id)) {
			if (has_access($session_user_id, 1) === true) { ?>
		<td><a href="zmazat_cont.php?del=<?php echo $hodnota['id_cont']?>" onClick="return confirm('Ste si istý, že chcete vymazat daný obsah?');">Zmazat dokument</a></td> 
<?php 
	} 
}
?>
	</tr>
	<?php }?>
</table>
<?php include'includes/overall/footer.php'; ?>