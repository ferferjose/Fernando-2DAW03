<?php
    // conexion_start();
    require_once 'controladores/reservas.php';
    $objReservaControlador = new ReservasControlador();
    
    if($alumnos = $objReservaControlador->CreservasNoConfirmadas()){
        require_once 'vistas/vistaVerificarReservas.php';
    }else{
        $msg = 'Ha habido un error.';
        require_once 'vistas/vistaError.php';
    }
?>