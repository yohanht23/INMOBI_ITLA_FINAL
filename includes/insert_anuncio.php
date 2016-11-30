<?php 
$con = mysqli_connect("sql301.epizy.com", "epiz_19228730", "isocrates", "epiz_19228730_usuarios") or die("Error al conectar a la base de datos!");
if(isset($_POST["submit"])){

	//LOGICA PARA INSERTAR DATOS EN LA BASE DE DATOS

	/* ----------------------------------------------------------
	* Datos del anuncio
	* Todas las variables que almacenan los datos del formulario
	------------------------------------------------------------ */	
	 

	//--- Paso 1 ---//
	$titulo = $_POST["titulo"];
	$direccion = $_POST["direccion"];
	$categoria = $_POST["categoria"];
	$precio = $_POST["precio"];
	$accion = $_POST["accion"];
	$descripcion = $_POST["descripcion"];
	$ubicacion = $_POST["ubicacion"];
	$id_usuario = $_SESSION["id"];
	$lat = $_POST["lat"];
	$lng = $_POST["lng"];

	//--- Paso 2 ---//
	//$id_usuario = $_POST["id_usuario"];

	//--- Paso 3 ---//
	$target = "includes/uploads/";
	$img1 = $target . basename($_FILES['img1']['name']);
	$img2 = $target . basename($_FILES['img2']['name']);
	$img3 = $target . basename($_FILES['img3']['name']);
	$img4 = $target . basename($_FILES['img4']['name']);
	$img5 = $target . basename($_FILES['img5']['name']);
	$img6 = $target . basename($_FILES['img6']['name']);
	$img7 = $target . basename($_FILES['img7']['name']);
	$img8 = $target . basename($_FILES['img8']['name']);
	$img9 = $target . basename($_FILES['img9']['name']);
	$img10 = $target . basename($_FILES['img10']['name']);

	//Subiendo imagenes
	move_uploaded_file($_FILES['img1']['tmp_name'], $img1);
	move_uploaded_file($_FILES['img2']['tmp_name'], $img2);
	move_uploaded_file($_FILES['img3']['tmp_name'], $img3);
	move_uploaded_file($_FILES['img4']['tmp_name'], $img4);
	move_uploaded_file($_FILES['img5']['tmp_name'], $img5);
	move_uploaded_file($_FILES['img6']['tmp_name'], $img6);
	move_uploaded_file($_FILES['img7']['tmp_name'], $img7);
	move_uploaded_file($_FILES['img8']['tmp_name'], $img8);
	move_uploaded_file($_FILES['img9']['tmp_name'], $img9);
	move_uploaded_file($_FILES['img10']['tmp_name'], $img10);

	//Insertando los datos
	$sql = "INSERT INTO anuncios(titulo, direccion, categoria, precio, accion, descripcion, ubicacion, lat, lng, img1, img2, img3, img4, img5, img6, img7, img8, img9, img10, id_usuario) VALUES('$titulo', '$direccion', '$categoria', '$precio', '$accion', '$descripcion', '$ubicacion', '$lat', '$lng', '$img1', '$img2', '$img3', '$img4', '$img5', '$img6', '$img7', '$img8', '$img9', '$img10', '$id_usuario')";
	$query = mysqli_query($con, $sql);

	if($query){
		echo "<script>alert('Anuncio agregado!');</script>";
		header("Location:./");
	}else{
		echo "<script>alert('ERROR LOL!!');</script>";
	}
}

?>