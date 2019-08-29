<?php 
include'core/init.php';
include'includes/overall/header.php';
$volny_cas = $volny_cas['nazov_s'] ;
?>
<h2><?php echo $volny_cas ?></h2>

<?php
$podm = $_GET['podm'];
if (!empty($session_user_id)) {
	if (isset($_GET['success']) && empty($_GET['success'])) {
		echo 'Clanok bez obrazku bol pridany!';
	} else if (!empty($session_user_id)) {
		if (has_access($session_user_id, 1) === true) {
		
			if (empty($_POST) === false && empty($errors) === true) {
				
				$nadpis = $_POST['nadpis'];
				$register_data = array(
					'nazov_s'		=> 'volny_cas',
					'nadpis' 		=> $_POST['nadpis'],
					'text' 			=> $_POST['text'],
					'podm' 			=> $_POST['podm'],
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
											header('Location: index.php?success');
											exit();
										}
								}
						}
				}	
				header('Location: index.php?successw');
				exit();
		
		} else  if (empty ($errors) === false) {
				echo output_errors($errors);
		}
?>

<br />
	<h4>Pridanie clankov k volnocasovim aktivitam (ak private obrazok je potrebne zadat aj nadpis) :</h4>
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
      <td>Vyberte do ktorej casti chcete pridat obsah: </td>
	  <td>
	  <select name="podm">
    	<option value="projekt">Projekty</option>
    	<option value="uspech">Úspechy</option>
		<option value="sklub">Školský klub</option>
  	  </select>
	 </td>
	 <tr>
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
	 $sql = mysql_query("SELECT * FROM `obsah` WHERE `nazov_s`= 'volny_cas' AND podm='$podm' ");
	while ($hodnota=mysql_fetch_array($sql)) { ?>
    	<h4><?php echo $hodnota['nadpis']?></h4>
		<img src="<?php echo $hodnota['pic_c']; ?>" alt="" />
		<p><?php echo $hodnota['text']?></p>
<?php	if (!empty($session_user_id)) {
						if (has_access($session_user_id, 1) === true) { ?>
							<td><a href="zmazat_cont.php?del=<?php echo $hodnota['id_cont']?>" onClick="return confirm('Ste si istý, že chcete vymazat daný obsah?');">Zmazat clanok.</a></td> 
	<br />
<?php	} 
	}
}	
 include'includes/overall/footer.php'; ?>