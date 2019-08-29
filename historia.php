<?php 
include'core/init.php';
include'includes/overall/header.php';
$historia = $historia['nazov_s']; 
?> 
<h2><?php echo $historia ?></h2>

<?php
if (!empty($session_user_id)) {
	if (isset($_GET['successwo']) && empty($_GET['successwo'])) {
		echo 'Clanok bez obrazku bol pridany!';
	} else if (isset($_GET['successw']) && empty($_GET['successw'])) {
		echo 'Clanok s obrazkom bol pridany!';
	} else if (!empty($session_user_id)) {
		if (has_access($session_user_id, 1) === true) {
		
			if (empty($_POST) === false && empty($errors) === true) {
				
				$nadpis = $_POST['nadpis'];
				$register_data = array(
					'nazov_s'		=> 'historia',
					'nadpis' 		=> $_POST['nadpis'],
					'text' 			=> $_POST['text'],
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
											header('Location: historia.php?successw');
											exit();
										}
								}
						}
				 
		}	
					
					
					header('Location: historia.php?successwo');
					exit();
		} else  if (empty ($errors) === false) {
				echo output_errors($errors);
		}
	?>

<br />
	<h4>Pridanie do historie (ak private obrazok je potrebne zadat aj nadpis) :</h4>
	<form action="#"  method="post" enctype="multipart/form-data">    
  	<table align="left" style="width:100%">
    	<tr>
    	  <td>Nadpis k danej casti:</td>
    	  <td><input type="text" name="nadpis" value="" size="25"/></td>
    	</tr>
		<tr>
    	  <td>Text k danej casti:</td>
    	  <td><input type="text" name="text" value="" size="25"/></td>
    	</tr>
		<tr>
		  <td>Pripadny obrazok:</td>
    	  <td><input type="file" name="file" value="" size="25"/></td>
    	</tr>
		<tr>
    	  <td><input type="submit" name="submit" value="Pridat clanok" /></td>
      	</tr>
  	</table>
	</form>

<br /><br /><br  />	
	
	
	
	
	
	
	<div class="w3-container w3-center">
	
<?php	} 
	} 
} 
	echo '<div class="w3-responsive w3-card-4 w3-table">';
	$sql = mysql_query("SELECT * FROM `obsah` WHERE `nazov_s`= 'historia'");
	while($hodnota=mysql_fetch_array($sql)) { ?>
	<table style="width:100%">
			<tr><td><h3><?php echo $hodnota["nadpis"];?></h3></td></tr>
			<tr><td><img src="<?php echo $hodnota["pic_c"]; ?>" alt="" /></td></tr>
			<tr><td><p><?php echo $hodnota["text"];?></p></td></tr>
			<?php	if (!empty($session_user_id)) {
						if (has_access($session_user_id, 1) === true) { ?>
							<td><a href="zmazat_cont.php?del=<?php echo $hodnota['id_cont']?>" onClick="return confirm('Ste si istý, že chcete vymazat daný obsah?');">Zmazat clanok.</a></td> 
	<br />
<?php	} 
	}
}	?>
	</table></div>
<?php include'includes/overall/footer.php'; ?>