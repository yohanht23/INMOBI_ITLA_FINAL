<?php session_start(); ?>
<?php $con = mysqli_connect("sql301.epizy.com", "epiz_19228730", "isocrates", "epiz_19228730_usuarios") or die("Error al conectar a la base de datos!"); ?>
<?php 
	
	if(isset($_SESSION["admin"])){
		header("Location:admin.php");
	}

?>
<?php 

$sql70 = "SELECT * FROM anuncios ORDER BY id DESC";
foreach($con->query($sql70) as $row70){

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'includes/head_meta.php'; ?>
	<title>Modo mapa - Bienvenido</title>
</head>
<body>
	<span class="h_id_usuario" id="h_id_usuario" hidden="true"></span>
	<?php 
	if(isset($_SESSION["id"])){
		require 'includes/header_user.php';
	}else{
		require 'includes/header_no_user.php';
	}
	?>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<ol class="breadcrumb">
					<div class="container">
						<a class="breadcrumb-item" href="./">INMOBITLA</a>
						<span class="breadcrumb-item active">Modo Mapa</span>
					</div>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div id="map" style="height: 480px;"></div>
			</div>
		</div>
	</div>
	<br>
	<div id="result"></div>

	<script>
		var map;
		var infoWindow;
		var service;

		function initMap() {
			var bounds = new google.maps.LatLngBounds();

			map = new google.maps.Map(document.getElementById('map'), {
				center: {lat: -33.867, lng: 151.206},
				zoom: 15,
				styles: [{
					stylers: [{ visibility: 'simplified' }]
				}, {
					elementType: 'labels',
					stylers: [{ visibility: 'off' }]
				}]
			});

			infoWindow = new google.maps.InfoWindow();
			service = new google.maps.places.PlacesService(map);

			<?php
			$getpoints = "SELECT titulo, lat, lng 
			FROM anuncios ORDER BY id DESC";

			if(!$result = $con->query($getpoints)){
				die('There was an error running the query 
					[' . $con->error . ']');
			} else {
				while ($row = $result->fetch_assoc()) {
					echo '  var myLatlng1 = new google.maps.LatLng('.
					$row['lat'].', '.$row['lng'].'); 
					var marker1 = new google.maps.Marker({ 
						position: myLatlng1, 
						map: map, 
						title:"'.$row['titulo'].'"
					});';

					?>
					google.maps.event.addListener(marker1, 'click', function() {
						infoWindow.setContent("<a>"+"<?php echo $row["titulo"]; ?>"+"</a>");
						infoWindow.open(map, this);
					});
					<?php
				}
			}
			?>			

			bounds.extend(marker1.position);
			map.fitBounds(bounds);
		}
	</script>

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCH7BUCoBIt3AFY6_ertXOw-Hh60bVeFHw&libraries=places&callback=initMap"
	async defer></script>
</body>
</html>