<?php

include('session.php');

$nEmpleado = $_POST['numeroEmpleado'];
$salario = $_POST['salario'];
$salario = (int)$salario;

if (modificarSalario($db, $nEmpleado, $salario)) {
	
	echo "El salario se ha actualizado correctamente";
	mysqli_commit($db);
} else {
	
	echo "Ha habido algun problema al ejecutar la operacion";
	mysqli_rollback($db);
}

function modificarSalario($db, $nEmpleado, $salario) {
	
	$valido = true;
	$fechaActual = date('Y-m-d');
	$fechaFinal = '9999-01-01';
	
	$updateSalario = mysqli_prepare($db, "UPDATE salaries SET to_date = ? WHERE emp_no = ? AND to_date = ?;");
	mysqli_stmt_bind_param($updateSalario, 'sis', $fechaActual, $nEmpleado, $fechaFinal);
	
	$insertSalario = mysqli_prepare($db, "INSERT INTO salaries(emp_no, salary, from_date, to_date) VALUES(?,?,?,?);");
	mysqli_stmt_bind_param($insertSalario, 'iiss', $nEmpleado, $salario, $fechaActual, $fechaFinal);
	
	if (!mysqli_stmt_execute($updateSalario)) {
		
		$valido = false;
		return $valido;
	} else if (!mysqli_stmt_execute($insertSalario)) {
		
		$valido = false;
		return $valido;
	} else {
		
		return $valido;
	}
}

?>