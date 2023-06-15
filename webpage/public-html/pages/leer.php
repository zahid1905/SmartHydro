<?php 
	$conexion=mysqli_connect('192.168.54.115','root','contrasena','SmartHydro');

	$resultado = mysqli_query($conexion, "SELECT * FROM actuators");
    while($consulta=mysqli_fetch_array($resultado)){
        echo $consulta['actuator_state'];
    }
 ?>