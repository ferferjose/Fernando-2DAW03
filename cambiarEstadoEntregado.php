<?php
    // conexion_start();
    require_once 'controladores/reservas.php';
    $objReservaControlador = new ReservasControlador();
    
    if($objReservaControlador->cConfirmarEntrega2($_POST['idReserva'])){
        require_once 'vistas/vistaConfirmarFinal.php';
    }else{
        $msg = 'Error al intentar confirmar la entrega.';
        require_once 'vistas/vistaError.php';
    }
?>