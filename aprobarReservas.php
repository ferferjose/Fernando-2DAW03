<?php
    // conexion_start();
    require_once 'controladores/reservas.php';
    $objReservaControlador = new ReservasControlador();
    
    if($alumno = $objReservaControlador->CaprobarReservas($_POST['nombre'])){
        require_once 'vistas/vistaVerificarReservas.php';
    }else{
        $msg = 'Ha habido un error al visualizar tus reservas';
        require_once 'vistas/vistaError.php';
    }
?>