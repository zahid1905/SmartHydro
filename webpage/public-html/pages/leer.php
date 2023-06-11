<?php 
	$conexion=mysqli_connect('172.19.0.2','root','contrasena','SmartHydro','3306');

	$resultado = mysqli_query($conexion, "SELECT * FROM actuators");
    while($consulta=mysqli_fetch_array($resultado)){
        echo $consulta['actuator_state'];
    }
 ?>