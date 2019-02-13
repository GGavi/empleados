<?php
	include("session.php");
?>

<html>
	<head>
		
	</head>
	<body>
		<h1>CAMBIO DE SALARIO</h1>
		<form name="mi_formulario" action="cambioSalario.php" method="post">
		
			Selecciona el empleado al que quieres cambiar el sueldo: <select name="numeroEmpleado">
				
				<?php
				$selectEmpleado = "SELECT emp_no, first_name, last_name FROM employees ORDER BY emp_no LIMIT 2000;";
				$queryEmpleado = mysqli_query($db, $selectEmpleado);
				while ($arrayEmpleados = mysqli_fetch_array($queryEmpleado, MYSQLI_ASSOC)) {
					
					echo "<option value='".$arrayEmpleados['emp_no']."'>".$arrayEmpleados['first_name'].' '.$arrayEmpleados['last_name']."</option>";
				}
				?>
				
			</select><br>
			
			Introduce el salario del nuevo empleado: <input type="text" name="salario"><br><br>
			
		
		<input type="submit" value="Cambiar salario de empleado">
		</form>
	</body>	
</html>