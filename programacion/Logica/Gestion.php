<?php

/**
 * Sistema de Gestión de Recursos y Soporte de Informática (SGRSI)
 * Archivo de gestión general: Gestion.php
 * Maneja la lógica para usuarios, fechas y otros elementos del sistema.
 */

class Usuario {
    private $id;
    private $nombre;
    private $tipoUsuario; // Ejemplo: 'admin', 'tecnico', 'usuario'
    private $fechaRegistro;
    private $fechaUltimoAcceso;

    public function __construct($id, $nombre, $tipoUsuario, $fechaRegistro = null) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->tipoUsuario = $tipoUsuario;
        $this->fechaRegistro = $fechaRegistro ?: date('Y-m-d H:i:s');
        $this->fechaUltimoAcceso = date('Y-m-d H:i:s');
    }

    public function getTipoUsuario() {
        return $this->tipoUsuario;
    }

    public function setTipoUsuario($tipoUsuario) {
        $this->tipoUsuario = $tipoUsuario;
    }

    public function getFechaRegistro() {
        return $this->fechaRegistro;
    }

    public function getFechaUltimoAcceso() {
        return $this->fechaUltimoAcceso;
    }

    public function actualizarUltimoAcceso() {
        $this->fechaUltimoAcceso = date('Y-m-d H:i:s');
    }

    // Otros métodos según sea necesario
}

// Ejemplo de uso
// $usuario = new Usuario(1, 'Juan Pérez', 'admin');
// echo $usuario->getTipoUsuario(); // admin
// echo $usuario->getFechaRegistro(); // Fecha actual

?>