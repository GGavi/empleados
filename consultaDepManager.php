<?php

include('session.php');

$numeroEmpleado = $_POST['empleado'];

$selectDepartamento = "SELECT dept_no FROM dept_emp WHERE emp_no = $numeroEmpleado AND to_date = '9999-01-01';";
$queryDepartamento = mysqli_query($db, $selectDepartamento);
$arrayDepartamento = mysqli_fetch_array($queryDepartamento);
    
$numDept = $arrayDepartamento['dept_no'];
    
$selectNombDep = "SELECT dept_name FROM departments WHERE dept_no = '$numDept';";
$queryNombDep = mysqli_query($db, $selectNombDep);
$arrayNombDep = mysqli_fetch_array($queryNombDep);
    
echo "El departamento al que pertenece el empleado con id $numeroEmpleado es ".$arrayNombDep['dept_name'];

?>