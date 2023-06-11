var estado=0;//consulta
function abrir(){
    $.ajax({
        url: '../pages/leer.php',
        type: 'POST', // o 'POST' si es necesario
        data: {
            parametro1: "1"
        },
        success:function(resultado_query){
           sensor_estado=document.querySelector('#mostrar_sensor_estado')
            var respuesta=String(resultado_query);
            estado=parseInt(respuesta[0]);
            sensor_estado.innerHTML=estado;
            alert("Sensores abiertos");
        }
    });        
}
function encender() {
    // Acciones que deseas realizar cuando se hace clic en el botón "Encender
    if(estado==0){
        estado=1;
    }
    var datos={
        "actuator_id":1,
        "device_id":1,
        "actuator_name":"Bomba 1",
        "actuator_state":estado
    };
    $.ajax({
        type:"POST",
        url:"insertar.php",
        data:datos,
        success:function(r){
            if(r==1){
                alert("agregado con exito");
            }else{
                alert("Fallo el server");
            }
        }
    });

    sensor_estado=document.getElementById('mostrar_sensor_estado');
    sensor_estado.innerHTML=estado;
    alert("El sensor está encendido");
    return false;
}
function apagar() {
    // Acciones que deseas realizar cuando se hace clic en el botón "Apagar"
    if(estado==1){
        estado=0;
    }
    var datos={
        "actuator_id":1,
        "device_id":1,
        "actuator_name":"Bomba 1",
        "actuator_state":estado
    };
    $.ajax({
        type:"POST",
        url:"insertar.php",
        data:datos,
        success:function(r){
            if(r==1){
                alert("agregado con exito");
            }else{
                alert("Fallo el server");
            }
        }
    });

    sensor_estado=document.getElementById('mostrar_sensor_estado');
    sensor_estado.innerHTML=estado;
    alert("El actuador se ha apagado");
    return false;
}
function no_definido(){
    alert("Planta del cultivo aun no definida");
}
function no_definidoA(){
    alert("El actuador aun no se encuentra defindo");
}
function no_definidoS(){
    alert("El sensor aun no se encuentra defindo");
}