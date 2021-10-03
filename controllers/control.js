function show_login() {
    window.location.href = "http://localhost/hotel_sureste/views/login.php";
}

// Cambia el numero de habitación
function cambio_habit() {
    var tipo_habit = document.getElementById("tipo_habit").value;
    var label_habit = document.getElementById("label_habit");

    $('#num_habitacion').empty();

    if (tipo_habit == 'Selecciona') {
        label_habit.innerHTML = "Numero de ...";
    } else {
        label_habit.innerHTML = "Numero de " + tipo_habit;

        $.ajax({
            url: 'http://localhost/hotel_sureste/models/validar_habitacion.php',
            data: { habitacion: tipo_habit },
            type: 'POST',
            dataType: 'html',
            success: function(data) {
                $('#num_habitacion').append(data);
            },
            error: function(xhr, status) {
                console.log('Error: ' + xhr.status);
            },
        });

    }

}

var estado_input = true;

function show_pass() {
    if (estado_input) {
        $('#input_pass').attr("type", "text");
        estado_input = false;
        $('#btn_show').text('Ocultar');
    } else {
        $('#input_pass').attr("type", "password");
        estado_input = true;
        $('#btn_show').text('Ver');
    }
}


function fin_reservacion() {
    var btn_fin = $('#fin_reservacion');
    var tipo = btn_fin.data('tipo');
    var cliente = btn_fin.data(('cliente'));

    $.ajax({
        url: 'http://localhost/hotel_sureste/models/fin_reservacion.php',
        data: { tipo: tipo, cliente: cliente },
        type: 'POST',
        dataType: 'text',
        success: function(data) {
            console.log(data);
            location.reload();
        },
        error: function(xhr, status) {
            console.log('Error: ' + xhr.status);
        },
    });
}