<?PHP
include 'conexion.php';
include 'utileria.php';

function buscaNcontrol(){
	$respuesta = false;
	$conexion = conactaBD();
	$ncontrol= GetSQLValueString($_POST["ncontrol"],"text");
	$consulta=sprintf("select * from alumnos where ncontrol=%s limit 1",$ncontrol);
	$resConsulta=mysql_query($conexion,$consulta);
	$nombre = "";
	$carrera = 0;
	$clave = "";
	if(mysql_num_rows($resConsulta) > 0){
		$respuesta = true;
		if($registro=mysqli_fetch_array($resConsulta)){
			$nombre = $registro["nombre"];
			$carrera = $registro["carrera"];
			$clave = $registro["clave"];

		}

	}
	$salida = array('respuesta' => $respuesta,
					'nombre'	=> $nombre,
					'carrera'	=> $carrera,
					'clave'		=> $clave);
}

$opc=$_POST["opc"];
switch ($opc) {
	case 'buscaNcontrol':
		guardaAlumno();
		break;
	
	default:
		# code...
		break;
}

?>