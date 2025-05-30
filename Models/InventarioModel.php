<?php

class InventarioModel extends Mysql
{

    public function __construct()
    {
        parent::__construct();
    }

    public function selectInventario()
    {
        $sql = "SELECT idInventario, nombreProducto, cantidadProducto, codigoSKU FROM productos WHERE estado = 1";
        $request = $this->select_all($sql);
        return $request;
    }

    public function selectProducto(int $id)
    {
        $this->intId = $id;
        $sql = "SELECT idInventario, nombreProducto, cantidadProducto, precio, codigoSKU FROM productos WHERE idInventario = $id";
        $request = $this->select_all($sql);
        return $request;
    }

    public function selectCantidadProducto($id){
        $this->idProducto = $id;
        $sql = "SELECT cantidadProducto FROM productos WHERE idInventario = $this->idProducto";
        $request = $this->select_all($sql);
        return $request;
    }

    public function updateProducto(int $id, int $cantidad){
        $this->idProducto = $id;
        $this->cantidadProducto = $cantidad;
        $sql = "UPDATE productos SET cantidadProducto = ?  WHERE idInventario = $this->idProducto";

        $arrData = array($this->cantidadProducto);
        $request_insert = $this->update($sql, $arrData);

        return $request_insert;
    }

    public function traerProductos()
    {

        $sql = "SELECT idInventario, nombreProducto, cantidadProducto, precio, codigoSKU FROM productos WHERE estado = 1";
        $request = $this->select_all($sql);
        return $request;
    }

    public function insertarProducto(string $nombreProducto, int $precioProducto, string $codigoProducto)
    {
        $return = "";

        $this->nombreProducto = $nombreProducto;
        $this->precioProducto = $precioProducto;
        $this->codigoProducto = $codigoProducto;

        $sql = "SELECT * FROM productos WHERE nombreProducto = '{$this->nombreProducto}'";
        $request = $this->select_all($sql);

        if (empty($request)) {
            $query_insert = "INSERT INTO productos(nombreProducto, cantidadProducto, estado, precio, codigoSKU) VALUES(?, ?, ?, ?, ?)";
            $arrData = array($this->nombreProducto, 0, 1, $this->precioProducto, $this->codigoProducto);
            $request_insert = $this->insert($query_insert, $arrData);
            $return = $request_insert;
        } else {
            $return = "exist";
        }
        return $return;
    }

    public function actualizarProducto(int $idProducto, string $nombreProducto, int $precioProducto, string $codigoProducto)
    {
        $return = "";

        $this->idProducto = $idProducto;
        $this->nombreProducto = $nombreProducto;
        $this->precioProducto = $precioProducto;
        $this->codigoProducto = $codigoProducto;

        $sql = "SELECT * FROM productos WHERE nombreProducto = '{$this->nombreProducto}' AND idInventario != $this->idProducto";
        $request = $this->select_all($sql);

        if (empty($request)) {
            $query_insert = "UPDATE productos SET nombreProducto = ?, estado = ?, precio = ?, codigoSKU = ? WHERE idInventario = $this->idProducto";
            $arrData = array($this->nombreProducto, 1, $this->precioProducto, $this->codigoProducto);
            $request_insert = $this->update($query_insert, $arrData);
            $return = $request_insert;
        } else {
            $return = "exist";
        }
        return $return;
    }

    public function deleteProducto(int $idProducto)
    {
        $this->intIdProducto = $idProducto;
        $sql = "UPDATE productos SET estado = ? WHERE idInventario = $this->intIdProducto";
        $arrData = array(0);
        $request = $this->update($sql, $arrData);
        if ($request) {
            $request = 'ok';
        } else {
            $request = 'error';
        }

        return $request;
    }
}
