<?php
	include("session.php");
?>

<html>
	<head>
		
	</head>
	<body>
		<h1>CAMBIO DE CATEGORIA</h1>
		<form name="mi_formulario" action="cambioCategoria.php" method="post">
		
			Selecciona el empleado al que quieres cambiar la categoria: <select name="numeroEmpleado">
				
				<?php
				$selectEmpleado = "SELECT emp_no, first_name FROM employees LIMIT 200;";
				$queryEmpleado = mysqli_query($db, $selectEmpleado);
				while ($arrayEmpleados = mysqli_fetch_array($queryEmpleado, MYSQLI_ASSOC)) {
					
					echo "<option value='".$arrayEmpleados['emp_no']."'>".$arrayEmpleados['first_name']."</option>";
				}
				?>
				
			</select><br>
			
			Selecciona el titulo que va a tener el empleado: <select name="titulo">
				
				<?php
				$selectTitulo = "SELECT distinct title FROM titles;";
				$queryTitulo = mysqli_query($db, $selectTitulo);
				while ($arrayTitulos = mysqli_fetch_array($queryTitulo, MYSQLI_ASSOC)) {
					
					echo "<option value='".$arrayTitulos['title']."'>".$arrayTitulos['title']."</option>";
				}
				?>
			</select><br><br>
			
		
		<input type="submit" value="Cambiar salario de empleado">
		</form>
	</body>	
</html>