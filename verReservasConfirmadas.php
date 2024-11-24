<?php
    // conexion_start();
    require_once 'controladores/reservas.php';
    $objReservaControlador = new ReservasControlador();
    
    if($reservas = $objReservaControlador->CreservasConfirmadas()){
        require_once 'vistas/vistaVerReservasConfirmadasAdmin.php';
    }else{
        if($reservas==false){
            require_once 'vistas/vistaVerReservasConfirmadasAdmin.php';
        }else{
            $msg = 'Ha habido un error.';
            require_once 'vistas/vistaError.php';
        }
        
    }
?>