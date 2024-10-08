<div class="modal fade" id="modal-formulario" tabindex="-1" role="dialog" aria-labelledby="modal-formulario-titulo" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="gestionMesasModalLabel"><b>Gestionar mesas</b></h2>
          <span id="fecha" class="ml-auto"></span>
          <script>
              // Obtener la fecha actual
              const fecha = new Date();
  
              // Obtener las opciones de formato para mostrar la fecha en el idioma español y en el formato deseado
              const options = {
              weekday: 'long',
              day: 'numeric',
              month: 'long',
              year: 'numeric'
              };
  
              // Dar formato a la fecha y guardarla en una variable
              const fechaFormateada = fecha.toLocaleDateString('es-ES', options);
  
              // Actualizar el contenido del elemento de texto con la fecha formateada
              document.getElementById('fecha').textContent = fechaFormateada;
          </script>
          <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <BR>
        <div class="modal-body">
        <form method="POST" action="editar_mesa.php">
        <label for="mesa">Selecciona una mesa:</label>
        <select name="mesa" id="mesa">
          <option value="">Seleccione una mesa</option>
          <?php
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "pruebar_demo";

          // Crea la conexión
          $conn = new mysqli($servername, $username, $password, $dbname);

          // Verifica la conexión
          if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
          }

          // Consulta las mesas disponibles
          $sql = "SELECT * FROM mesas WHERE estado='disponible'";
          $resultado = $conn->query($sql);

          if ($resultado->num_rows > 0) {
            while($fila = $resultado->fetch_assoc()) {
              echo "<option value='" . $fila["id"] . "'>" . $fila["nombre"] . "</option>";
            }
          } else {
            echo "<option value='' disabled>No hay mesas disponibles</option>";
          }

          // Cierra la conexión
          $conn->close();
          ?>
        </select>
        <br>
        <button type="submit">Editar mesa</button>
      </form>
          </div>
      </div>
    </div>
  </div>
  