<?php
include 'conexion.php';
include 'utileria.php';
function consulta(){
	$respuesta = false;
	$conexion=conexionBD();
	$consulta=sprintf("select * from alumnos");
	$resConsulta=mysqli_query($conexion,$consulta);
	$tabla="<tr><th>Nombre</th><th>Carrera</th></tr>";
	if(mysqli_num_rows($resConsulta) > 0){
		$respuesta=true;
		while($registro=mysqli_fetch_array($resConsulta))
		{
			$tabla.="<tr>";
			$tabla.="<th>".$registro["nombre"]."</th>";
			$tabla.="<th>".$registro["carrera"]."</th>";
			$tabla.="</tr>";
		}
	}
	$salida = array('respuesta' => $respuesta,
					'tabla' 	=> $tabla);
}
$opc=$_POST["opc"];
switch ($opc) {
	case 'consulta':
		consulta();
		break;
	
	default:
		# code...
		break;
}

?>