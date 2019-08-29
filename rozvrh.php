<?php 
include'core/init.php';
include'includes/overall/header.php';
$rozvrh = $rozvrh['nazov_s'];
?>	
<h2><?php echo $rozvrh ?></h2>

<?php

if (!empty($session_user_id)) {
	if (isset($_GET['success']) && empty($_GET['success'])) {
		echo 'Rozvrhbol zmeneni!';
	}
		if (has_access($session_user_id, 1) === true) {
			if (isset($_FILES['file']) === true) {
				if (!empty($_FILES['file']['name']) === true) {
					$file = $_FILES['file'];
					$rocnik = $_POST['rocnik'];
					$trieda = $_POST['trieda'];
					
					$id_trieda 	= trieda_id_from_rocnik($rocnik, $trieda);
					
					$file_name 	= $file['name'];
					$file_temp 	= $file['tmp_name'];
					$file_error = $file['error'];
					
					$file_extn = strtolower(end(explode('.', $file_name)));
					
					$allowed = array('jpg', 'jpeg', 'gif', 'png');
					if (in_array($file_extn, $allowed) === true) {
						if ($file_error === 0){
							update_rozvrh($file_temp, $file_extn, $id_trieda);
							header('Location: rozvrh.php?success');
							exit();
							}
					}
			}
	}

?>
	<form action="#"  method="post" enctype="multipart/form-data">    
  	<table align="left" style="width:100%">
		<tr>
			<td>Vyberte triedu</td>
			<td>
			<select name="trieda">
			  <option value="A">A</option>
			  <option value="B">B</option>
			</select>
			</td>
		</tr>
		<tr>
			<td>Vyberte rocnik</td>
			<td>
			<select name="rocnik">
			  <option value="1">1</option>
			  <option value="2">2</option>
			  <option value="3">3</option>
			  <option value="4">4</option>
			  <option value="5">5</option>
			  <option value="6">6</option>
			  <option value="7">7</option>
			  <option value="8">8</option>
			  <option value="9">9</option>
			</select></td>
		</tr>
		<tr>
			<td>Zmenit jedalny listok:</td>
    		<td><input type="file" name="file" value="" size="25"/></td>
    	</tr>
		<tr>
    		<td><input type="submit" name="submit" value="aktualizovat rozvrh" /></td>
      	</tr>
  	</table>
	</form>
<?php } 

} ?>

<div class="w3-dropdown-hover">
<button class="w3-button w3-white w3-card-2">Vyberte triedu<i class="fa fa-caret-down"></i></button>
	<div class="w3-container w3-center">
		<div class="w3-dropdown-content w3-bar-block w3-border w3-card-2">
			<?php $sql = mysql_query("SELECT * FROM trieda WHERE `rozvrh_c` IS NOT NULL");
				while($hodnota=mysql_fetch_array($sql))	{ ?>
				<a href="rozvrh.php?rozvrh=<?php echo $hodnota['id_trieda'] ?>" class="w3-bar-item w3-button w3-white w3-card-2"><?php echo $hodnota['rocnik']?>. 
			<?php if($hodnota['trieda']>"0") {
				echo $hodnota['trieda'];
				}	?></a><?php 
			} ?>

		</div>
	</div>
</div>
<?php
	if (!empty($_GET) && !isset($_GET['success'])){

		$sql="SELECT * FROM trieda where id_trieda='".$_GET["rozvrh"]."' ";
		$result =  mysql_fetch_assoc(mysql_query($sql)); ?>  
		<img src="<?php echo $result['rozvrh_c']?>" width="900"  />
		
<?php } include'includes/overall/footer.php'; ?>