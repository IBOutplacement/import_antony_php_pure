<?php  

	require 'modelo_excel.php';

	$ME = new Modelo_Excel();

	$idUsuario = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
	$nombres = htmlspecialchars($_POST['n'],ENT_QUOTES,'UTF-8');
	$interes = htmlspecialchars($_POST['i'],ENT_QUOTES,'UTF-8');
	$plan = htmlspecialchars($_POST['p'],ENT_QUOTES,'UTF-8');
	$rucodni = htmlspecialchars($_POST['r'],ENT_QUOTES,'UTF-8');
	$descripcion_taller = htmlspecialchars($_POST['d'],ENT_QUOTES,'UTF-8');

	//Cuando encuentra una, separa y convierte en arreglo
	$array_idUsuario = explode(",",$idUsuario);
	$array_nombres = explode(",",$nombres);
	$array_interes = explode(",",$interes);
	$array_plan = explode(",",$plan);
	$array_rucodni = explode(",",$rucodni);
	$array_descripcion_taller = explode(",",$descripcion_taller);

	for ($i=0; $i < count($array_idUsuario); $i++) { 
		$consulta = $ME -> Registrar_Excel($array_idUsuario[$i],$array_nombres[$i],$array_interes[$i],$array_plan[$i],$array_rucodni[$i],$array_descripcion_taller[$i]);
	}

?>