<?php

class Conexion
{
    public static function conectar()
    {
        $host = 'localhost';
        $db = 'reservahoteles';
        $user = 'root';
        $pass = '';


        $mysqli = new mysqli($host, $user, $pass, $db);
        if ($mysqli->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        return $mysqli;
       
    }
}
