import paho.mqtt.client as mqtt
import mariadb
import json
import sys
#===============================================================
# Ajustes MQTT 
MQTT_Broker = "172.19.0.3" # IP del contenedor ejecutando MQTT
MQTT_Port = 1883 # Puerto listener por defecto
MQTT_User = "admin"
MQTT_Password  = "contrasena"
MQTT_ClientID = "mqtt-db-connector"
Keep_Alive_Interval = 60
MQTT_Topic = "devices/#"
MQTT_Topic_Sensors = "devices/sensors"
MQTT_Topic_Actuators = "devices/actuators"

#===============================================================
# Ajustes DB
DB_user="root"
DB_password="contrasena"
DB_host="172.19.0.2" # IP del contenedor ejecutando la DB
DB_database="SmartHydro"

#===============================================================
# Funcion gestora de la base de datos
def add_del_update_db_record(sql_query, args=()):
	try:
		conn = mariadb.connect(
			user=DB_user,
			password=DB_password,
			host=DB_host,
			database=DB_database)
	except mariadb.Error as e:
		print(f"Error connecting to MariaDB Platform: {e}")
	cur = conn.cursor()
	try:
		cur.execute(sql_query, args)
	except mariadb.Error as e:
		print(f"Error: {e}")
	conn.commit()
	conn.close()
		

#===============================================================
# Funciones para guardar datos enviados por el broker MQTT a la BD
# Funcion para guardar datos de sensor
def MQTT_Sensor_Data_Handler(json_data):
	# Hacerle parse a los datos
	json_dict = json.loads(json_data)
	sensor_id = json_dict["sensor_id"]
	sensor_value = json_dict["sensor_value"]
	
	#Push into DB Table
	print("sensor_id: ", sensor_id)
	print("sensor_value: ", sensor_value)
	add_del_update_db_record("INSERT INTO sensor_data (sensor_id, sensor_value) VALUES (?,?)",[sensor_id, sensor_value])
	print("Inserted Sensor Data into Database.")
	print("")

# Funcion para actualizar los estados del actuador
def MQTT_Actuator_State_Handler(json_data):
	# Hacerle parse a los datos
	json_dict = json.loads(json_data)
	actuator_id = json_dict["actuator_id"]
	actuator_state = json_dict["actuator_state"]
	
	#Push into DB Table
	add_del_update_db_record("UPDATE actuators SET actuator_state = ? WHERE actuator_id = ?",[actuator_state, actuator_id])
	print("Inserted Actuator Data into Database.")
	print("")

#===============================================================
# Selecciona la funcion adecuada para sensor o actuador
def sensor_Data_Handler(Topic, json_data):
	if Topic == MQTT_Topic_Sensors:
		MQTT_Sensor_Data_Handler(json_data)
	elif Topic == MQTT_Topic_Actuators:
		MQTT_Actuator_State_Handler(json_data)

#===============================================================
# Funciones callback para el cliente MQTT
# Suscribirse al topico definido despues de conectarse 
def on_connect(client, userdata, flags, rc):
	print("Conectado como: " + MQTT_ClientID)
	client.subscribe(MQTT_Topic, 0)

# Guardar datos a la BD al recibir un mensaje en el topico
def on_message(client, userdata, msg):
	print("Datos MQTT recibidos...")
	print("Topico MQTT: " + msg.topic)
	print("Datos: " + str(msg.payload.decode('utf-8')))
	sensor_Data_Handler(msg.topic, str(msg.payload.decode('utf-8')))

def on_subscribe(client, userdata, mid, granted_qos):
	print("Subscrito a: " + MQTT_Topic)
	pass

client = mqtt.Client(MQTT_ClientID)

# Asignar los callbacks a los eventos
client.on_connect = on_connect
client.on_message = on_message
client.on_subscribe = on_subscribe

# Establecer el usuario y contraseña
client.username_pw_set(MQTT_User, MQTT_Password)

# Conectar al broker MQTT
client.connect(MQTT_Broker, MQTT_Port, Keep_Alive_Interval)

# Continue el loop para siempre
client.loop_forever()