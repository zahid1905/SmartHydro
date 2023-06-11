# Contenedor
FROM archlinux:latest

ADD mqtt_db_connector/mqtt_db_connector.py /

# Instalar requerimentos con pacman
RUN pacman -Sy --noconfirm gcc python python-pip mariadb-libs nano

# Instalar requerimentos con pip
RUN python -m pip install paho-mqtt mariadb

CMD ["python", "/mqtt_db_connector.py"]
