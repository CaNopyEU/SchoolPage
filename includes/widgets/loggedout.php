<a href="index.php" ><h3 class="w3-bar-item"><b><?php echo $nazvy['nazov_s'] ?></b></h3></a>
<button onClick="document.getElementById('id01').style.display='block'" class="w3-bar-item w3-button w3-green">Prihlasit sa</button>
<div id="id01" class="w3-modal">
	<div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
  		<div class="w3-center"><br>
		<span onClick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Zavriet okno">X</span>
		</div>
<form class="w3-container" action="login.php">
		<div class="w3-section">
		<form action="login.php" method="post">
    		<label><b>Prihlasovacie meno :</b>
        	<input class="w3-input w3-border w3-margin-bottom" type="text"  value="" name="pMeno" required></label>
        	<label><b>Heslo :</b>
        	<input class="w3-input w3-border" type="password" value="" name="pHeslo" required></label>
        	<button class="w3-button w3-block w3-green w3-section w3-padding" type="submit" formmethod="post">Prihlasit</button>		
		</div>	
</form>
		<div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
		<button onClick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">Zrusit</button>
		</div>
	</div>
</div>
  