<?php
include_once("../../config/Conexion.php");

class usuarioModelo
{

 
    public  function registroUsuario($data)
    {
        $conexion = Conexion::conectar();

        $sql = $conexion->query("CALL registroUsuario('$data[nombre]','$data[apellidos]','$data[correo]','$data[contrasena]','disponible','cliente')");
        return $sql;
    }
    public  function verificarCorreo($correo)
    {
        $conexion = Conexion::conectar();

        $sql = $conexion->query("CALL verificarCorreo('$correo')");
        $ress = $sql->fetch_assoc();
        return $ress;
    }

    public function login($correo, $pass)
    {
        $conexion = Conexion::conectar();
        $sql = $conexion->query("CALL Login('$correo')");
        $ress = $sql->fetch_assoc();
        if ($ress && count($ress) > 1) {
            $verify = password_verify($pass, $ress['contrasena']);
            if ($verify) {
                $result = $ress;
            } else {
                $result = null;
            }
        } else {
            $result = null;
        }
        return $result;
    }
    public function Actualizarusuario($data)
    {
        $conexion = Conexion::conectar();
        $sql = $conexion->query("CALL ActualizarLogin('$data[nombre]','$data[apellido]','$data[correo]',$data[codigo])");
        return $sql;
    }
}
