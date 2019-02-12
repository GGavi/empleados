<?php

include("session.php");

$nEmpleado = $_POST['numeroEmpleado'];
$nDepartamento = $_POST['departamento'];
$fechaActual = date('Y-m-d');
$fechaFinal = '9999-01-01';

if (updateEmpleado($db, $nEmpleado, $fechaActual, $nDepartamento, $fechaFinal)) {
	
	if (insertNuevo($db, $nEmpleado, $nDepartamento, $fechaActual, $fechaFinal)) {
		
		echo "La operacion se ha realizado correctamente";
		mysqli_commit($db);
	} else {
		
		echo "Ha habido un problema al insertar el neuvo empleado en el departamento";
		mysqli_rollback($db);
	}
} else {
	
	echo "Ha habido un problema al actualizar el empleado";
	mysqli_rollback($db);
}

function updateEmpleado($db, $nEmpleado, $fechaActual, $nDepartamento, $fechaFinal) {
	
	$selectNumDept = "SELECT dept_no FROM departments WHERE dept_name = '$nDepartamento';";
	$queryNumDept = mysqli_query($db, $selectNumDept);
	$arrayDept = mysqli_fetch_array($queryNumDept, MYSQLI_ASSOC);
	$numeroDepartamento = $arrayDept['dept_no'];
	
	$selectEmpDept = "SELECT dept_no FROM dept_emp WHERE emp_no = '$nEmpleado' AND to_date = '$fechaFinal';";
	$queryEmpDept = mysqli_query($db, $selectEmpDept);
	$arrayEmpDept = mysqli_fetch_array($queryEmpDept);
	
	if ($arrayEmpDept['dept_no'] == $numeroDepartamento) {
		
		echo "El empleado que estas intentando cambiar ya se encuentra en el departamento indicado";
		die();
	} else {
	
		$valido = true;
	
		$updateActual = mysqli_prepare($db, "UPDATE dept_emp SET to_date = ? WHERE emp_no = ?;");
		mysqli_stmt_bind_param($updateActual, 'si', $fechaActual, $nEmpleado);

		if (!mysqli_stmt_execute($updateActual)) {

			$valido = false;
		}

		return $valido;
	}
}

function insertNuevo($db, $nEmpleado, $nDepartamento, $fechaActual, $fechaFinal) {
	
	$valido = true;
	
	$insertNuevo = mysqli_prepare($db, "INSERT INTO dept_emp(emp_no, dept_no, from_date, to_date) VALUES(?,?,?,?);");
	$selectNumDept = "SELECT dept_no FROM departments WHERE dept_name = '$nDepartamento';";
	$queryNumDept = mysqli_query($db, $selectNumDept);
	$arrayDept = mysqli_fetch_array($queryNumDept, MYSQLI_ASSOC);
	$numeroDepartamento = $arrayDept['dept_no'];

	mysqli_stmt_bind_param($insertNuevo, 'isss', $nEmpleado, $numeroDepartamento, $fechaActual, $fechaFinal);
	
	if (!mysqli_stmt_execute($insertNuevo)) {
		
		$valido = false;
	}
	
	return $valido;
}

?>