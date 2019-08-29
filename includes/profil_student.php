<?php $profil_data 	= student_data($profil_id); ?>
		<h2>Profil studenta <b><i><?php echo $pMeno; ?></i></b></h2><br />
			<?php	
				if (has_access($session_user_id, 3) === true) {
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
							<tr>
							  <td><b>Rocnik a trieda: </b></td>
							  <td><?php echo $profil_data['rocnik']; echo ' '; echo $profil_data['trieda']; ?></td>
							</tr>
							<tr>
							  <td><b>Meno a priezvisko zakonneho zastupcu: </b></td>
							  <td><?php echo $profil_data['zz_info']; ?></td>
							</tr>
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
					<tr>
					  <td><b>Rocnik a trieda: </b></td>
					  <td><?php echo $profil_data['rocnik']; echo ' '; echo $profil_data['trieda']; ?></td>
					</tr>
					</table>
					
					
					<?php
					}
				}
				if (has_access($session_user_id, 2) === true) { ?>
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
							  <td><b>Rocnik a trieda: </b></td>
							  <td><?php echo $profil_data['rocnik']; echo ' '; echo $profil_data['trieda']; ?></td>
							</tr>
							<tr>
							  <td><b>Meno a priezvisko zakonneho zastupcu: </b></td>
							  <td><?php echo $profil_data['zz_info']; ?></td>
							</tr>
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
						  </table>
				<?php }
				if (has_access($session_user_id, 1) === true) { 
					if (!empty($profil_data)) {	
						if (empty($_POST) === false && empty($errors) === true) {
							$update_data = array(
								'rocnik' 		=> $_POST['rocnik'],
								'trieda' 		=> $_POST['trieda'],
								'zz_info' 		=> $_POST['zz_info'],
								'mesto' 		=> $_POST['mesto'],
								'ulica_cd'		=> $_POST['ulica_cd'],
								'tel_c' 		=> $_POST['tel_c'],
								'email' 		=> $_POST['email'],
							);
					
							update_student($update_data, $profil_id);
							header('Location: #');
							exit();
						
						} else if (empty ($errors) === false) {
							echo output_errors($errors);
						} ?>
								
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
							  <td>Rocnik: </td>
							  <td><input type="text" name="rocnik" value="<?php echo $profil_data['rocnik'];?>" size="25"/></td>
							</tr>
							<tr>
							  <td>Trieda: </td>
							  <td><input type="text" name="trieda" value="<?php echo $profil_data['trieda'];?>" size="25"/></td>
							</tr>
							<tr>
							  <td>Meno a priezvisko zakonneho zastupcu: </td>
							  <td><input type="text" name="zz_info" value="<?php echo $profil_data['zz_info'];?>" size="25" /></td>
							</tr>
							<tr>
							  <td>Mesto pobytu: </td>
							  <td><input type="text" name="mesto" value="<?php echo $profil_data['mesto'];?>" size="25" /></td>
							</tr>
							<tr>
							  <td>Ulica a cislo domu: </td>
							  <td><input type="text" name="ulica_cd" value="<?php echo $profil_data['ulica_cd'];?>" size="25" /></td>
							</tr>
							<tr>
							  <td>Telefonne cislo: </td>
							  <td><input type="text"  name="tel_c" value="<?php echo $profil_data['tel_c'];?>" size="25"></td>
							</tr>
							<tr>
							  <td>Email (nepovinne) </td>
							  <td><input type="email"  name="email" value="<?php echo $profil_data['email'];?>" size="25"></td>
							</tr>
				
							<td><input type="submit" name="submit" value="Upravit profil studenta" /></td>
							  </tr>
						  </table>
						</form>
					<?php
					} else {
						if (empty($_POST) === false && empty($errors) === true) {
							$register_data = array(
								'id_studenta'	=> $profil_id,
								'rocnik' 		=> $_POST['rocnik'],
								'trieda' 		=> $_POST['trieda'],
								'zz_info' 		=> $_POST['zz_info'],
								'mesto' 		=> $_POST['mesto'],
								'ulica_cd'		=> $_POST['ulica_cd'],
								'tel_c' 		=> $_POST['tel_c'],
								'email' 		=> $_POST['email'],
							);
					
							register_student($register_data);
							header('Location: #');
							exit();
						}
					 ?>
					
				 <form action="#"  method="post">     
				  <table align="left">
					<tr>
					  <td>Rocnik: </td>
					  <td><input type="text" name="rocnik" value="" size="25"/></td>
					</tr>
					<tr>
					  <td>Trieda: </td>
					  <td><input type="text" name="trieda" value="" size="25"/></td>
					</tr>
					<tr>
					  <td>Meno a priezvisko zakonneho zastupcu: </td>
					  <td><input type="text" name="zz_info" value="" size="25" /></td>
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
					  <td><input type="text"  name="tel_c" value=""></td>
					</tr>
					<tr>
					  <td>Email (nepovinne) </td>
					  <td><input type="email"  name="email" value=""></td>
					</tr>
					<td><input type="submit" name="submit" value="Vytvorit profil studenta" /></td>
					  </tr>
				  </table>
				</form>
<?php } 
}
?>