<?php 
$profil_data 	= ucitel_data($profil_id);
$id_triedy = $profil_data['id_triedy'];
?>
<script type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>

		<h2>Profil ucitela <b><i><?php echo $pMeno; ?></i></b></h2><br />
			<?php
				if (has_access($session_user_id, 2) === true) {
					if ($pMeno === $user_data['pMeno']) { ?>
						
						<table align="left">
							<tr>	
					 	 	  <td><b>Meno:</b></td>
					     	  <td><?php echo $profil_data['Meno']; ?></td>
							</tr>
							<tr>
							  <td><b>Priezvisko: </b></td>
							  <td><?php echo $profil_data['Priezvisko']; ?></td>
							</tr>
							<tr>
							  <td><b>Datum narodenia: </b></td>
							  <td><?php echo $profil_data['d_narodenia']; ?></td>
							</tr>
							<?php if ($profil_data['je_triedny'] == 1 ) { 
							$sql = mysql_fetch_assoc(mysql_query("SELECT * FROM `trieda` WHERE `id_trieda` = '$id_triedy'"));?>
							<tr>
							  <td><b>Triedny ucitel: </b></td>
							  <td><?php echo $sql['rocnik']; echo $sql['trieda']; ?></td>
							</tr>
							<?php } ?> 
							<tr>
							  <td><b>Bydlisko: </b></td>
							  <td><?php echo $profil_data['mesto']; echo ', ';  echo $profil_data['ulica_cd']; ?></td>
							</tr>
							<tr>
							  <td><b>Kontaktne udaje: </b></td>
							  <td><b>Telefonne cislo:</b> <?php echo $profil_data['tel_c']; 
							   		if (!empty($profil_data['email'])) { ?><b>
							  		 Email: </b><?php echo $profil_data['email']; 
								    }?></td>
							</tr>
							<tr>
								<td><h4>Vyucujuci predmetu/ov:</h4></td>
							</tr>
							<tr><td><?php if ($profil_data['pred1'] > 0 ) { $predmet = predmet_from_id($profil_data['pred1']);  echo $predmet; } ?>, </td></tr>
							<tr><td><?php if ($profil_data['pred2'] > 0 ) { $predmet = predmet_from_id($profil_data['pred2']);  echo $predmet; } ?>, </td></tr>
							<tr><td><?php if ($profil_data['pred3'] > 0 ) { $predmet = predmet_from_id($profil_data['pred3']);  echo $predmet; } ?>, </td></tr>
							<tr><td><?php if ($profil_data['pred4'] > 0 ) { $predmet = predmet_from_id($profil_data['pred4']);  echo $predmet; } ?> </td></tr>
						</table>
							<?php
					} else { ?>
						<table align="left">
							<tr>	
					 	 	  <td><b>Meno:</b></td>
					     	  <td><?php echo $profil_data['Meno']; ?></td>
							</tr>
							<tr>
							  <td><b>Priezvisko: </b></td>
							  <td><?php echo $profil_data['Priezvisko']; ?></td>
							</tr>
							<?php if ($profil_data['je_triedny'] == 1 ) { 
							$sql = mysql_fetch_assoc(mysql_query("SELECT * FROM `trieda` WHERE `id_trieda` = '$id_triedy'"));?>
							<tr>
							  <td><b>Triedny ucitel: </b></td>
							  <td><?php echo $sql['rocnik']; echo $sql['trieda']; ?></td>
							</tr>
							<?php } ?> 
							<tr>
							  <td><b>Kontaktne udaje: </b></td>
							  <td><b>Telefonne cislo:</b> <?php echo $profil_data['tel_c']; 
							   		if (!empty($profil_data['email'])) { ?><b>
							  		 Email: </b><?php echo $profil_data['email']; 
								    }?></td>
							</tr>
							<tr>
								<td><h4>Vyucujuci predmetu/ov:</h4></td>
							</tr>
							<tr><td><?php if ($profil_data['pred1'] > 0 ) { $predmet = predmet_from_id($profil_data['pred1']);  echo $predmet; } ?>, </td></tr>
							<tr><td><?php if ($profil_data['pred2'] > 0 ) { $predmet = predmet_from_id($profil_data['pred2']);  echo $predmet; } ?>, </td></tr>
							<tr><td><?php if ($profil_data['pred3'] > 0 ) { $predmet = predmet_from_id($profil_data['pred3']);  echo $predmet; } ?>, </td></tr>
							<tr><td><?php if ($profil_data['pred4'] > 0 ) { $predmet = predmet_from_id($profil_data['pred4']);  echo $predmet; } ?></td></tr>
						</table>
					<?php
					}
				}
				if (has_access($session_user_id, 3) === true) { ?>
						
						<table align="left">
							<tr>	
					 	 	  <td><b>Meno:</b></td>
					     	  <td><?php echo $profil_data['Meno']; ?></td>
							</tr>
							<tr>
							  <td><b>Priezvisko: </b></td>
							  <td><?php echo $profil_data['Priezvisko']; ?></td>
							</tr>
							<?php if ($profil_data['je_triedny'] == 1 ) { 
							$sql = mysql_fetch_assoc(mysql_query("SELECT * FROM `trieda` WHERE `id_trieda` = '$id_triedy'"));?>
							<tr>
							  <td><b>Triedny ucitel: </b></td>
							  <td><?php echo $sql['rocnik']; echo $sql['trieda']; ?></td>
							</tr>
							<?php }  if (!empty($profil_data['email'])) { ?> 
							<tr>
							  <td><b>Kontaktne udaje: </b></td>
							  <td><b>Email: </b><?php echo $profil_data['email']; ?></td>
							</tr>
							<?php } ?>
							<tr>
								<td><h4>Vyucujuci predmetu/ov:</h4></td>
							</tr>
							<tr><td><?php if ($profil_data['pred1'] > 0 ) { $predmet = predmet_from_id($profil_data['pred1']);  echo $predmet; echo ', '; } ?> </td></tr>
							<tr><td><?php if ($profil_data['pred2'] > 0 ) { $predmet = predmet_from_id($profil_data['pred2']);  echo $predmet; echo ', '; } ?> </td></tr>
							<tr><td><?php if ($profil_data['pred3'] > 0 ) { $predmet = predmet_from_id($profil_data['pred3']);  echo $predmet; echo ', '; } ?> </td></tr>
							<tr><td><?php if ($profil_data['pred4'] > 0 ) { $predmet = predmet_from_id($profil_data['pred4']);  echo $predmet;  } ?> </td></tr>
						</table>				
				<?php }
				if (has_access($session_user_id, 1) === true) { 
					if (!empty($profil_data)) {	
						if (empty($_POST) === false && empty($errors) === true) {

							 if (isset($_POST['submit'])) {
							 
							 $update_data = array(
								'je_triedny' 	=> $_POST['je_triedny'],
								'id_triedy' 	=> $_POST['id_triedy'],
								'mesto' 		=> $_POST['mesto'],
								'tel_c' 		=> $_POST['tel_c'],
								'ulica_cd'		=> $_POST['ulica_cd'],
								'email' 		=> $_POST['email'],
								'pred1' 		=> $_POST['pred1'],
								'pred2' 		=> $_POST['pred2'],
								'pred3' 		=> $_POST['pred3'],
								'pred4' 		=> $_POST['pred4'],
								
							);
							update_ucitel($update_data, $profil_id);
							header('Location: #');
							exit();
							 }
							  if (isset($_POST['submit2'])) {
								$predmet = array(
								'id_ucitel'	=> $profil_data['id_ucitela'],
								'predmet'	=> $_POST['predmet'],
							);
							pridat_predmet($predmet);
							header('Location: #');
							exit();
							}
							
						} else if (empty ($errors) === false) {
							echo output_errors($errors);
						} ?>
				<table align="center">
				<tr>
				 <form action="#"  method="post">     
				  <table align="left">
					<tr>	
					  <td><b>Meno:</b></td>
					  <td><?php echo $profil_data['Meno']; ?></td>
					</tr>
					<tr>
					  <td><b>Priezvisko: </b></td>
					  <td><?php echo $profil_data['Priezvisko']; ?></td>
					</tr>
					<tr>
					  <td><b>Datum narodenia: </b></td>
					  <td><?php echo $profil_data['d_narodenia']; ?></td>
					</tr>
					<tr>
					  <td>Triednym ucitelom: </td>
					  <td>
					  <select  name="je_triedny">
						<option value="0" size="25">Nieje</option>
						<option value="1" size="25">Je</option>
					  </select>
					  </td>
					 </tr>
					<tr>
					  <td> Je triednym ucitelom: </td>
					  <td>
					  <select name="id_triedy" >
					  <?php 
					   $sql = mysql_query("SELECT `id_trieda`,`rocnik`,`trieda` FROM `trieda`  ORDER BY `rocnik`,`trieda`");
					   while ($hodnota = mysql_fetch_array($sql)) { ?> 
					  <option value="<?php echo $hodnota['id_trieda'] ?>" size="25"><?php echo $hodnota['rocnik']; echo $hodnota['trieda']; ?></option>
					  <?php } ?>
					  </select>
					  </td>
					 </tr>
					<tr>
					  <td>Mesto pobytu: </td>
					  <td><input type="text" name="mesto" value="<?php echo $profil_data['mesto']; ?>" size="25" /></td>
					</tr>
					<tr>
					  <td>Ulica a cislo domu: </td>
					  <td><input type="text" name="ulica_cd" value="<?php echo $profil_data['ulica_cd']; ?>" size="25" /></td>
					</tr>
					<tr>
					  <td>Telefonne cislo: </td>
					  <td><input type="text"  name="tel_c" value="<?php echo $profil_data['tel_c']; ?>" size="25"></td>
					</tr>
					<tr>
					  <td>Email (nepovinne) </td>
					  <td><input type="email"  name="email" value="<?php echo $profil_data['email']; ?>" size="25"></td>
					</tr>
									  <tr>
				  	<td>Vyberte predmet/y</td>
					<td>
					<select name="pred1">
					<?php $sql = mysql_query("SELECT * FROM `predmet`");
						   while ($hodnota = mysql_fetch_array($sql)) { ?> 
					 			<option value="<?php echo $hodnota['id_predmet']; ?>"><?php echo $hodnota['predmet']; ?></option>
					<?php } ?>
					</select>
					</td>
				  </tr>
				  <tr>
				  	<td></td>
					<td>
					<select name="pred2">
					<?php $sql = mysql_query("SELECT * FROM `predmet`");
						   while ($hodnota = mysql_fetch_array($sql)) { ?> 
					 			<option value="<?php echo $hodnota['id_predmet']; ?>"><?php echo $hodnota['predmet']; ?></option>
					<?php } ?>
					</select>
					</td>
				  </tr>
				  <tr>
				  	<td></td>
					<td>
					<select name="pred3">
					<?php $sql = mysql_query("SELECT * FROM `predmet`");
						   while ($hodnota = mysql_fetch_array($sql)) { ?> 
					 			<option value="<?php echo $hodnota['id_predmet']; ?>"><?php echo $hodnota['predmet']; ?></option>
					<?php } ?>
					</select>
					</td>
				  </tr>
				  <tr>
				  	<td></td>
					<td>
					<select name="pred4">
					<?php $sql = mysql_query("SELECT * FROM `predmet`");
						   while ($hodnota = mysql_fetch_array($sql)) { ?> 
					 			<option value="<?php echo $hodnota['id_predmet']; ?>"><?php echo $hodnota['predmet']; ?></option>
					<?php } ?>
					</select>
					</td>
				  </tr><td></td>
					<td><input type="submit" name="submit" value="Upravit profil ucitela" /></td>
					</tr>
				  </table>
				</form>
				</tr>
					<tr>
						<td><h4>Vyucujuci predmetu/ov:</h4></td>
					</tr>
					<tr><td><?php if ($profil_data['pred1'] > 0 ) { $predmet = predmet_from_id($profil_data['pred1']);  echo $predmet; } ?>, </td></tr>
					<tr><td><?php if ($profil_data['pred2'] > 0 ) { $predmet = predmet_from_id($profil_data['pred2']);  echo $predmet; } ?>, </td></tr>
					<tr><td><?php if ($profil_data['pred3'] > 0 ) { $predmet = predmet_from_id($profil_data['pred3']);  echo $predmet; } ?>, </td></tr>
					<tr><td><?php if ($profil_data['pred4'] > 0 ) { $predmet = predmet_from_id($profil_data['pred4']);  echo $predmet; } ?></td></tr>
				</table>
				
				
					<?php
					} else {
						if (empty($_POST) === false && empty($errors) === true) {
							$register_data = array(
								'id_ucitela'	=> $profil_id,
								'je_triedny' 	=> $_POST['je_triedny'],
								'id_triedy' 	=> $_POST['id_triedy'],
								'mesto' 		=> $_POST['mesto'],
								'tel_c' 		=> $_POST['tel_c'],
								'ulica_cd'		=> $_POST['ulica_cd'],
								'email' 		=> $_POST['email'],
								);
					
							register_ucitel($register_data);
							header('Location: #');
							exit();
						}
					 ?>
					
				 <form action="#"  method="post">     
				  <table align="left">
					<tr>
					  <td>Triednym ucitelom: </td>
					  <td>
					  <select name="je_triedny">
						<option value="0">Nieje</option>
						<option value="1">Je</option>
					  </select>
					  </td>
					</tr>
					<tr>
					  <td> ak ano, ktorej triedy: </td>
					  <td>
					  <select name="id_triedy">
					  <?php $sql = mysql_query("SELECT `id_trieda`,`rocnik`,`trieda` FROM `trieda`  ORDER BY `rocnik`,`trieda`");
					   while ($hodnota = mysql_fetch_array($sql)) { ?> 
					  <option value="<?php echo $hodnota['id_trieda'] ?>"><?php echo $hodnota['rocnik']; echo $hodnota['trieda']; ?></option>
					  <?php } ?>
					  </select>
					  </td>
					</tr>
					<tr>
					  <td>Mesto pobytu: </td>
					  <td><input type="text" name="mesto" value="" size="25" /></td>
					</tr>
					<tr>
					  <td>Ulica a cislo domu: </td>
					  <td><input type="text" name="ulica_cd" value="" size="25" /></td>
					</tr>
					<tr>
					  <td>Telefonne cislo: </td>
					  <td><input type="text"  name="tel_c" value="" size="25"></td>
					</tr>
					<tr>
					  <td>Email (nepovinne) </td>
					  <td><input type="email"  name="email" value="" size="25"></td>
					</tr>
					<td><input type="submit" name="submit" value="Vytvorit profil ucitela" /></td>
					  </tr>
				  </table>
				</form>
<?php } 
}
?>