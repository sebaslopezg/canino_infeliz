<?php

class UsuariosModel extends Mysql{
    public function __construct(){
        parent::__construct();
    }

    public function selectUserById(int $id){
        $this->intId = $id;
        $sql = "SELECT p.id_persona, p.identificacion, p.nombres, p.apellidos, p.telefono, p.email_user, r.nombre_rol, p.rol_id, p.status, DATE_FORMAT(p.date_created , '%d-%m-%Y') as fechaRegistro
                from personas p 
                JOIN roles r on
                p.rol_id = r.id_rol
                WHERE p.id_persona = $this->intId;";

        $request = $this->select_all($sql);

        return $request;
    }

    public function selectUsuarios(){

        $whereAdmin = "";
        if ($_SESSION['idUser'] != 1) {
            $whereAdmin = " AND p.id_persona != 1";
        }
        
        $sql = "SELECT p.id_persona , p.identificacion, p.nombres, p.apellidos, p.telefono, p.email_user, p.status, r.id_rol, r.nombre_rol 
        FROM personas p 
        INNER JOIN roles r 
        ON p.rol_id = r.id_rol 
        WHERE p.status != 0".$whereAdmin;

        $request = $this->select_all($sql);

        return $request;
    }

    public function insertarUsuario(int $identificacion, string $nombre, string $apellido, int $telefono, string $email, string $password, int $tipoId, int $status){        
        $return = "";
        $this->strIdentificacion = $identificacion;
        $this->strNombre = $nombre;
        $this->strApellido = $apellido;
        $this->intTelefono = $telefono;
        $this->strEmail = $email;
        $this->strpassword = $password;
        $this->intTipoId = $tipoId;
        $this->intStatus = $status;
        $return = 0;


        $sql = "SELECT * FROM personas WHERE email_user = '{$this->strEmail}' OR identificacion = '{$this->strIdentificacion}'";
        $request = $this->select_all($sql);

        if (empty($request)) {
            $query_insert = "INSERT INTO personas(identificacion, nombres, apellidos, telefono, email_user, `password`, rol_id, `status`)
            VALUES (?,?,?,?,?,?,?,?)";
            $arrData = array(
                $this->strIdentificacion,
                $this->strNombre,
                $this->strApellido,
                $this->intTelefono,
                $this->strEmail,
                $this->strpassword,
                $this->intTipoId,
                $this->intStatus
            );
            $request_insert = $this->insert($query_insert, $arrData);
            $return = $request_insert;
        }else{
            $return = "exist";
        }
        return $return;
    }


    public function actualizarUsuario(int $userId,int $identificacion, string $nombre, string $apellido, int $telefono, string $email, string $password, int $tipoId, int $status){
        $return = "";

        $this->userId = $userId;
        $this->identificacion = $identificacion;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->telefono = $telefono;
        $this->email = $email;
        $this->password = $password;
        $this->tipoId = $tipoId;
        $this->status = $status;

        $sql = "SELECT * FROM personas WHERE (email_user = '{$this->email}' AND id_persona  != {$this->userId}) OR (identificacion = '{$this->identificacion}' AND id_persona != {$this->userId})";

        $request = $this->select_all($sql);

        if (empty($request)) {
            if ($this->password != "") {
                $query_insert = "UPDATE personas SET identificacion = ?, nombres = ?, apellidos = ?, telefono = ?, email_user = ?, password = ?, rol_id  = ?, status = ? 
                WHERE id_persona = $this->userId";
        
                $arrData = array(
                    $this->identificacion, 
                    $this->nombre, 
                    $this->apellido, 
                    $this->telefono, 
                    $this->email, 
                    $this->password, 
                    $this->tipoId, 
                    $this->status
                );   
            }else{
                $query_insert = "UPDATE personas SET identificacion = ?, nombres = ?, apellidos = ?, telefono = ?, email_user = ?, rol_id = ?, status = ? 
                WHERE id_persona = $this->userId";
        
                $arrData = array(
                    $this->identificacion, 
                    $this->nombre, 
                    $this->apellido, 
                    $this->telefono, 
                    $this->email, 
                    $this->tipoId, 
                    $this->status
                );
            }
            $request_insert = $this->update($query_insert, $arrData);
        }else{
            $request_insert = "exist";
        }

        //return $request_insert;
        return $request_insert;
    }

    public function eliminarUsuario(int $idUsuario){
        $this->intIdUsuario = $idUsuario;

        $sql = "UPDATE personas SET status = ? WHERE id_persona = {$this->intIdUsuario}";
        $arrData = array(0);
        $request = $this->update($sql, $arrData);
        return $request;
    }
}