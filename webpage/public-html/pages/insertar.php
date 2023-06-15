<?php 
	$conexion=mysqli_connect('192.168.54.115','root','contrasena','SmartHydro');

	$actuator_id=$_POST['actuator_id'];
	$device_id=$_POST['device_id'];
	$actuator_name=$_POST['actuator_name'];
	$actuator_state=$_POST['actuator_state'];

	$sql="UPDATE actuators SET actuator_state = $actuator_state WHERE actuator_id = '$actuator_id' LIMIT 1";
	echo mysqli_query($conexion,$sql);
 ?>