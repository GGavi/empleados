<?php

include('session.php');

$numeroEmpleado = $_POST['empleado'];

$selectSalario = "SELECT salary FROM salaries WHERE emp_no = $numeroEmpleado AND to_date = '9999-01-01';";
$querySalario = mysqli_query($db, $selectSalario);
$arraySalario = mysqli_fetch_array($querySalario);
    
echo "El salario del empleado con id $numeroEmpleado es ".$arraySalario['salary'];

?>