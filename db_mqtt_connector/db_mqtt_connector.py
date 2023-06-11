import paho.mqtt.client as mqtt
import mariadb
import json
from time import sleep
#===============================================================
# Ajustes MQTT 
MQTT_Broker = "172.19.0.3" # IP del contenedor ejecutando MQTT
MQTT_Port = 1883 # Puerto listener por defecto
MQTT_User = "admin"
MQTT_Password  = "contrasena"
MQTT_ClientID = "db-mqtt-connector"
Keep_Alive_Interval = 60
MQTT_Topic_Actuators = "devices/actuators"

#===============================================================
# Ajustes DB
DB_user="root"
DB_password="contrasena"
DB_host="172.19.0.2" # IP del contenedor ejecutando la DB
DB_database="SmartHydro"

#===============================================================
# Funcion gestora de la base de datos
def query_db_record(sql_query, args=()):
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
	result = cur.fetchall()
	conn.close()
	return result
		
#===============================================================
# Funcion para leer los estados del actuador
def MQTT_Actuator_State_Handler(actuator_id, actuator_state):
	# Hacerle parse a los datos
	json_dict = {
		"actuator_id": actuator_id,
		"actuator_state": actuator_state
	}
	msg=json.dumps(json_dict)
	print(msg)
	client.publish(MQTT_Topic_Actuators, msg)

#===============================================================
# Funciones callback para el cliente MQTT
# Suscribirse al topico definido despues de conectarse 
def on_connect(client, userdata, flags, rc):
	print("Conectado como: " + MQTT_ClientID)

#===============================================================
# Funcion para verifficar si la segunda columna de 2 tuplas son igual
def comparar_segunda_columna(tupla1, tupla2):
	for i in range(2):
		if tupla1[i][1] != tupla2[i][1]:
			return False
	return True

client = mqtt.Client(MQTT_ClientID)

# Asignar los callbacks a los eventos
client.on_connect = on_connect

# Establecer el usuario y contraseña
client.username_pw_set(MQTT_User, MQTT_Password)

# Conectar al broker MQTT
client.connect(MQTT_Broker, MQTT_Port, Keep_Alive_Interval)

# Continue el loop para siempre
client.loop_start()

contador=0

previus_query=query_db_record("SELECT actuator_id, actuator_state FROM actuators", (0,))

while True:
	sleep(1)
	query_actuators = query_db_record("SELECT actuator_id, actuator_state FROM actuators", (0,))
	if comparar_segunda_columna(previus_query, query_actuators) == False:
		for (actuator_id, actuator_state) in query_actuators:
			if actuator_state != 0:
				print(f"actuator_id: {actuator_id}, actuator_state: {actuator_state}")
				MQTT_Actuator_State_Handler(actuator_id, actuator_state)
				sleep(1)
	previus_query = query_actuators