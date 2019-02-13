<?php
	include("session.php");
?>


<html>
	<head>
		
	</head>
	<body>
		<h1>CAMBIO DE DEPARTAMENTO</h1>
		<form name="mi_formulario" action="cambioDepartamento.php" method="post">
		
		Selecciona el empleado que quieres cambiar de departamento: <select name="numeroEmpleado">
			
			<?php
				
				$selectEmpleado = "SELECT emp_no, first_name, last_name FROM employees ORDER BY emp_no LIMIT 2000;";
				$queryEmpleado = mysqli_query($db, $selectEmpleado);
				while ($arrayEmpleados = mysqli_fetch_array($queryEmpleado, MYSQLI_ASSOC)) {
					
					echo "<option value='".$arrayEmpleados['emp_no']."'>".$arrayEmpleados['first_name'].' '.$arrayEmpleados['last_name']."</option>";
				}
			?>
		</select><br><br>
		
		Selecciona el departamento al que quieres cambiarlo: <select name="departamento">
			
			<?php
		
				$selectDepartamento = "SELECT dept_name FROM departments;";
				$queryDepartamento = mysqli_query($db, $selectDepartamento);
				while ($arrayDepartamentos = mysqli_fetch_array($queryDepartamento)) {
					
					echo "<option value='".$arrayDepartamentos['dept_name']."'>".$arrayDepartamentos['dept_name']."</option>";
				}
			?>
		</select><br><br>
		
		<input type="submit" value="Cambiar empleado de departamento">
		</form>
	</body>	
</html>