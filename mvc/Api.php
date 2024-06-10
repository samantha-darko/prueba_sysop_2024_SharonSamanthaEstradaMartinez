<?php

include_once("conexion.php");
include_once("Clases.php");

class ApiUsuario
{
    function Agregar($datos)
    {
        try {
            $db = new DB();
            $conn = $db->connect();
            if (is_array($conn)) {
                $msj = $conn['error'];
                return $msj;
            }

            $sql = ("call sp_usuario(?, ?, ?, ?, ?, ?, ?, ?, 'I');");
            $stmt = $conn->prepare($sql);
            
            $stmt->bindValue(1, $datos->nombre);
            $stmt->bindValue(2, $datos->num_telefono);
            $stmt->bindValue(3, $datos->email);
            $stmt->bindValue(4, $datos->contra);
            $stmt->bindValue(5, $datos->fecha_nacimiento);
            $stmt->bindValue(6, $datos->rfc);
            $stmt->bindParam(7, $datos->foto_perfil, PDO::PARAM_LOB);
            $stmt->bindValue(8, $datos->tipo_usuario);
            
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch();
                $msj = array($row['codigo'], $row['mensaje']);
            } else
                $msj = false;
        } catch (PDOException $e) {
            $msj = "Error en servidor: " . $e->getMessage();
        }

        return $msj;
    }
}
