<?php 

	class Modelo_Excel
	{
		private $conexion;

		function __construct()
		{
			require_once 'modelo_conexion.php';
			$this->conexion = new conexion();
			$this->conexion->conectar();
		}

		function Registrar_Excel($idUsuario,$nombres,$interes,$plan,$rucodni,$descripcion_taller){
			
			$sql = "CALL REGISTRAR_INTERESADO ('$idUsuario','$nombres','$interes','$plan','$rucodni','$descripcion_taller')";

			if ($resultado = $this->conexion->conexion->query($sql)){
				$id_retornado = mysqli_insert_id($this->conexion->conexion);
				return 1;
			}
			else{
				return 0;
			}
			$this->conexion->Cerrar_Conexion();
		}
	}

?>