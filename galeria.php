<?php 
include'core/init.php';
include'includes/overall/header.php';
if (!empty($session_user_id)) {
	if (has_access($session_user_id, 1) === true) {
		if (isset($_GET['success']) && empty($_GET['success'])) {
		echo 'Pridanie galerie prebehlo uspesne!';
	} else {
			if (empty($_POST) === false && empty($errors) === true) {
			$register_data	= array(
				'nazov'		=> $_POST['nazov'],
				'date' 		=> $_POST['date'],
				);
				
				add_gallery($register_data);
				header('Location: galeria.php?success');
				exit();
				
				} else if (empty ($errors) === false) {
			echo output_errors($errors);
		} 	
?>
	<h4>Pridat galeriu:</h4>
	<form action="#"  method="post" >     
  	<table align="left" >
    	<tr>
    	  <td>Nazov galerie: </td>
    	  <td><input type="text" name="nazov" value="" size="25"/></td>
    	</tr>
		<tr>
    	  <td>Datum akcie/vytvorenia galerie:</td>
    	  <td><input type="date" name="date" value="" size="25"/></td>
    	</tr>
		<tr>
    	  <td><input type="submit" name="submit" value="Vytvorit galeriu" /></td>
      	</tr>
  	</table>
	</form>
	<br /> <br /><br /> <br /><br /> <br />
<?php 	} 
	}
}?>


<div class="w3-responsive w3-card-4">
<table class="w3-table w3-striped w3-bordered">
<thead>
<tr class="w3-theme">
  <th>Galerie udalosti</th>
  <th>Datum udalosti</th>
</tr>
</thead>
<tbody>
<?php $sql = mysql_query("SELECT * FROM galeria");
	while($hodnota=mysql_fetch_array($sql)) { ?>
<tr>
  <td><a href="obrazky.php?id_gal=<?php echo $hodnota['id_gal'] ?>"><?php echo $hodnota['nazov']?></a></td>
  <td><?php echo $hodnota['date'] ?></td>
  	  <?php	if (!empty($session_user_id)) {
				if (has_access($session_user_id, 1) === true) { ?>
		<td><a href="zmazat_galeriu.php?del=<?php echo $hodnota['id_gal']?>" onClick="return confirm('Ste si istý, že chcete vymazat daný obsah?');">Zmazat galeriu</a></td> 
</tr>
 <?php }
 	}
}?>
</tbody>
</table></div>
<br  /><br  />
<script>
var slideIndex = 1;

function plusDivs(n) {
slideIndex = slideIndex + n;
showDivs(slideIndex);
}

function showDivs(n) {
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length} ;
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}

showDivs(1);

// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}
</script>
<?php include'includes/overall/footer.php'; ?>