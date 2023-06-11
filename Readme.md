# MariaDB (base de datos)
- Instalar base de datos en Docker
```shell
docker pull mariadb:latest
```

- Crear un volumen de Docker para almacenar los datos con persistencia:
```shell
mkdir ./volumes
mkdir ./volumes/mariadb-data
mkdir ./volumes/mosquitto-config
mkdir ./volumes/mosquitto-data
mkdir ./volumes/mosquitto-log
```

- Crear un archivo en el directorio actual con la contraseña para el usuario root de la base de datos:
```shell
echo 'contrasena' > ./mariadb-root-pasword
```

- Iniciar el contenedor de la base de datos:
 - en el puerto: 3306
 - con nombre: mariadb
 - montando el volumen: mariadb-data
 - con el archivo de contraseña: mariadb-root-pasword en el directorio actual
 - utilizando la ultima version
```shell
docker run -d \
    -p 3306:3306 \
    --name mariadb \
    -v ./volumes/mariadb-data:/var/lib/mysql \
    -e MARIADB_ROOT_PASSWORD=contrasena \
    mariadb:latest
```

- Conectarse al shell del contenedor:
```shell
docker exec -it mariadb bash
```

- Abrir la linea de comandos de la base de datos utilizando la contrasena
```bash
mariadb -u root -p
```

# Mosquitto (MQTT broker)
- Instalar el broker MQTT en Docker
```shell
docker pull eclipse-mosquitto:latest
```
- Crear el archivo de configuracion /config/mosquitto.conf con los siguientes contenidos:
```
persistence true
persistence_location /mosquitto/data/
log_dest file /mosquitto/log/mosquitto.log
listener 1883
socket_domain ipv4
allow_anonymous true
```

- Iniciar el contenedor del broker:
 - en los puertos: 1883 y 9001
 - con nombre: mongodb
 - montando los volumenes: mosquitto-config, mosquitto-data, mosquitto-log
 - utilizando la ultima version
```shell
docker run -d \
    -p 1883:1883 \
    -p 9001:9001 \
    --name mosquitto \
    -v ./volumes/mosquitto-config:/mosquitto/config \
    -v ./volumes/mosquitto-data:/mosquitto/data \
    -v ./volumes/mosquitto-log:/mosquitto/log \
    eclipse-mosquitto:latest
```

- Crear el fichero de contraseñas para Mosquitto (contraseña: contrasena)
```bash
docker exec -it mosquitto mosquitto_passwd -c /mosquitto/config/mosquitto.passwd admin
```
- Editar el archivo de configuracion config/mosquitto.conf:
```
allow_anonymous false
password_file /mosquitto/config/mosquitto.passwd
```

# Python (conector)
- Instalar Python en Docker
```shell
docker pull python:3.11.3-bullseye
```

