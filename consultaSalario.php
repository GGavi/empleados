<?php

include('session.php');

if ($_SESSION['manager'] == true) {
    
    echo "<html>";
    echo "<head></head>";
    echo "<body>";
    echo "<form name='formulario' method='post' action='consultaSalarioManager.php'>";
    echo "<select name='empleado'>";
    $selectEmpleado = "SELECT emp_no, first_name, last_name FROM employees ORDER BY emp_no LIMIT 2000;";
    $queryEmpleado = mysqli_query($db, $selectEmpleado);
    while ($arrayEmpleados = mysqli_fetch_array($queryEmpleado, MYSQLI_ASSOC)) {
					
        echo "<option value='".$arrayEmpleados['emp_no']."'>".$arrayEmpleados['first_name'].' '.$arrayEmpleados['last_name']."</option>";
    }
    
    echo "</select><br><br>";
    echo "<input type='submit' value='Mostrar salario'>";
    echo "</form>";
    echo "</body>";
    echo "</html>";
} else {
    
    $selectSalario = "SELECT salary FROM salaries WHERE emp_no =".$_SESSION['id']." AND to_date = '9999-01-01';";
    $querySalario = mysqli_query($db, $selectSalario);
    $arraySalario = mysqli_fetch_array($querySalario);
    
    echo "El salario del empleado ".$_SESSION['login_user']." con id ".$_SESSION['id']." es ".$arraySalario['salary'];
}

?>