<!-- Carga todo el header, la variable $data viene desde el controlador -->
<?php header_admin($data); 
getModal('inventarioModal',$data);
?> 

<!-- Contenido de la pagina -->
<div class="container-fluid">

<div class="card shadow mb-4">

    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary">
            <?= $data['page_title'] ?>
        </h4>
    </div>

    <div class="card-body">
    <div class="table-responsive">

    </div>
    <table id="tablaInventario" class="table table-bordered" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Codigo SKU</th>
                <th>Accion</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    </div>
    </div>
    
</div>
<!-- /.Fin de contenido -->

    </div>
    <!-- Fin de contenido principal <main> -->

<?php footer_admin($data) ?> <!-- Carga todo el footer -->