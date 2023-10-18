
function fetchData() {
    // Realiza una solicitud a fetch_data.php
    $.ajax({
        url: '../back/datosPersonales.php?idUsuario=' + idUsuario,
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            if (data.length > 0) {
                // Asigna los valores a los elementos HTML
                $('#nombre').text(data[0]['Nombre']);
                $('#apellidos').text(data[0]['Apellidos']);
                $('#cursoActual').text(data[0]['cursoActual']);
                $('#centro').text(data[0]['id_centro']);
            }
            console.log(data); // Puedes mostrar los datos en la consola o realizar otras operaciones
        },
        error: function(xhr, status, error) {
            console.error('Error al obtener datos: ' + error);
        }
    });
    
}




