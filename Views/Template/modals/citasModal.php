<div class="modal fade" id="insertarCitas" tabindex="-1">

        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="titulo" class="modal-title">Agendar cita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formularioCitas" method="post">

                        <input type="hidden" name="id_cita" id="id_cita" value="0">

                        <div class="form-group">
                            <label for="dia_cita">Dia de la cita</label>
                            <input type="date" class="form-control" id="dia_cita" name="dia_cita" autocomplete="off">
                            <small class="form-text text-muted">Dia de la cita.</small>
                        </div>

                        <div class="form-group">
                            <label for="hora_inicio">Hora inicio</label>
                            <input type="time"  class="form-control" id="hora_inicio" name="hora_inicio" autocomplete="off">
                            <small class="form-text text-muted">Hora inicial de la cita.</small>
                        </div>
                        <div class="form-group">
                            <label for="hora_final">Hora finalización</label>
                            <input type="time" class="form-control" id="hora_final" name="hora_final" autocomplete="off">
                            <small class="form-text text-muted">Hora final de la cita.</small>
                        </div>
                        <div class="form-group">
                            <label for="lugar_cita">Lugar</label>
                            <input type="text" class="form-control" id="lugar_cita" name="lugar_cita" autocomplete="off">
                            <small class="form-text text-muted">Lugar donde tiene que acudir.</small>
                        </div>

                        <div class="form-group" id="select_servicios">
                                <span>Servicios</span>

                                <div class="input-group mb-3">
                                    <select class="custom-select" name="servicios[]" id="servicio_select">
                                                    <option value="0" selected>Seleccione un servicio</option>
                                    </select>
                                </div>
                        </div>

                        <div class="form-group" id="btnAgregarServs">
                                <button disabled class="btn btn-primary" id="mas_servicios">
                                    &plus;
                                    Seleccionar otro servicio
                                </button>
                        </div>


                        <div class="form-group">
                            <label for="mascota">Mascota</label>
                            <select class="custom-select" name="id_mascota" id="mascota_select">
                                <option value="0" selected>Seleccione una mascota</option>
                            </select>
                            <small class="form-text text-muted">Mascota del cliente que está reservando una cita.</small>
                        </div>

                        <div class="form-group">
                            <label for="empleado_select">Empleado</label>
                            <select class="custom-select" name="id_empleado" id="empleado_select">
                                <option value="0" selected>Seleccione un empleado</option>
                            </select>
                            
                            <small class="form-text text-muted">Empleado quien va atender al dueño de esta cita.</small>
                        </div>
                       

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>    
            </div>
        </div>
</div>

<!-- Modal VER USUARIOS -->
<div class="modal fade" id="verCitasModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Informacion de la cita</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <table class="table table-bordered" width="100%" cellspacing="0">
          <tbody>
            
            <tr>
              <th>Nombre del cliente</th>
              <td id="cell_nombre_cliente"></td>
            </tr>

            <tr>
              <th>Nombre de la mascota:</th>
              <td id="cell_nombre_mascota"></td>
            </tr>

            <tr>
              <th>Dia de la cita:</th>
              <td id="cell_dia_cita"></td>
            </tr>

            <tr>
              <th>Hora de inicio de la cita:</th>
              <td id="cell_hora_inicio"></td>
            </tr>

            <tr>
              <th>Hora final de la cita:</th>
              <td id="cell_hora_final"></td>
            </tr>

            <tr>
              <th>Lugar:</th>
              <td id="cell_lugar"></td>
            </tr>

            <tr>
              <th>Empleado encargado:</th>
              <td id="cell_empleado"></td>
            </tr>

            <tr id="tr_servicios">

            </tr>

          </tbody>
        </table>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
        
      </div>
    </div>
  </div>
</div>