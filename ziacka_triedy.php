<?php 
include'core/init.php';
protect_page();
include'includes/overall/header.php';

if (has_access($session_user_id, 2) === true) { ?>
<h2>Zoznam tried: </h2>
<?php $sql = mysql_query("SELECT * FROM `trieda` WHERE (`pred1` OR `pred2` OR `pred3` OR `pred4` OR `pred5` OR `pred6` OR `pred7` OR `pred8` OR `pred9` OR `pred10`) = ('$pred1' OR '$pred2' OR '$pred3' OR '$pred4') ORDER BY `rocnik`,`trieda`");
						while ($hodnota=mysql_fetch_array($sql))	{ ?>
						<a href="ziacka_triedy.php?trieda=<?php echo $hodnota['id_trieda'] ?>" class="w3-button w3-grey "><?php echo $hodnota['rocnik']; echo '  '; echo $hodnota['trieda']; ?></a>
						<?php 
					} 
					if (empty($_GET) === false && empty($errors) === true) {
						$trieda1 	= $_GET['trieda'];
						$triedy		= r_t_from_id_trieda($trieda1);
						$trieda 	= $triedy['trieda']; 
						$rocnik 	= $triedy['rocnik']; 
						?>
						 
						<h2>Zoznam studentov z triedy <?php echo $rocnik ; echo ' . '; echo $trieda ;?> </h2> 
						<p><b> Pridat domacu ulohu pre danu triedu </b></p>
						<?php if (empty($_POST) === false && empty($errors) === true) { 
						
						$register_data = array(
							'id_ucitel' 	=> $session_user_id,
							'id_trieda' 	=> $trieda1,
							'id_predmet'	=> $_POST['id_predmet'],
							'typ'			=> $_POST['typ'],
							'date'			=> $_POST['date'],
							'popis' 		=> $_POST['popis'],
						);
						
						zapisat_du($register_data);
						header('Location: #');
						exit();
						}
						?>
						<form action="#" method="post">
						<table align="left" style="width:100%">
						<tr>
						  <td>Vyberte predmet:</td>
						  	<td>
						  	  <select name="id_predmet">
								<option value="<?php echo $pred1; ?>"><?php echo predmet_from_id($pred1);?></option>
								<option value="<?php echo $pred2; ?>"><?php echo predmet_from_id($pred2);?></option>
								<option value="<?php echo $pred3; ?>"><?php echo predmet_from_id($pred3);?></option>
								<option value="<?php echo $pred4; ?>"><?php echo predmet_from_id($pred4);?></option>
							  </select>
  						 	</td>
						 </tr>
						 <tr>
						  <td>Vyberte typ :</td>
						  	<td>
						  	  <select name="typ">
								<option value="Domaca uloha">Domaca uloha</option>
								<option value="Velka pisomka">Velka pisomka</option>
								<option value="Pisomka">Pisomka</option>
								<option value="Kratucky testik">Kratucky testik</option>
								<option value="Ustne skusanie">Ustne skusanie</option>
								<option value="Velka pisomka">Velka pisomka</option>
								<option value="Referat">Referat</option>
								<option value="Projekt">Projekt</option>
							  </select>
  						 	</td>
						 </tr>
						 <tr>
						 	<td>Na ktory den je treba ulohu vypracovat:</td>
						 	<td><input type="date"  name="date" min="2018-4-1" max="2100-12-31"></td>
						 </tr>
						 <tr>
						  <td>Popis domacej ulohy: </td>
						  <td><input type="text" name="popis" value="" size="25" /></td>
						</tr>
						 <tr>
							 <td><input type="submit" value="Zadat ulohu" onClick="return confirm('Ste si isty, ze chcete pridat ulohu?');"></td>
						 </tr>
						 </form><br /><br>
					
						<table align="left" style="width:100%">
							<tr><td><b>Priezvisko Studenta: </b></td><td></td><td><b> Meno Studenta: </b></td></tr>
							<tr>
								<td><?php $sql2 = mysql_query("SELECT P.Meno, P.Priezvisko, S.id_studenta, S.rocnik, S.trieda FROM pouzivatelia P, student S WHERE P.IDpouzivatel = S.id_studenta AND S.trieda = '$trieda' AND S.rocnik = '$rocnik' ORDER BY P.Priezvisko");			
						while ($studenti = mysql_fetch_array($sql2)) { ?>
							
								<tr><td><?php echo $studenti['Priezvisko'];?></td><td></td><td><?php echo $studenti['Meno'];?></td><td><a href="ziacka_knizka.php?student=<?php echo $studenti['id_studenta'];?>" ><i>Zapisat znamku</i></a></td></tr>
								
								<?php } ?>
							</tr>
							<tr>
								<td></td>
							</tr>
							</table>
<?php		
		} 
	} else {
	header('Location: index.php');
	exit();
	}
include'includes/overall/footer.php'; 
?>