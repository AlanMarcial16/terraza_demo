$(document).ready(function() {
    // Función para obtener los datos de las mesas desde el servidor
    function obtenerMesas() {
      $.ajax({
        url: 'obtener_mesas.php',
        dataType: 'json',
        success: function(data) {
          // Recorrer los datos de las mesas y actualizar la interfaz de usuario
          $.each(data, function(index, mesa) {
            var mesaElement = $('#mesa-' + mesa.id);
            if (mesa.atendida) {
              mesaElement.removeClass('libre ocupada').addClass('atendida');
            } else {
              mesaElement.removeClass('atendida ocupada').addClass(mesa.reservada ? 'ocupada' : 'libre');
            }
          });
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.error('Error al obtener las mesas: ' + textStatus);
        }
      });
    }
  
    // Actualizar las mesas cada 5 segundos
    setInterval(obtenerMesas, 5000);
  });