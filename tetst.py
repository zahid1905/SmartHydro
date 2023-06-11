def checar_codificar(id_sensor, sensor, actuador)
    sensor_data=sensor*2
    if sensor < 512:
        regar(actuador)
    elif sensor > 512:
        pint("plantas humedas")
