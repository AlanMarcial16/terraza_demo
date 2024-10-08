<!-- Modal -->
                                <div class="modal fade" id="nuevamesa" tabindex="-1" role="dialog" aria-labelledby="modal-formulario2-titulo" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h2 class="modal-title" id="gestionMesasModalLabel"><b>Añadir nueva mesa</b></h2>
                                    <span id="fecha" class="ml-auto"></span>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <BR>
                                    <div class="modal-body">
                                    <form action="insertarmesa.php" method="POST" class="form1">
                                        <div class="row">
                                            <div class="form-group form-inline">
                                                <label for="nombre" class="col-sm-4 col-form-label">Mesa (número):</label>
                                                <input type="int" id="nombre" name="nombre" required><br><br>
                                                </div>
                                            <div class="form-group form-inline">
                                                <label for="capacidad" class="col-sm-4 col-form-label">Capacidad:</label>
                                                <input type="int" id="capacidad" name="capacidad" required><br><br>
                                            </div>
                                            <div class="form-group form-inline">
                                                <label for="estado" class="col-sm-4 col-form-label">Estado:</label>
                                                <select class="form-control" id="estado" name="estado" required>
                                                    <option value="Disponible">Disponible</option>
                                                    <option value="Ocupada">Ocupada</option>
                                                    <option value="Reservada">Reservada</option>
                                                </select>
                                            </div>
                                        <br><br>
                                        <div class="row">
                                        <div class="col-md-12 text-center">
                                            <button type="submit" class="btn btn-primary" id="btn-submit">Enviar</button>
                                        </div>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                                </div>
                            </div>