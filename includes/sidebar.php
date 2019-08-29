<?php ob_start(); ?>
<sidebar>
<nav class="w3-sidebar w3-card-4 w3-center w3-bar-block  w3-collapse w3-animate-left" style="z-index:3;width:230px" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-16">
    <i onClick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
  </div>
  
<!-- login -->

		<?php  if (logged_in() === true) {
    include'includes/widgets/loggedin.php';
  }
  else {
    include'includes/widgets/loggedout.php';
  }
?>
  				
	
  <!-- end login / FB page-->
  <a href="<?php echo $nazvy['fb_page'] ?>" class="w3-bar-item w3-button w3-padding w3-indigo"><i class="fa fa-facebook-official w3-hover-opacity"></i> Facebook skoly </a>
  </div>
  </div>
</nav>


<!-- Top menu on small screens -->
<header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
  <div class="w3-bar-item w3-padding-24 w3-wide"><?php echo $nazvy['nazov_s'] ?></div>
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onClick="w3_open()"><i class="fa fa-bars"></i></a>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onClick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
</sidebar>