<?php 
include'core/init.php';
protect_page();
admin_protect();
include'includes/overall/header.php';
?>
<h1> Sprava pouzivatelov </h1>
<div class="w3-container  w3-center" >
<a href="sprava_p.php?pPravo=3" class="w3-bar-item w3-button">Zobrazit vsetkych studentov</a>
<a href="sprava_p.php?pPravo=2" class="w3-bar-item w3-button">Zobrazit vsetkych ucitelov</a>
<a href="sprava_p.php?pPravo=1" class="w3-bar-item w3-button">Zobrazit vsetkych adminov</a><br  /><br  />
<?php 
 if (isset($_GET['pPravo']) === true && empty ($_GET['pPravo']) === false) {
	$pPravo			= $_GET['pPravo'];
?>
<table style="width:100%" class="w3-white w3-table w3-striped w3-bordered">
	<tr>
		<td><b>ID:</b></td>
		<td><b>Prihlasovacie meno:</b></td>
		<td><b>Meno:</b></td>
		<td><b>Priezvisko:</b></td>
		<td><b>Datum Narodenia:</b></td>
		<td></td><td></td><td></td>
	</tr>
<?php

$sql = mysql_query("SELECT * FROM pouzivatelia where pPravo= $pPravo ORDER BY Priezvisko ASC");
	while ($hodnota=mysql_fetch_array($sql)) {
	
	if($hodnota['pPravo'] == 3){?>
		<tr>
			<td><?php echo $hodnota['IDpouzivatel']?></td>
			<td><?php echo $hodnota['pMeno']?></td>
			<td><?php echo $hodnota['Meno']?></td>
			<td><?php echo $hodnota['Priezvisko']?></td>
			<td><?php echo $hodnota['d_narodenia']?></td>
			<td><a href=" <?php echo $hodnota['pMeno'] ?>"<i class="fa fa-address-card" style="font-size:24px"></i></td>
			<td><a href="nastavenia_all.php?p_id=<?php echo $hodnota['IDpouzivatel']?>"><i class="material-icons">settings</i></a></td>
			<td> <a href="zmazat.php?del=<?php echo $hodnota['IDpouzivatel']?>" onClick="return confirm('Ste si istý, že chcete vymazat študenta s menom <?php echo $hodnota['Meno']?>  <?php echo $hodnota['Priezvisko'] ?>?');"><i class="material-icons">delete_forever</i></a> </td>
			</tr>
				
<?php } else if ($hodnota['pPravo'] == 2) {	?>
		<tr>
			<td><?php echo $hodnota['IDpouzivatel']?></td>
			<td><?php echo $hodnota['pMeno']?></td>
			<td><?php echo $hodnota['Meno']?></td>
			<td><?php echo $hodnota['Priezvisko']?></td>
			<td><?php echo $hodnota['d_narodenia']?></td>
			<td><a href=" <?php echo $hodnota['pMeno'] ?>"<i class="fa fa-address-card" style="font-size:24px"></i></td>
			<td><a href="nastavenia_all.php?p_id=<?php echo $hodnota['IDpouzivatel']?>"><i class="material-icons">settings</i></a></td>
			<td> <a href="zmazat.php?del=<?php echo $hodnota['IDpouzivatel']?>" onClick="return confirm('Ste si istý, že chcete vymazat ucitela s menom <?php echo $hodnota['Meno']?>  <?php echo $hodnota['Priezvisko'] ?>?');"><i class="material-icons">delete_forever</i></a> </td>
			</tr>
<?php } else if ($hodnota['pPravo'] == 1) { ?>
		<tr>
			<td><?php echo $hodnota['IDpouzivatel']?></td>
			<td><?php echo $hodnota['pMeno']?></td>
			<td><?php echo $hodnota['Meno']?></td>
			<td><?php echo $hodnota['Priezvisko']?></td>
			<td><?php echo $hodnota['d_narodenia']?></td>
			<td><a href="nastavenia_all.php?p_id=<?php echo $hodnota['IDpouzivatel']?>"><i class="material-icons">settings</i></a></td>
		</tr>
<?php 
			}
		} 
?> 
</table> <br />
<?php } 
include'includes/overall/footer.php'; 
?>