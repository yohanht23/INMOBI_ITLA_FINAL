<?php $con = mysqli_connect("localhost", "root", "admin", "usuarios"); ?>

<?php 
	
	$pdo = "SELECT lat, lng FROM anuncios ORDER BY id DESC";
	$result = mysqli_query($con, $pdo);

	while($rop = mysqli_fetch_assoc($result)){
		$locations[] = $rop;
	}

	echo json_encode($locations);


?>