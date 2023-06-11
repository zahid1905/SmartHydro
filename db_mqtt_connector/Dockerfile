# Contenedor
FROM archlinux:latest

ADD db_mqtt_connector/db_mqtt_connector.py /

# Instalar requerimentos con pacman
RUN pacman -Sy --noconfirm gcc python python-pip mariadb-libs nano

# Instalar requerimentos con pip
RUN python -m pip install paho-mqtt mariadb

CMD ["python", "/db_mqtt_connector.py"]
