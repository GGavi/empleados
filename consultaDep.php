<?php

include("session.php");

if ($_SESSION['manager'] == true) {
    
    echo "<html>";
    echo "<head></head>";
    echo "<body>";
    echo "<form name='formulario' method='post' action='consultaDepManager.php'>";
    echo "<select name='empleado'>";
    $selectEmpleado = "SELECT emp_no, first_name FROM employees LIMIT 200;";
    $queryEmpleado = mysqli_query($db, $selectEmpleado);
    while ($arrayEmpleados = mysqli_fetch_array($queryEmpleado, MYSQLI_ASSOC)) {
					
        echo "<option value='".$arrayEmpleados['emp_no']."'>".$arrayEmpleados['first_name']."</option>";
    }
    
    echo "</select><br><br>";
    echo "<input type='submit' value='Mostrar departamento'>";
    echo "</form>";
    echo "</body>";
    echo "</html>";
} else {
    
    $selectDepartamento = "SELECT dept_no FROM dept_emp WHERE emp_no =".$_SESSION['id']." AND to_date = '9999-01-01';";
    $queryDepartamento = mysqli_query($db, $selectDepartamento);
    $arrayDepartamento = mysqli_fetch_array($queryDepartamento);
    
    $numDept = $arrayDepartamento['dept_no'];
    
    $selectNombDep = "SELECT dept_name FROM departments WHERE dept_no = '$numDept';";
    $queryNombDep = mysqli_query($db, $selectNombDep);
    $arrayNombDep = mysqli_fetch_array($queryNombDep);
    
    echo "El departamento al que pertenece el empleado ".$_SESSION['login_user']." con id ".$_SESSION['id']." es ".$arrayNombDep['dept_name'];
}

?>