<?php 
include'core/init.php';
protect_page();
admin_protect();
include'includes/overall/header.php';
$trieda = $_GET['predmet'];
?>
<h2>Priradenie predmetov k triedam</h2>
<div class="w3-dropdown-hover">
<button class="w3-button w3-white w3-card-2">Vyberte triedu<i class="fa fa-caret-down"></i></button>
	<div class="w3-container w3-center">
		<div class="w3-dropdown-content w3-bar-block w3-border w3-card-2">
					<?php $sql = mysql_query("SELECT * FROM `trieda` ORDER BY `rocnik`,`trieda`");
						while($hodnota=mysql_fetch_array($sql))	{ ?>
						<a href="predmety.php?predmet=<?php echo $hodnota['id_trieda'] ?>" class="w3-bar-item w3-button w3-white w3-card-2"><?php echo $hodnota['rocnik']; echo '  '; echo $hodnota['trieda']; ?></a>
						<?php 
					} ?>
		
		</div>
	</div>
</div>
<?php 
		$sql  = mysql_query("SELECT * FROM `trieda` WHERE `id_trieda` = '$trieda'");
	  $result = mysql_fetch_assoc($sql); 
				if (isset($_POST['submit'])) {
				
							 $update_data = array(
								'pred1' 		=> $_POST['pred1'],
								'pred2' 		=> $_POST['pred2'],
								'pred3' 		=> $_POST['pred3'],
								'pred4' 		=> $_POST['pred4'],
								'pred5'			=> $_POST['pred5'],
								'pred6' 		=> $_POST['pred6'],
								'pred7' 		=> $_POST['pred7'],
								'pred8' 		=> $_POST['pred8'],
								'pred9' 		=> $_POST['pred9'],
								'pred10' 		=> $_POST['pred10'],
								
							);
							pridat_predmet_pre_triedu($update_data, $trieda);
							header('Location: #');
							exit();
		} else if (empty ($errors) === false) {
							echo output_errors($errors);
						} 
		
	?>		<form action="#"  method="post">  
				<table>
					<tr><td></td><td><h3>Vyber predmetov pre <?php echo $result['rocnik']; echo ' . '; echo $result['trieda']; ?>/ </h3></td><td>Uz zadane predmety :</td>
					<tr>
					<td></td>
					<td>
					<select name="pred1">
					<option value=""></option>
					<?php $sql = mysql_query("SELECT * FROM `predmet`");
						   while ($hodnota = mysql_fetch_array($sql)) { ?> 
					 			<option value="<?php echo $hodnota['id_predmet']; ?>"><?php echo $hodnota['predmet']; ?></option>
					<?php } ?>
					</select>
					</td>
					<td><?php if ($result['pred1'] > 0 ) { $predmet = predmet_from_id($result['pred1']);  echo $predmet; } ?> </td>
				  </tr>
				  <tr>
				  	<td></td>
					<td>
					<select name="pred2">
					<option value=""></option>
					<?php $sql = mysql_query("SELECT * FROM `predmet`");
						   while ($hodnota = mysql_fetch_array($sql)) { ?> 
					 			<option value="<?php echo $hodnota['id_predmet']; ?>"><?php echo $hodnota['predmet']; ?></option>
					<?php } ?>
					</select>
					</td>
					<td><?php if ($result['pred2'] > 0 ) { $predmet = predmet_from_id($result['pred2']);  echo $predmet; } ?> </td>
				  </tr>
				  <tr>
				  	<td></td>
					<td>
					<select name="pred3">
					<option value=""></option>
					<?php $sql = mysql_query("SELECT * FROM `predmet`");
						   while ($hodnota = mysql_fetch_array($sql)) { ?> 
					 			<option value="<?php echo $hodnota['id_predmet']; ?>"><?php echo $hodnota['predmet']; ?></option>
					<?php } ?>
					</select>
					</td>
					<td><?php if ($result['pred3'] > 0 ) { $predmet = predmet_from_id($result['pred3']);  echo $predmet; } ?> </td>
				  </tr>
				  <tr>
				  	<td></td>
					<td>
					<select name="pred4">
					<option value=""></option>
					<?php $sql = mysql_query("SELECT * FROM `predmet`");
						   while ($hodnota = mysql_fetch_array($sql)) { ?> 
					 			<option value="<?php echo $hodnota['id_predmet']; ?>"><?php echo $hodnota['predmet']; ?></option>
					<?php } ?>
					</select>
					</td>
					<td><?php if ($result['pred4'] > 0 ) { $predmet = predmet_from_id($result['pred4']);  echo $predmet; } ?> </td>
				  </tr>
				  <tr>
				  	<td></td>
					<td>
					<select name="pred5">
					<option value=""></option>
					<?php $sql = mysql_query("SELECT * FROM `predmet`");
						   while ($hodnota = mysql_fetch_array($sql)) { ?> 
					 			<option value="<?php echo $hodnota['id_predmet']; ?>"><?php echo $hodnota['predmet']; ?></option>
					<?php } ?>
					</select>
					</td>
					<td><?php if ($result['pred5'] > 0 ) { $predmet = predmet_from_id($result['pred5']);  echo $predmet; } ?> </td>
				  </tr>
				  <tr>
				  	<td></td>
					<td>
					<select name="pred6">
					<option value=""></option>
					<?php $sql = mysql_query("SELECT * FROM `predmet`");
						   while ($hodnota = mysql_fetch_array($sql)) { ?> 
					 			<option value="<?php echo $hodnota['id_predmet']; ?>"><?php echo $hodnota['predmet']; ?></option>
					<?php } ?>
					</select>
					</td>
					<td><?php if ($result['pred6'] > 0 ) { $predmet = predmet_from_id($result['pred6']);  echo $predmet; } ?> </td>
				  </tr>
				  <tr>
				  	<td></td>
					<td>
					<select name="pred7">
					<option value=""></option>
					<?php $sql = mysql_query("SELECT * FROM `predmet`");
						   while ($hodnota = mysql_fetch_array($sql)) { ?> 
					 			<option value="<?php echo $hodnota['id_predmet']; ?>"><?php echo $hodnota['predmet']; ?></option>
					<?php } ?>
					</select>
					</td>
					<td><?php if ($result['pred7'] > 0 ) { $predmet = predmet_from_id($result['pred7']);  echo $predmet; } ?> </td>
				  </tr>
				  <tr>
				  	<td></td>
					<td>
					<select name="pred8">
					<option value=""></option>
					<?php $sql = mysql_query("SELECT * FROM `predmet`");
						   while ($hodnota = mysql_fetch_array($sql)) { ?> 
					 			<option value="<?php echo $hodnota['id_predmet']; ?>"><?php echo $hodnota['predmet']; ?></option>
					<?php } ?>
					</select>
					</td>
					<td><?php if ($result['pred8'] > 0 ) { $predmet = predmet_from_id($result['pred8']);  echo $predmet; } ?> </td>
				  </tr>
				  <tr>
				  	<td></td>
					<td>
					<select name="pred9">
					<option value=""></option>
					<?php $sql = mysql_query("SELECT * FROM `predmet`");
						   while ($hodnota = mysql_fetch_array($sql)) { ?> 
					 			<option value="<?php echo $hodnota['id_predmet']; ?>"><?php echo $hodnota['predmet']; ?></option>
					<?php } ?>
					</select>
					</td>
					<td><?php if ($result['pred9'] > 0 ) { $predmet = predmet_from_id($result['pred9']);  echo $predmet; } ?> </td>
				  </tr>
				  <tr>
				  	<td></td>
					<td>
					<select name="pred10">
					<option value=""></option>
					<?php $sql = mysql_query("SELECT * FROM `predmet`");
						   while ($hodnota = mysql_fetch_array($sql)) { ?> 
					 			<option value="<?php echo $hodnota['id_predmet']; ?>"><?php echo $hodnota['predmet']; ?></option>
					<?php } ?>
					</select>
					</td>
					<td><?php if ($result['pred10'] > 0 ) { $predmet = predmet_from_id($result['pred10']);  echo $predmet; } ?> </td>
				  </tr>
				  <td></td>
					<td><input type="submit" name="submit" value="Upravit" /></td>
					</tr>
				  </table>
			</form>







<?php
include'includes/overall/footer.php'; ?>