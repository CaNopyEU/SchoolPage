<?php 
include'core/init.php';
include'includes/overall/header.php';
$jlistok = $jlistok['nazov_s'];
?>
<h3><?php echo $jlistok ?></h3>
<?php

if (!empty($session_user_id)) {
	if (has_access($session_user_id, 1) === true) {
		if (isset($_GET['success']) && empty($_GET['success'])) {
			echo 'Jedalny listok bol aktualizovany!';
		} 
			
				if (isset($_FILES['file']) === true) {
					if (!empty($_FILES['file']['name']) === true) {
						$file = $_FILES['file'];
						$id_cont = '22';
						$file_name 	= $file['name'];
						$file_temp 	= $file['tmp_name'];
						$file_error = $file['error'];
						
						$file_extn = strtolower(end(explode('.', $file_name)));
						
						$allowed = array('jpg', 'jpeg', 'gif', 'png');
						if (in_array($file_extn, $allowed) === true) {
							if ($file_error === 0){
								update_image($file_temp, $file_extn, $id_cont);
								header('Location: jlistok.php?success');
								exit();
														}
												}
									
					header('Location: jlistok.php?success');
					exit();
		} else  if (empty ($errors) === false) {
				echo output_errors($errors);
		} }
	?>
	<form action="#"  method="post" enctype="multipart/form-data">    
  	<table align="left" style="width:100%">
		<tr>
		  <td>Zmenit jedalny listok:</td>
    	  <td><input type="file" name="file" value="" size="25"/></td>
    	</tr>
		<tr>
    	  <td><input type="submit" name="submit" value="zmenit jedalny listok" /></td>
      	</tr>
  	</table>
	</form>
<?php  
		}    
	} 

?>
	<div class="w3-container w3-center">
	<div class=" w3-card-4 w3-table">
	<?php $sql="SELECT * FROM `obsah` WHERE id_cont=22";
	$result = mysql_query($sql);
	$data = mysql_fetch_assoc($result);
	?>  
	<img src="<?php echo $data['pic_c']?>" width="900"  /></div></div>
<?php include'includes/overall/footer.php'; ?>