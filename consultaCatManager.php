<?php

include('session.php');

$numeroEmpleado = $_POST['empleado'];

$selectTitulo = "SELECT title FROM titles WHERE emp_no = $numeroEmpleado AND to_date = '9999-01-01';";
$queryTitulo = mysqli_query($db, $selectTitulo);
$arrayTitulo = mysqli_fetch_array($queryTitulo);
    
echo "La categoria del empleado con id $numeroEmpleado es ".$arrayTitulo['title'];

?>