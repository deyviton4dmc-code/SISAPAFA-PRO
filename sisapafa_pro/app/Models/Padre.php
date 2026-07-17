<?php

class Padre
{
    private PDO $db;

    public function __construct(PDO $pdo)
    {
        $this->db = $pdo;
    }

    public function total()
    {
        return $this->db->query("SELECT COUNT(*) FROM padres")->fetchColumn();
    }

    public function listar()
    {
        $sql = $this->db->query("
            SELECT *
            FROM padres
            WHERE estado=1
            ORDER BY apellidos,nombres
        ");

        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function guardar($datos)
    {
        $sql = $this->db->prepare("
            INSERT INTO padres
            (
                dni,
                nombres,
                apellidos,
                direccion,
                telefono,
                correo
            )
            VALUES (?,?,?,?,?,?)
        ");

        return $sql->execute([
            $datos['dni'],
            strtoupper($datos['nombres']),
            strtoupper($datos['apellidos']),
            strtoupper($datos['direccion']),
            $datos['telefono'],
            strtolower($datos['correo'])
        ]);
    }

    public function buscarDni($dni)
    {
        $sql = $this->db->prepare("
            SELECT id
            FROM padres
            WHERE dni=?
        ");

        $sql->execute([$dni]);

        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function obtener($id)
    {
        $sql = $this->db->prepare("
            SELECT *
            FROM padres
            WHERE id=?
        ");

        $sql->execute([$id]);

        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizar($datos)
    {
        $sql = $this->db->prepare("
            UPDATE padres
            SET
                dni=?,
                nombres=?,
                apellidos=?,
                direccion=?,
                telefono=?,
                correo=?
            WHERE id=?
        ");

        return $sql->execute([
            $datos['dni'],
            strtoupper($datos['nombres']),
            strtoupper($datos['apellidos']),
            strtoupper($datos['direccion']),
            $datos['telefono'],
            strtolower($datos['correo']),
            $datos['id']
        ]);
    }

    public function desactivar($id)
    {
        $sql = $this->db->prepare("
            UPDATE padres
            SET estado=0
            WHERE id=?
        ");

        return $sql->execute([$id]);
    }
}