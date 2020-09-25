<?php  

	if (is_array($_FILES['archivoexcel']) && count($_FILES['archivoexcel'])>0) {

		//llamamos a la libreria
		require_once 'PHPExcel(Clases/PHPExcel.php';
		//llamamos a la conexion
		require_once 'conexion.php';
		
		$tmpfname = $_FILES ['archivoexcel']['tmp_name'];
		//se crea el excel para luego leerlo
		$leerexcel = PHPExcel_IOFactory::createdReaderForfile($tmpfname);

		//cargar el excel
		$excelobj = $leerexcel->load($tmpfname);

		//indicar en que hoja de calculo se hubica
		$hoja = excelobj -> getSheet(0);
		$filas = $hoja->getHighestRow();

		echo $filas;
	}

?>