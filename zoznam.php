<?php 
include'core/init.php';
protect_page();
include'includes/overall/header.php';
?>
<h1> Zoznam ludi </h1>
<div class="w3-container  w3-center" >
<a href="zoznam.php?ludia=student" class="w3-bar-item w3-button">Zobrazit vsetkych studentov</a>
<a href="zoznam.php?ludia=ucitel" class="w3-bar-item w3-button">Zobrazit vsetkych ucitelov</a>
<?php if (!empty($_GET)) { ?>
	<table style="width:100%" class="w3-white w3-table w3-striped w3-bordered">
		<tr>
			<td><b>Meno:</b></td>
			<td><b>Priezvisko:</b></td>
			<td></td>
		</tr>
		
	<?php
	if (isset($_GET['ludia']) === true && empty ($_GET['ludia']) === false) {
		if ($_GET['ludia'] === 'student') { 
		$sql = mysql_query("SELECT `pMeno`,`Meno`,`Priezvisko` FROM `pouzivatelia` WHERE `pPravo`='3'  ORDER BY Priezvisko ASC");
		while ($hodnota=mysql_fetch_array($sql)) { ?>
		<tr>
			<td><?php echo $hodnota['Meno']; ?></td>
			<td><?php echo $hodnota['Priezvisko']; ?></td>
			<td><a href="<?php echo $hodnota['pMeno']; ?>"<i class="fa fa-address-card" style="font-size:24px"></i></a></td>
		</tr>
		
		<?php }
		} else if ($_GET['ludia'] === 'ucitel') { 
		$sql = mysql_query("SELECT `pMeno`,`Meno`,`Priezvisko` FROM `pouzivatelia` WHERE `pPravo`='2'  ORDER BY Priezvisko ASC");
		while ($hodnota=mysql_fetch_array($sql)) { ?>
		<tr>
			<td><?php echo $hodnota['Meno']; ?></td>
			<td><?php echo $hodnota['Priezvisko']; ?></td>
			<td><a href="<?php echo $hodnota['pMeno']; ?>"<i class="fa fa-address-card" style="font-size:24px"></i></a></td>
		</tr>
		<?php } 
		}
	?>
		
	</table>
	</div>
	<?php
	}
} 
include'includes/overall/footer.php'; 
?>