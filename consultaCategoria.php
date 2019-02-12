<?php

include("session.php");

if ($_SESSION['manager'] == true) {
    
    echo "<html>";
    echo "<head></head>";
    echo "<body>";
    echo "<form name='formulario' method='post' action='consultaCatManager.php'>";
    echo "<select name='empleado'>";
    $selectEmpleado = "SELECT emp_no, first_name FROM employees LIMIT 200;";
    $queryEmpleado = mysqli_query($db, $selectEmpleado);
    while ($arrayEmpleados = mysqli_fetch_array($queryEmpleado, MYSQLI_ASSOC)) {
					
        echo "<option value='".$arrayEmpleados['emp_no']."'>".$arrayEmpleados['first_name']."</option>";
    }
    
    echo "</select><br><br>";
    echo "<input type='submit' value='Mostrar categoria'>";
    echo "</form>";
    echo "</body>";
    echo "</html>";
} else {
    
    $selectTitulo = "SELECT title FROM titles WHERE emp_no =".$_SESSION['id']." AND to_date = '9999-01-01';";
    $queryTitulo = mysqli_query($db, $selectTitulo);
    $arrayTitulo = mysqli_fetch_array($queryTitulo);
    
    echo "La categoria a la que pertenece el empleado ".$_SESSION['login_user']." con id ".$_SESSION['id']." es ".$arrayTitulo['title'];
}

?>