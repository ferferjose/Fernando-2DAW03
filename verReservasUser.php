<?php
    // conexion_start();
    require_once 'controladores/reservas.php';
    $objReservaControlador = new ReservasControlador();
    if($reservas = $objReservaControlador->CvisualizarReservasUsuario(1)){
        require_once 'vistas/vistaVerReservasUser.php';
    }else{
        $msg = 'Ha habido un error al visualizar tus reservas';
        require_once 'vistas/vistaError.php';
    }
?>