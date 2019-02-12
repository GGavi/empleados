<?php
   include('session.php');
?>
<html>
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
      <h1>Bienvenido <?php echo $login_session; ?></h1> 
	  
	  
	  <nav class="dropdownmenu">
  <ul>
   <?php
	
	  if ($_SESSION['manager'] == true) {
		  
		  echo "<li><a href='cambioDepartamentoForm.php'>Cambio departamento</a></li>";
		  echo "<li><a href='cambioSalarioForm.php'>Cambio salario</a></li>";
		  echo "<li><a href='cambiarCategoriaForm.php'>Cambio categoria</a></li>";
		  echo "<li><a href='consultaDep.php'>Consulta departamento</a></li>";
		  echo "<li><a href='consultaSalario.php'>Consulta salario</a></li>";
		  echo "<li><a href='consultaCategoria.php'>Consulta categoria</a></li>";
	  } else {
		  
		  echo "<li><a href='consultaDep.php'>Consulta departamento</a></li>";
		  echo "<li><a href='consultaSalario.php'>Consulta salario</a></li>";
		  echo "<li><a href='consultaCategoria.php'>Consulta categoria</a></li>";
	  }
	  
   ?>
  </ul>
</nav>
	  
      <h2><a href = "logout.php">Cerrar Sesion</a></h2>
   </body>
   
</html>