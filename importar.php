<?php  

//importar la ruta del excel
require 'PHPExcel/Classes/PHPExcel.PHP';

require 'conexion.php';

$archivos = 'interesados.xlsx';

//cargar nuestra hoja de execl
$excel = PHPExcel_IOFactory::load($archivos);

//cargamos la hoja de calculo
$excel -> setActiveSheetIndex(0);

//Obtener el numero de filas de nuestro archivo excel
$numerofila = $excel -> setActiveSheetIndex(0) -> getHighestRow();

for ($i=2; $i <= $numerofila; $i++) { 
	
	$idUsuario = $excel -> getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
	$nombres = $excel -> getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
	$interes = $excel -> getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
	$plan = $excel -> getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
	$rucodni = $excel -> getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
	$descripcion_taller = $excel -> getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
	
	$consulta = "INSERT INTO interesados_excel (idUsuario,nombres,interes,plan,rucodni,descripcion_taller) VALUE ('$idUsuario','$nombres','$interes','$plan','$rucodni','$descripcion_taller')";
	
	$resultado = $mysqli->query($consulta);

}

?>