DROP DATABASE IF EXISTS SmartHydro;
CREATE DATABASE SmartHydro;
USE SmartHydro;

DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS devices;
DROP TABLE IF EXISTS sensors;
DROP TABLE IF EXISTS actuators;
DROP TABLE IF EXISTS sensor_data;

CREATE TABLE users(
    user_id INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    usr_password VARCHAR(20) NOT NULL,
    usr_role VARCHAR(20) NOT NULL DEFAULT "user",
    subscription VARCHAR(20) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE devices(
    device_id INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    user_id INTEGER UNSIGNED NOT NULL,
    device_name VARCHAR(30) NOT NULL
);

CREATE TABLE sensors(
    sensor_id INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    device_id INTEGER UNSIGNED NOT NULL,
    sensor_name VARCHAR(30) NOT NULL
);

CREATE TABLE actuators(
    actuator_id INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    device_id INTEGER UNSIGNED NOT NULL,
    actuator_name VARCHAR(30) NOT NULL,
    actuator_state INTEGER NOT NULL DEFAULT 0
);

CREATE TABLE sensor_data(
    sensor_id INTEGER UNSIGNED,
    sampling_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    sensor_value SMALLINT,
    PRIMARY KEY (sensor_id, sampling_time)
);

-- Agregar un usuario admin es desde el servidor
INSERT INTO users (
    username, email, usr_password, usr_role, subscription
) VALUES
("Usuario 1", "usuario1@mail.com", "usuario1", "admin", "basica");

-- Los usuarios los agrega el usuario con una pagina de registro con este insert (este es un ejemplo)
-- El formulario pide nombre, email, contraseña y tipo de subscripcion
INSERT INTO users (
    username, email, usr_password, subscription
) VALUES
("Usuario 2", "usuario2@mail.com", "usuario2", "pro");

--** Los dispositivos los agrega el usuario desde su dashboard con este insert (este es un ejemplo)
-- El formulario solo pide nombre de dispositivo (el user_id se obtiene como una cookie de la sesion actual)
INSERT INTO devices (
    user_id, device_name
) VALUES
("1", "ESP32");

--** Los sensores los agrega el usuario desde el sub-dasboard de dispositivo con este insert (estos son ejemplos)
-- El formulario solo pide nombre de sensor (el device_id se obtiene como una cookie del dispositivo seleccionado actualmente)
INSERT INTO sensors (
    device_id, sensor_name
) VALUES
("1", "Sensor Humedad 1");
INSERT INTO sensors (
    device_id, sensor_name
) VALUES
("1", "Sensor Humedad 2");
INSERT INTO sensors (
    device_id, sensor_name
) VALUES
("1", "Sensor Humedad 3");

--** Los actuadores se agregan como los sensores (mas ejemplos)
INSERT INTO actuators (
    device_id, actuator_name
) VALUES
("1", "Bomba 1");
INSERT INTO actuators (
    device_id, actuator_name
) VALUES
("1", "Bomba 2");
INSERT INTO actuators (
    device_id, actuator_name
) VALUES
("1", "Bomba 3");

--* Para actualizar los actuadores se utiliza:
UPDATE
    actuators
SET
    actuator_state = ?
WHERE
    actuator_id = ?;

--** Lo de sensor_data es desde los dispositivos, pero esta es la consulta:
INSERT INTO sensor_data (
    sensor_id, sensor_value
) VALUES
(?,?);

-- Consulta para obenter los dispositivos que tiene el usuario actual
SELECT
    users.user_id, devices.device_id, users.username, devices.device_name
FROM
    users AS users
JOIN
    devices AS devices
ON
    users.user_id=devices.user_id
WHERE
    users.user_id=1;

-- Consulta para obenter los sensores que tiene el usuario actual
SELECT
    users.user_id, devices.device_id, sensors.sensor_id, users.username, devices.device_name, sensors.sensor_name
FROM
    users AS users
JOIN
    devices AS devices
ON
    users.user_id=devices.user_id
JOIN
    sensors AS sensors
ON
    devices.device_id=sensors.device_id
WHERE
    users.user_id=1;

-- Consulta para obenter los actuadores que tiene el usuario actual
SELECT
    users.user_id, devices.device_id, actuators.actuator_id, users.username, devices.device_name, actuators.actuator_name
FROM
    users AS users
JOIN
    devices AS devices
ON
    users.user_id=devices.user_id
JOIN
    actuators AS actuators
ON
    devices.device_id=actuators.device_id
WHERE
    users.user_id=1;
    