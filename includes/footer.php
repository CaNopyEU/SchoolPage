<footer class="w3-padding-64 w3-grey w3-small w3-center" id="footer">
	<div class="w3-row">
    	<h4>Kontakt</h4>
		<?php $nazov1 = mysql_fetch_array(mysql_query("SELECT * FROM nazov WHERE id_nazvu='2'"));
			  $nazov2 = mysql_fetch_array(mysql_query("SELECT * FROM nazov WHERE id_nazvu='3'"));
			  ?>
        <p><i class="fa fa-fw fa-map-marker"></i><?php echo $nazov1['nazov_c'] ?></p>
        <p><i class="fa fa-fw fa-phone"></i><?php echo $nazov1['nazov_s'] ?></p>
		<p><i class="fa fa-fw fa-fax"></i><?php echo $nazov1['fb_page'] ?></p>
		<p><i class="fa fa-fw fa-phone"></i><?php echo $nazov1['os_adm'] ?></p>
        <p><i class="fa fa-fw fa-envelope"></i><?php echo $nazov2['nazov_c'] ?></p>
	</div>
</footer>
