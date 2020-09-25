<?php  

	if (is_array($_FILES['archivoexcel']) && count($_FILES['archivoexcel'])>0) {

		//llamamos a la libreria
		require_once 'PHPExcel/Classes/PHPExcel.php';
		//llamamos a la conexion
		require_once 'conexion.php';
		
		$tmpfname = $_FILES['archivoexcel']['tmp_name'];
		//se crea el excel para luego leerlo
		$leerexcel = PHPExcel_IOFactory::createReaderForFile($tmpfname);

		//cargar el excel
		$excelobj = $leerexcel->load($tmpfname);

		//indicar en que hoja de calculo se hubica
		$hoja = $excelobj -> getSheet(0);
		$filas = $hoja->getHighestRow();

		echo "<table id='tabla_detalle' class='table' style='width:100%;'; table-layout:fixed'>

		<thead>
			<tr bgcolor='black' style='color:#ffffff'>
				<td>idUsuario</td>
				<td>nombres</td>
				<td>interes</td>
				<td>plan</td>
				<td>rucodni</td>
				<td>descripcion_taller</td>
			</tr>
		</thead>

		<tbody id='tbody_tabla_detalle'>";

		for($row = 2; $row<=$filas;$row++)
		{
			$idUsuario = $hoja -> getCell('A'.$row)->getValue();
			$nombres = $hoja -> getCell('B'.$row)->getValue();
			$interes = $hoja -> getCell('C'.$row)->getValue();
			$plan = $hoja -> getCell('D'.$row)->getValue();
			$rucodni = $hoja -> getCell('E'.$row)->getValue();
			$descripcion_taller = $hoja -> getCell('F'.$row)->getValue();

			echo "<tr>";
			echo "<td>".$idUsuario."</td>";
			echo "<td>".$nombres."</td>";
			echo "<td>".$interes."</td>";
			echo "<td>".$plan."</td>";
			echo "<td>".$rucodni."</td>";
			echo "<td>".$descripcion_taller."</td>";
			echo "</tr>";
		}

		echo "</body></table>";
	}

?>