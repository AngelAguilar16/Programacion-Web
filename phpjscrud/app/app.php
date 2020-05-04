<?php 

	namespace app;

	require_once "autoload.php";

	use Controllers\ControllerPais;
	use Controllers\ControllerCiudad;

	//**************PAIS
	$paises = in_array('paises', array_keys($_GET));

	if($paises){
		print_r(ControllerPais::listar());
		//forma alternativa (más clara pero con más código)
		//$paisesListar = new ControllerPais;
		//print_r($paisesListar->listar());
	}

	//**************CIUDADES
	$ciudades = in_array('ciudades', array_keys($_GET));

	if($ciudades){
		$cuales = $_GET['cc'];
		print_r(ControllerCiudad::listar($cuales));
	}

	if(isset($_POST['nuevaciudad'])){
		$datos = $_POST;
		array_pop($datos);	
		echo ControllerCiudad::insertar($datos);
	}

	if(isset($_POST['idciudad'])){
		$datos = $_POST;
		echo ControllerCiudad::insertar($datos);
	}

	$ciudadEliminar = in_array('ciudadEliminar', array_keys($_GET));

	if($ciudadEliminar){
		$id = $_GET['idciudad'];
		//echo "Respuesta eliminar";
		echo ControllerCiudad::eliminar($id);
	}

	$ciudad = in_array('ciudad',array_keys($_GET));
	if($ciudad){
		$idciudad = $_GET['id'];
		echo ControllerCiudad::buscar($idciudad);
	}

exit();