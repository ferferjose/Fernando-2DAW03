<?php
    // conexion_start();
    require_once 'controladores/reservas.php';
    $objReservaControlador = new ReservasControlador();
    
    if($reservas = $objReservaControlador->cConfirmarEntrega()){
        require_once 'vistas/vistaConfirmarEntrega.php';
    }else{
        if($reservas = $objReservaControlador->cConfirmarEntrega() == false){
            require_once 'vistas/vistaConfirmarEntrega.php';
        }else{
            $msg = 'Ha habido un error.';
            require_once 'vistas/vistaError.php';
        }
        
    }
?>