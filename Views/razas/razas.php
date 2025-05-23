<!-- Carga todo el header, la variable $data viene desde el controlador -->
<?php header_admin($data);
getModal('RazasModal', $data);
?> 

  <!-- Contenido de la pagina -->
  <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <!-- Titulo de la pagina -->
                <h4 class="m-0 font-weight-bold  text-primary">
                    <?= $data['page_title'] . " de perros" ?>
                    <?php if ($_SESSION['permisosMod']['w']): ?>
                    <button id="btnInsertarRaza" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#insertarRazaModal">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>

                        <span class="text">
                        Agregar raza
                        </span>
                        
                    </button>
                    <?php endif; ?>
                </h4>

                
            </div>

            <div class="card-body">
                <div class="table-responsive">
                <table id="tablaRazas" class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Tamaño</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
                </div>
            </div>
        </div>
        
    </div>
    <!-- /.Fin de contenido -->

    </div>
    <!-- Fin de contenido principal <main> -->
<?php footer_admin($data) ?> <!-- Carga todo el footer -->