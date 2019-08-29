<h5 class="w3-bar-item"><b><?php echo $nazvy['os_adm'] ?></b></h5>

<p class="w3-text-white w3-dark-gray w3-bar-item ">Vitajte <b><?php echo $user_data['Meno'];?></b></p>

<?php 
if (has_access($session_user_id, 1) === true) {
	echo '<a href="sprava_p.php" class="w3-bar-item w3-button">Sprava pouzivatelov</a>';
	echo '<a href="registracia.php" class="w3-bar-item w3-button">Ragistracia noveho pouzivatela</a>';
	echo '<a href="nast_stranky.php" class="w3-bar-item w3-button">Nastavenia stranky</a>';
	echo '<a href="predmety.php?predmet=1" class="w3-bar-item w3-button">Triedy a predmety</a>';
	echo '<a href="test.php" class="w3-bar-item w3-button">Pridat predmet</a>';
} else if (has_access($session_user_id, 2) === true) { ?>
	<a href="<?php echo $user_data['pMeno'];?>" class="w3-bar-item w3-button w3-white">Moj Profil</a>
	<a href="zoznam.php" class="w3-bar-item w3-button w3-orange">Ludia na skole</a>
	<a href="ziacka_triedy.php" class="w3-bar-item w3-button w3-green">Zapis znamok a DU</a> <?php
} else if (has_access($session_user_id, 3) === true) { ?>
	
	<a href="<?php echo $user_data['pMeno'];?>" class="w3-bar-item w3-button w3-white">Moj Profil</a>
	<a href="zoznam.php" class="w3-bar-item w3-button w3-orange">Ludia na skole</a>
	<a href="ziacka_knizka.php" class="w3-bar-item w3-button w3-green">Moja ziacka knizka</a> <?php
}
?>
<a href="domace_ulohy.php" class="w3-bar-item w3-button w3-blue">Domace ulohy</a>
<a href="logout.php" class="w3-bar-item w3-button w3-red">Odhlasit sa</a>
