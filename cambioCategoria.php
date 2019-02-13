<?php

include("session.php");

$numeroEmpleado = $_POST['numeroEmpleado'];
$tituloNuevo = $_POST['titulo'];
$fechaActual = date('Y-m-d');

if (comprobarTitulo($db, $numeroEmpleado, $tituloNuevo)) {
	
	if (updateTitulo($db, $numeroEmpleado, $fechaActual)) {
	
		if (insertTitulo($db, $numeroEmpleado, $tituloNuevo, $fechaActual)) {
		
			echo "La operacion ha sido realizada con exito";
			mysqli_commit($db);
		} else {
		
			echo "Ha habido un error al procesar la operacion";
			mysqli_rollback($db);
		}
	} else {
	
		echo "Ha habido un error al procesar la operacion";
		mysqli_rollback($db);
	}
} else {
	
	echo "El empleado ya ha estado en ese titulo, no se puede realizar la accion";
	mysqli_rollback($db);
}


function comprobarTitulo($db, $numeroEmpleado, $tituloNuevo) {
	
	$valido = true;
	
	$selectTitulo = "SELECT title FROM titles WHERE emp_no = $numeroEmpleado AND title = '$tituloNuevo';";
	$queryTitulo = mysqli_query($db, $selectTitulo);
	$arrayTitulo = mysqli_fetch_array($queryTitulo);
	
	if ($arrayTitulo != null) {
		
		$valido = false;
		return $valido;
	} else {
		
		return $valido;
	}
}

function updateTitulo($db, $numeroEmpleado, $fechaActual) {
	
	$valido = true;
	$updateTitulo = mysqli_prepare($db, "UPDATE titles SET to_date = ? WHERE to_date = '9999-01-01' AND emp_no = $numeroEmpleado;");
	mysqli_stmt_bind_param($updateTitulo, 's', $fechaActual);
	
	if (!mysqli_stmt_execute($updateTitulo)) {
		
		$valido = false;
		return $valido;
	} else {
		
		return $valido;
	}
}

function insertTitulo($db, $numeroEmpleado, $tituloNuevo, $fechaActual) {
	
	$valido = true;
	$fecha = '9999-01-01';
	$insertTitulo = mysqli_prepare($db, "INSERT INTO titles(emp_no, title, from_date, to_date) VALUES(?,?,?,?);");
	mysqli_stmt_bind_param($insertTitulo, 'isss', $numeroEmpleado, $tituloNuevo, $fechaActual, $fecha);
	
	if (!mysqli_stmt_execute($insertTitulo)) {
		
		$valido = false;
		return $valido;
	} else {
		
		return $valido;
	}
}

?>