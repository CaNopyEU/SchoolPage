<?php 
include'core/init.php';
protect_page();
include'includes/overall/header.php';
	
	
	if (has_access($session_user_id, 2) === true) { 
	
		$id_studenta = $_GET['student'];
		$student_data = student_data($id_studenta); 
		$ziacka_knizka = ziacka_data($id_studenta); 
		$rocnik = $student_data['rocnik'];
		$trieda = $student_data['trieda'];
		$id_triedy = id_trieda_from_r_t($rocnik, $trieda);
		$predmety_triedy = predmety_z_id_triedy($id_triedy);
		
		if (empty($_POST) === false && empty($errors) === true) {
			$register_data = array(
				'id_student' 	=> $id_studenta,
				'id_ucitel' 	=> $session_user_id,
				'id_predmet' 	=> $_POST['id_predmet'],
				'znamka' 		=> $_POST['znamka'],
			);
			
			zapisat_znamku($register_data);
			header('Location: #');
			exit();
		
		}		
		?>
		<h2>Ziacka knizka studenta s menom: <?php echo $student_data['Priezvisko']; echo ' '; echo $student_data['Meno']; ?></h2>
		<table align="left">
		<tr><td>Predmet a znamky :</td></tr>
		<?php if (( $predmety_triedy['pred1'] > 0 ) && ($predmety_triedy['pred1'] == ($pred1 || $pred2 || $pred3 || $pred4 ) ) ){
			$id_predmet = $predmety_triedy['pred1'];
			$predmet = predmet_from_id($id_predmet); ?> <tr><td> <?php echo $predmet;?> : </td>
			
			<?php  
			$sql = znamka_from_predmet_student($id_predmet,$id_studenta);
			while ($hodnota = mysql_fetch_array($sql))	{ ?>
				<td><b><?php echo $hodnota['znamka'];?>, </b></td><?php  
		 } ?></tr><tr><td>Pridat znamku : 
		 <form action="#" method="post">
		 <input type="hidden" name="id_predmet" value="<?php echo $id_predmet; ?>">
		 <select name="znamka">
			<option value="1">Vyborny</option>
			<option value="2">Chvalitebny</option>
			<option value="3">Dobry</option>
			<option value="4">Dostatocni</option>
			<option value="5">Nedostatocni</option>
		  </select>
		 <input type="submit" value="Pridat znamku" onClick="return confirm('Ste si isty, ze chcete pridat znamku?');">
		 </form>
		 </td></tr> <?php }?>
		<?php if (( $predmety_triedy['pred2'] > 0 ) && ($predmety_triedy['pred1'] == ($pred1 || $pred2 || $pred3 || $pred4 ) ) ){
			$id_predmet = $predmety_triedy['pred2'];
			$predmet = predmet_from_id($id_predmet); ?> <tr><td> <?php echo $predmet;?> : </td>
			
			<?php  
			$sql = znamka_from_predmet_student($id_predmet,$id_studenta);
			while ($hodnota = mysql_fetch_array($sql))	{ ?>
				<td><b><?php echo $hodnota['znamka'];?>, </b></td><?php  
		 } ?></tr><tr><td>Pridat znamku : 
		 <form action="#" method="post">
		 <input type="hidden" name="id_predmet" value="<?php echo $id_predmet; ?>">
		 <select name="znamka">
			<option value="1">Vyborny</option>
			<option value="2">Chvalitebny</option>
			<option value="3">Dobry</option>
			<option value="4">Dostatocni</option>
			<option value="5">Nedostatocni</option>
		  </select>
		 <input type="submit" value="Pridat znamku" onClick="return confirm('Ste si isty, ze chcete pridat znamku?');">
		 </form>
		 </td></tr> <?php }?>
		<?php if (( $predmety_triedy['pred3'] > 0 ) && ($predmety_triedy['pred1'] == ($pred1 || $pred2 || $pred3 || $pred4 ) ) ){
			$id_predmet = $predmety_triedy['pred3'];
			$predmet = predmet_from_id($id_predmet); ?> <tr><td> <?php echo $predmet;?> : </td>
			
			<?php  
			$sql = znamka_from_predmet_student($id_predmet,$id_studenta);
			while ($hodnota = mysql_fetch_array($sql))	{ ?>
				<td><b><?php echo $hodnota['znamka'];?>, </b></td><?php  
		 } ?></tr><tr><td>Pridat znamku : 
		 <form action="#" method="post">
		 <input type="hidden" name="id_predmet" value="<?php echo $id_predmet; ?>">
		 <select name="znamka">
			<option value="1">Vyborny</option>
			<option value="2">Chvalitebny</option>
			<option value="3">Dobry</option>
			<option value="4">Dostatocni</option>
			<option value="5">Nedostatocni</option>
		  </select>
		 <input type="submit" value="Pridat znamku" onClick="return confirm('Ste si isty, ze chcete pridat znamku?');">
		 </form>
		 </td></tr> <?php }?>
		<?php if (( $predmety_triedy['pred4'] > 0 ) && ($predmety_triedy['pred1'] == ($pred1 || $pred2 || $pred3 || $pred4 ) ) ){
			$id_predmet = $predmety_triedy['pred4'];
			$predmet = predmet_from_id($id_predmet); ?> <tr><td> <?php echo $predmet;?> : </td>
			
			<?php  
			$sql = znamka_from_predmet_student($id_predmet,$id_studenta);
			while ($hodnota = mysql_fetch_array($sql))	{ ?>
				<td><b><?php echo $hodnota['znamka'];?>, </b></td><?php  
		 } ?></tr><tr><td>Pridat znamku : 
		 <form action="#" method="post">
		 <input type="hidden" name="id_predmet" value="<?php echo $id_predmet; ?>">
		 <select name="znamka">
			<option value="1">Vyborny</option>
			<option value="2">Chvalitebny</option>
			<option value="3">Dobry</option>
			<option value="4">Dostatocni</option>
			<option value="5">Nedostatocni</option>
		  </select>
		 <input type="submit" value="Pridat znamku" onClick="return confirm('Ste si isty, ze chcete pridat znamku?');">
		 </form>
		 </td></tr> <?php }?>
		<?php if (( $predmety_triedy['pred5'] > 0 ) && ($predmety_triedy['pred1'] == ($pred1 || $pred2 || $pred3 || $pred4 ) ) ){
			$id_predmet = $predmety_triedy['pred5'];
			$predmet = predmet_from_id($id_predmet); ?> <tr><td> <?php echo $predmet;?> : </td>
			
			<?php  
			$sql = znamka_from_predmet_student($id_predmet,$id_studenta);
			while ($hodnota = mysql_fetch_array($sql))	{ ?>
				<td><b><?php echo $hodnota['znamka'];?>, </b></td><?php  
		 } ?></tr><tr><td>Pridat znamku : 
		 <form action="#" method="post">
		 <input type="hidden" name="id_predmet" value="<?php echo $id_predmet; ?>">
		 <select name="znamka">
			<option value="1">Vyborny</option>
			<option value="2">Chvalitebny</option>
			<option value="3">Dobry</option>
			<option value="4">Dostatocni</option>
			<option value="5">Nedostatocni</option>
		  </select>
		 <input type="submit" value="Pridat znamku" onClick="return confirm('Ste si isty, ze chcete pridat znamku?');">
		 </form>
		 </td></tr> <?php }?>
		<?php if (( $predmety_triedy['pred6'] > 0 ) && ($predmety_triedy['pred1'] == ($pred1 || $pred2 || $pred3 || $pred4 ) ) ){
			$id_predmet = $predmety_triedy['pred6'];
			$predmet = predmet_from_id($id_predmet); ?> <tr><td> <?php echo $predmet;?> : </td>
			
			<?php  
			$sql = znamka_from_predmet_student($id_predmet,$id_studenta);
			while ($hodnota = mysql_fetch_array($sql))	{ ?>
				<td><b><?php echo $hodnota['znamka'];?>, </b></td><?php  
		 } ?></tr><tr><td>Pridat znamku : 
		 <form action="#" method="post">
		 <input type="hidden" name="id_predmet" value="<?php echo $id_predmet; ?>">
		 <select name="znamka">
			<option value="1">Vyborny</option>
			<option value="2">Chvalitebny</option>
			<option value="3">Dobry</option>
			<option value="4">Dostatocni</option>
			<option value="5">Nedostatocni</option>
		  </select>
		 <input type="submit" value="Pridat znamku" onClick="return confirm('Ste si isty, ze chcete pridat znamku?');">
		 </form>
		 </td></tr> <?php }?>
		<?php if (( $predmety_triedy['pred7'] > 0 ) && ($predmety_triedy['pred1'] == ($pred1 || $pred2 || $pred3 || $pred4 ) ) ){
			$id_predmet = $predmety_triedy['pred7'];
			$predmet = predmet_from_id($id_predmet); ?> <tr><td> <?php echo $predmet;?> : </td>
			
			<?php  
			$sql = znamka_from_predmet_student($id_predmet,$id_studenta);
			while ($hodnota = mysql_fetch_array($sql))	{ ?>
				<td><b><?php echo $hodnota['znamka'];?>, </b></td><?php  
		 } ?></tr><tr><td>Pridat znamku : 
		 <form action="#" method="post">
		 <input type="hidden" name="id_predmet" value="<?php echo $id_predmet; ?>">
		 <select name="znamka">
			<option value="1">Vyborny</option>
			<option value="2">Chvalitebny</option>
			<option value="3">Dobry</option>
			<option value="4">Dostatocni</option>
			<option value="5">Nedostatocni</option>
		  </select>
		 <input type="submit" value="Pridat znamku" onClick="return confirm('Ste si isty, ze chcete pridat znamku?');">
		 </form>
		 </td></tr> <?php }?>
		<?php if (( $predmety_triedy['pred8'] > 0 ) && ($predmety_triedy['pred1'] == ($pred1 || $pred2 || $pred3 || $pred4 ) ) ){
			$id_predmet = $predmety_triedy['pred8'];
			$predmet = predmet_from_id($id_predmet); ?> <tr><td> <?php echo $predmet;?> : </td>
			
			<?php  
			$sql = znamka_from_predmet_student($id_predmet,$id_studenta);
			while ($hodnota = mysql_fetch_array($sql))	{ ?>
				<td><b><?php echo $hodnota['znamka'];?>, </b></td><?php  
		 } ?></tr><tr><td>Pridat znamku : 
		 <form action="#" method="post">
		 <input type="hidden" name="id_predmet" value="<?php echo $id_predmet; ?>">
		 <select name="znamka">
			<option value="1">Vyborny</option>
			<option value="2">Chvalitebny</option>
			<option value="3">Dobry</option>
			<option value="4">Dostatocni</option>
			<option value="5">Nedostatocni</option>
		  </select>
		 <input type="submit" value="Pridat znamku" onClick="return confirm('Ste si isty, ze chcete pridat znamku?');">
		 </form>
		 </td></tr> <?php }?>
		<?php if (( $predmety_triedy['pred9'] > 0 ) && ($predmety_triedy['pred1'] == ($pred1 || $pred2 || $pred3 || $pred4 ) ) ){
			$id_predmet = $predmety_triedy['pred9'];
			$predmet = predmet_from_id($id_predmet); ?> <tr><td> <?php echo $predmet;?> : </td>
			
			<?php  
			$sql = znamka_from_predmet_student($id_predmet,$id_studenta);
			while ($hodnota = mysql_fetch_array($sql))	{ ?>
				<td><b><?php echo $hodnota['znamka'];?>, </b></td><?php  
		 } ?></tr><tr><td>Pridat znamku : 
		 <form action="#" method="post">
		 <input type="hidden" name="id_predmet" value="<?php echo $id_predmet; ?>">
		 <select name="znamka">
			<option value="1">Vyborny</option>
			<option value="2">Chvalitebny</option>
			<option value="3">Dobry</option>
			<option value="4">Dostatocni</option>
			<option value="5">Nedostatocni</option>
		  </select>
		 <input type="submit" value="Pridat znamku" onClick="return confirm('Ste si isty, ze chcete pridat znamku?');">
		 </form>
		 </td></tr> <?php }?>
		<?php if (( $predmety_triedy['pred10'] > 0 ) && ($predmety_triedy['pred1'] == ($pred1 || $pred2 || $pred3 || $pred4 ) ) ){
			$id_predmet = $predmety_triedy['pred10'];
			$predmet = predmet_from_id($id_predmet); ?> <tr><td> <?php echo $predmet;?> : </td>
			
			<?php  
			$sql = znamka_from_predmet_student($id_predmet,$id_studenta);
			while ($hodnota = mysql_fetch_array($sql))	{ ?>
				<td><b><?php echo $hodnota['znamka'];?>, </b></td><?php  
		 } ?></tr><tr><td>Pridat znamku : 
		 <form action="#" method="post">
		 <input type="hidden" name="id_predmet" value="<?php echo $id_predmet; ?>">
		 <select name="znamka">
			<option value="1">Vyborny</option>
			<option value="2">Chvalitebny</option>
			<option value="3">Dobry</option>
			<option value="4">Dostatocni</option>
			<option value="5">Nedostatocni</option>
		  </select>
		 <input type="submit" value="Pridat znamku" onClick="return confirm('Ste si isty, ze chcete pridat znamku?');">
		 </form>
		 </td></tr> <?php }?>
		
		</table>
		
			
		
		<?php //STUDEEEEEEEEEEEEEENTTTTTT
	} else if (has_access($session_user_id, 3) === true) { 
				
				$rocnik = $student_info['rocnik'];
				$trieda = $student_info['trieda'];
				$id_triedy = id_trieda_from_r_t($rocnik, $trieda);
				$predmety_triedy = predmety_z_id_triedy($id_triedy);
				
			?>
			
			<h2>Vitajte vo svojej ziackej knizke :</h2>
				
				
				<table align="left">
				<tr><td>Predmety a znamky :</td></tr>
				
				<?php if ( $predmety_triedy['pred1'] > 0 ) {
					$id_predmet = $predmety_triedy['pred1'];
					$predmet = predmet_from_id($id_predmet); 
					?><tr><td><b> <?php echo $predmet;?> :</b></td>
					
					<?php  
					$sql = znamka_from_predmet_student($id_predmet,$session_user_id);
					while ($hodnota = mysql_fetch_array($sql))	{ ?>
						<td><b><?php echo $hodnota['znamka'];?>, </b></td><?php  } echo '</tr>'; }?>
				
				<?php if ( $predmety_triedy['pred2'] > 0 ) {
					$id_predmet = $predmety_triedy['pred2'];
					$predmet = predmet_from_id($id_predmet);
					?><tr><td><b> <?php echo $predmet;?> :</b></td>
					
					<?php  
					$sql = znamka_from_predmet_student($id_predmet,$session_user_id);
					while ($hodnota = mysql_fetch_array($sql))	{ ?>
						<td><b><?php echo $hodnota['znamka'];?>, </b></td><?php  } echo '</tr>'; }?>
						
				<?php if ( $predmety_triedy['pred3'] > 0 ) {
					$id_predmet = $predmety_triedy['pred3'];
					$predmet = predmet_from_id($id_predmet); 
					?><tr><td><b> <?php echo $predmet;?> :</b></td>
					
					<?php  
					$sql = znamka_from_predmet_student($id_predmet,$session_user_id);
					while ($hodnota = mysql_fetch_array($sql))	{ ?>
						<td><b><?php echo $hodnota['znamka'];?>, </b></td><?php  } echo '</tr>'; }?>
						
				<?php if ( $predmety_triedy['pred4'] > 0 ) {
					$id_predmet = $predmety_triedy['pred4'];
					$predmet = predmet_from_id($id_predmet);
					?><tr><td><b> <?php echo $predmet;?> :</b></td>
					
					<?php  
					$sql = znamka_from_predmet_student($id_predmet,$session_user_id);
					while ($hodnota = mysql_fetch_array($sql))	{ ?>
						<td><b><?php echo $hodnota['znamka'];?>, </b></td><?php  } echo '</tr>'; }?>
						
				<?php if ( $predmety_triedy['pred5'] > 0 ) {
					$id_predmet = $predmety_triedy['pred5'];
					$predmet = predmet_from_id($id_predmet);
					?><tr><td><b> <?php echo $predmet;?> :</b></td>
					
					<?php  
					$sql = znamka_from_predmet_student($id_predmet,$session_user_id);
					while ($hodnota = mysql_fetch_array($sql))	{ ?>
						<td><b><?php echo $hodnota['znamka'];?>, </b></td><?php  } echo '</tr>'; }?>
						
				<?php if ( $predmety_triedy['pred6'] > 0 ) {
					$id_predmet = $predmety_triedy['pred6'];
					$predmet = predmet_from_id($id_predmet);
					?><tr><td><b> <?php echo $predmet;?> :</b></td>
					
					<?php  
					$sql = znamka_from_predmet_student($id_predmet,$session_user_id);
					while ($hodnota = mysql_fetch_array($sql))	{ ?>
						<td><b><?php echo $hodnota['znamka'];?>, </b></td><?php  } echo '</tr>'; }?>
						
				<?php if ( $predmety_triedy['pred7'] > 0 ) {
					$id_predmet = $predmety_triedy['pred7'];
					$predmet = predmet_from_id($id_predmet);
					?><tr><td><b> <?php echo $predmet;?> :</b></td>
					
					<?php  
					$sql = znamka_from_predmet_student($id_predmet,$session_user_id);
					while ($hodnota = mysql_fetch_array($sql))	{ ?>
						<td><b><?php echo $hodnota['znamka'];?>, </b></td><?php  } echo '</tr>'; }?>
						
				<?php if ( $predmety_triedy['pred8'] > 0 ) {
					$id_predmet = $predmety_triedy['pred8'];
					$predmet = predmet_from_id($id_predmet);
					?><tr><td><b> <?php echo $predmet;?> :</b></td>
					
					<?php  
					$sql = znamka_from_predmet_student($id_predmet,$session_user_id);
					while ($hodnota = mysql_fetch_array($sql))	{ ?>
						<td><b><?php echo $hodnota['znamka'];?>, </b></td><?php  } echo '</tr>'; }?>
						
				<?php if ( $predmety_triedy['pred9'] > 0 ) {
					$id_predmet = $predmety_triedy['pred9'];
					$predmet = predmet_from_id($id_predmet);
					?><tr><td><b> <?php echo $predmet;?> :</b></td>
					
					<?php  
					$sql = znamka_from_predmet_student($id_predmet,$session_user_id);
					while ($hodnota = mysql_fetch_array($sql))	{ ?>
						<td><b><?php echo $hodnota['znamka'];?>, </b></td><?php  } echo '</tr>'; }?>
						
				<?php if ( $predmety_triedy['pred10'] > 0 ) {
					$id_predmet = $predmety_triedy['pred10'];
					$predmet = predmet_from_id($id_predmet);
					?><tr><td><b> <?php echo $predmet;?> :</b></td>
					
					<?php  
					$sql = znamka_from_predmet_student($id_predmet,$session_user_id);
					while ($hodnota = mysql_fetch_array($sql))	{ ?>
						<td><b><?php echo $hodnota['znamka'];?>, </b></td><?php  } echo '</tr>'; }?>
						
				</table>
				
<?php

	
} else  if (empty ($errors) === false) {
		echo output_errors($errors);
}
include'includes/overall/footer.php'; 
?>