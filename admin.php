<?php 
include'core/init.php';
protect_page();
admin_protect();
include'includes/overall/header.php';
?>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
}
th {
    text-align: left;
}
</style>
<h1> Stranka dostupna len pre admina </h1>
<div class="w3-container w3-light-grey w3-center" >
<a href="admin.php?pPravo=3" class="w3-bar-item w3-button">Zobrazit vsetkych studentov</a>
<a href="admin.php?pPravo=2" class="w3-bar-item w3-button">Zobrazit vsetkych ucitelov</a>
<a href="admin.php?pPravo=1" class="w3-bar-item w3-button">Zobrazit vsetkych adminov</a><br  /><br  />
<?php 
 if (isset($_GET['pPravo']) === true && empty ($_GET['pPravo']) === false) {
	$pPravo			= $_GET['pPravo'];
?>
<table style="width:100%" class="w3-white">
	<tr>
		<td><b>ID:</b></td>
		<td><b>Prihlasovacie meno:</b></td>
		<td><b>Meno:</b></td>
		<td><b>Priezvisko:</b></td>
		<td><b>Datum Narodenia:</b></td>
		<td><b>Tel. cislo:</b></td>
		<td><b>Email:</b></td>
		<?php if ($pPravo == 3) {
		echo '<td><b>Meno zakonneho zastupcu:</b></td>';
		echo '<td><b>Priezvisko zakonneho zastupcu:</b></td>';
		} ?>
		
	</tr>
<?php

$sql = mysql_query("SELECT * FROM pouzivatelia where pPravo= $pPravo ORDER BY Priezvisko ASC");
	while($hodnota=mysql_fetch_array($sql)){
	
	if($hodnota['pPravo'] == 3){?>
		<tr>
			<td><?php echo $hodnota['IDpouzivatel']?></td>
			<td><?php echo $hodnota['pMeno']?></td>
			<td><?php echo $hodnota['Meno']?></td>
			<td><?php echo $hodnota['Priezvisko']?></td>
			<td><?php echo $hodnota['d_narodenia']?></td>
			<td><?php echo $hodnota['tel_c']?></td>
			<td><?php echo $hodnota['email']?></td>
			<td><?php echo $hodnota['zz_meno']?></td>
			<td><?php echo $hodnota['zz_priez']?></td>
			<td><a href="nastavenia_all.php?p_id=<?php echo $hodnota['IDpouzivatel']?>">Zmenit</a></td>
			<td><a href="zmazat.php?p_id=<?php echo $hodnota['IDpouzivatel']?>">Vymazat</a></td>
		</tr>
<?php } else if ($hodnota['pPravo'] == 2) {	?>
		<tr>
			<td><?php echo $hodnota['IDpouzivatel']?></td>
			<td><?php echo $hodnota['pMeno']?></td>
			<td><?php echo $hodnota['Meno']?></td>
			<td><?php echo $hodnota['Priezvisko']?></td>
			<td><?php echo $hodnota['d_narodenia']?></td>
			<td><?php echo $hodnota['tel_c']?></td>
			<td><?php echo $hodnota['email']?></td>
			<td><a href="nastavenia_all.php?p_id=<?php echo $hodnota['IDpouzivatel']?>">Zmenit</a></td>
			<td><a href="zmazat.php?p_id=<?php echo $hodnota['IDpouzivatel']?>">Vymazat</a></td>
		</tr>
<?php } else if ($hodnota['pPravo'] == 1) { ?>
		<tr>
			<td><?php echo $hodnota['IDpouzivatel']?></td>
			<td><?php echo $hodnota['pMeno']?></td>
			<td><?php echo $hodnota['Meno']?></td>
			<td><?php echo $hodnota['Priezvisko']?></td>
			<td><?php echo $hodnota['d_narodenia']?></td>
			<td><?php echo $hodnota['tel_c']?></td>
			<td><?php echo $hodnota['email']?></td>
			<td><a href="nastavenia_all.php?p_id=<?php echo $hodnota['IDpouzivatel']?>">Zmenit</a></td>
			<td><a href="zmazat.php?p_id=<?php echo $hodnota['IDpouzivatel']?>">Vymazat</a></td>
		</tr>
<?php 
			}
		} 
?> 
</table> </div>
<?php
}

include'includes/overall/footer.php'; 
?>