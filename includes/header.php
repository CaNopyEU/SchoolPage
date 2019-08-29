<header id="portfolio">
<div class="">
	<div class="w3-container w3-light-grey w3-card-4" >
    	<h1><b><?php echo $nazvy['nazov_c'] ?></b></h1>
		<a href="index.php" class="w3-bar-item w3-button w3-white w3-card-2">DOMOV</a>
		<a href="historia.php" class="w3-bar-item w3-button w3-white w3-card-2"><?php echo $historia['nazov_s']; ?></a>
		<a href="galeria.php" class="w3-bar-item w3-button w3-white w3-card-2"><?php echo $galeria['nazov_s'];  ?></a>
		<a href="dokumenty.php" class="w3-bar-item w3-button w3-white w3-card-2"><?php echo $dokument['nazov_s']; ?></a>
		<div class="w3-dropdown-hover">
			<button class="w3-button w3-white w3-card-2"><?php echo $volny_cas['nazov_s'];  ?><i class="fa fa-caret-down"></i></button>
			<div class="w3-dropdown-content w3-bar-block w3-border">
			<?php $nazov2 = mysql_fetch_array(mysql_query("SELECT * FROM nazov WHERE id_nazvu='4'")); ?> 
				<a href="volnyCas.php?podm=projekt" class="w3-bar-item w3-button w3-white w3-card-2"><?php echo $nazov2['nazov_s'] ?></a>
				<a href="volnyCas.php?podm=uspech" class="w3-bar-item w3-button w3-white w3-card-2"><?php echo $nazov2['fb_page'] ?></a>
				<a href="volnyCas.php?podm=sklub" class="w3-bar-item w3-button w3-white w3-card-2"><?php echo $nazov2['os_adm'] ?></a>
			</div>
		</div>
		<a href="rozvrh.php" class="w3-bar-item w3-button w3-white w3-card-2"><?php echo $rozvrh['nazov_s'];  ?></a>
		<a href="jlistok.php" class="w3-bar-item w3-button w3-white w3-card-2"><?php echo $jlistok['nazov_s'];  ?></a>
		<br />
		<br />
	</div>	
</div>
 </header>