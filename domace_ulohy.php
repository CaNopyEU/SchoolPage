<?php 
include'core/init.php';
protect_page();
include'includes/overall/header.php';
?>
<h2> Domace ulohy: </h2>
<br>
<?php 
	

	echo '<div class="w3-responsive w3-card-4 w3-table">';
	$sql = mysql_query("SELECT * FROM `domaca_uloha` WHERE DATE(date) >= CURDATE() ORDER BY `date` ASC"); ?>
	<table style="width:100%"> 
	<tr>
		<td>Datum</td><td>Trieda</td><td>Predmet</td><td>Typ</td><td>Popis</td>
	</tr>
	<?php while($hodnota=mysql_fetch_array($sql)) { 
	 	$id_trieda = $hodnota['id_trieda'];
		$id_predmet = $hodnota['id_predmet'];
				
		$predmet = predmet_from_id($id_predmet);
		$id_trieda = r_t_from_id_trieda($id_trieda);
		$trieda = $id_trieda['trieda'];
		$rocnik = $id_trieda['rocnik'];
	?>
	<tr>
		<td><?php echo $hodnota['date']; ?></td><td><?php echo $rocnik; echo ' . '; echo $trieda; ?></td><td><?php echo $predmet ?></td><td><?php echo $hodnota['typ']; ?></td><td><?php echo $hodnota['popis'];?></td>
			<?php if (has_access($session_user_id, 1) === true) { ?>
			<td><a href="zmazat_du.php?del=<?php echo $hodnota['id_du']?>" onClick="return confirm('Ste si istý, že chcete vymazat domacu ulohu?');">Zmazat.</a></td> 
<?php		} ?>
	</tr>
<?php } ?>
	</table></div>
	

<?php
include'includes/overall/footer.php'; ?>