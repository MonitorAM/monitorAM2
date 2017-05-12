<?php 

function justificado($rut,$fecha){
	include("conex.php");
	$busca="SELECT tipoInasistencia FROM `justificado` WHERE rutEstudiante='$rut' and (desde <='$fecha' and hasta >='$fecha')";
	$result=mysql_query($busca,$enlace);
	$num_row=mysql_num_rows($result);
	if($num_row==0){
		return 0;// no tiene justificacion
	}else{
		return 1;//tiene justificacion
	}
}
function validaUsuario($rut){//busca si ya existe el usuario para no volver agregarlo
	include("conex.php");
	$busca="SELECT rut from usuario where rut='$rut'";
	$result=mysql_query($busca,$enlace);
	$fila=mysql_num_rows($result);
	if($fila>0){
		return 1;//exite el usuario
	}else{
		return 0;//no existe 
	}

}
function clasesPresentes($idEstudiante){
	include("conex.php");
	$busca="SELECT idAsistencia FROM `asistencia` where estado=1 and idEstudiante='$idEstudiante' ORDER BY `nro_clase` ASC";
	$result=mysql_query($busca,$enlace);
	return mysql_num_rows($result);
}
function buscaTransferencia($idLista){
	include("conex.php");
	$busca="SELECT clasesPresentes FROM `cambioLista` WHERE idEstudiante='$idLista'";
	$result=mysql_query($busca,$enlace);
	$row=mysql_fetch_array($result);
	$clasesPresentes=$row['clasesPresentes'];
	if($clasesPresentes==''){
		return 0;
	}else{
		return $clasesPresentes;
	}
}
function nombreCarrera($idCarrera){
	include("conex.php");
	$busca="SELECT carrera FROM carrera WHERE idCarrera='$idCarrera'";
	$result=mysql_query($busca,$enlace);
	$row=mysql_fetch_array($result);
	$carrera=$row['carrera'];
	return $carrera;
	
}
function ingresoHistorial($idEstudiante,$idCurso){
	include("conex.php");
	$buscaClase="SELECT nro_clase,fecha,prueba FROM asistencia where lista='$idCurso' GROUP by nro_clase";
	$resultBusca=mysql_query($buscaClase,$enlace) or die ("error consultar administrador");
	while($row=mysql_fetch_array($resultBusca)){
		$nro_clase=$row['nro_clase'];
		$fecha=$row['fecha'];
		$prueba=$row['prueba'];
		$insertarAsistencia="INSERT INTO asistencia(nro_clase, idEstudiante, lista, fecha, estado, prueba) VALUES ('$nro_clase','$idEstudiante','$idCurso','$fecha',0,'$prueba')";
			//echo $insertarAsistencia;
		mysql_query($insertarAsistencia,$enlace);
	}
}
function eliminaCeros($rut){
	for($i=0; $i<strlen($rut);$i++){
		if($rut[0]==0){
			$rut=substr($rut, 1);
			$nuevoRut=$rut;
		}else{
			$nuevoRut=$rut;
		}
	}
	return $nuevoRut;
}
?>