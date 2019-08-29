<?php 
include'core/init.php';
include'includes/overall/header.php';
if (isset($_GET['id_gal'])){
$id_gallery = $_GET['id_gal'];
	if (!empty($session_user_id)) {
		if (has_access($session_user_id, 1) === true) {
			if (isset($_FILES['file']) === true) {
				if (empty($_FILES['file']['name']) === true) {
						echo 'Prosim vyberte subor!';
						} else {
						
								$file = $_FILES['file'];
								
													
								$file_name 	= $file['name'];
								$file_temp 	= $file['tmp_name'];
								$file_error = $file['error'];
								
								$file_extn = strtolower(end(explode('.', $file_name)));
								
								$allowed = array('jpg', 'jpeg', 'gif', 'png');
								
								if (in_array($file_extn, $allowed) === true) {
									if ($file_error === 0){
										
										insert_in_gallery($file_temp, $file_extn, $id_gallery);
										header('Location: obrazky.php?id_gal='.$id_gallery);
										
									}
							   }
				        } 
			}
	?>
	<form action="#"  method="post" enctype="multipart/form-data">    
  	<table align="left" style="width:100%">
    	<tr>
			<td>Vyberte obrazok:</td>
		</tr>
		<tr>
    	  <td><input type="file" name="file" value="" size="25"/></td>
    	  <td><input type="submit" name="submit" value="Pridat dokument" /></td>
      	</tr>
  	</table>
	</form>



<?php
	} } } 
		
?>
	
	<div class="w3-container w3-light-grey w3-center">
<div class="w3-content w3-display-container" style="max-width:800px">

<?php  $sql = mysql_query("SELECT * FROM obrazky WHERE id_gal='$id_gallery' ");
								 while($hodnota=mysql_fetch_array($sql)){
                                  ?> 


<img class="mySlides w3-animate-opacity" src="<?php echo $hodnota['cesta']?>" style="width:100%">
<?php } 

?>
<a class="w3-button w3-theme w3-display-left" onClick="plusDivs(-1)"><</a>
<a class="w3-button w3-theme w3-display-right" onClick="plusDivs(+1)">></a>
</div>
 <br>
</div><script>
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