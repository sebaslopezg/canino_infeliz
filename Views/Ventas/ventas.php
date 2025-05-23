<!-- Carga todo el header, la variable $data viene desde el controlador -->
<?php 
header_admin($data);
getModal('ventasModal', $data);
?> 


<!-- Contenido de la pagina -->
<div class="container-fluid">

<div class="card shadow mb-4">

    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary">
            <?= $data['page_title'] ?>
            <?php if ($_SESSION['permisosMod']['w']): ?>
                <?php endif; ?>
        </h4>

    </div>

    <div class="card-body">

        <form id="frmVentas" method="POST">

        <div class="form-row">
            <div class="form-group col-md-3">
                <button type="submit" id="btnRegistrar" class="btn btn-primary">Registrar</button>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-3">
                <h4>
                    <span>TOTAL: $</span>
                    <b><span id="totalBill">0</span></b>
                    <input name="totalBill" id="totalBillInput" type="hidden" value="0">
                </h4>
            </div>
        </div>

            <div class="form-row">
              <div class="form-group col-md-3">
                <input type="text" placeholder="CLIENTE" class="form-control" id="txtCliente" name="txtCliente" autocomplete="off">
                
              </div>

              <div class="form-group col-md-6">
                <button id="btnAgregarCliente" type="button" class="btn btn-primary">Agregar</button>
              </div>

            </div>

            <div class="form-row" id="addClientZone">

            </div>

            <div class="form-row">
              <div class="form-group col-md-3">
                <input type="text" placeholder="CODIGO SKU" class="form-control" id="txtCodigoSKU" name="txtCodigoSKU" autocomplete="off">
                
              </div>

              <div class="form-group col-md-6">
                <button id="btnAgregarItem" type="button" class="btn btn-primary">Agregar</button>
              </div>

            </div>

            <div class="form-row">
                <label >Productos/Servicios</label>
            </div>
            <div class="form-row">
                <div id="productList">

                </div>
            </div>

            
                <div class="form-row">
                    <div class="form-group col-md-3" >
                        <select name="metodoPago[]" id="metodoPago0" class="form-control">
                            <option value="0">Seleccionar Metodo de pago</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <button id="btnAgregarMetodo" type="button" class="btn btn-primary">Agregar</button>
                    </div>
                </div>
            <div id="metodoPagoZone">
            </div>
        </form>


        
    </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">
                Facturas
            </h4>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table id="tablaVentas" class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Numero Factura</th>
                            <th>Fecha</th>
                            <th>Cliente</th>
                            <th>Empleado</th>
                            <th>Total</th>
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