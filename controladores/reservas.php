<?php
    class ReservasControlador {
        private $objReservasModelo;

        function __construct(){
            require_once ('modelo/reservasModelo.php');
            $this->objReservasModelo = new ReservasModelo();
            
        }

        public function CvisualizarReservasUsuario($idUsuario){
            if($reservas = $this->objReservasModelo->MvisualizarReservasUsuario($idUsuario)){
                return $reservas;
            }else{
                return 0;
            }
        }

        public function CreservasConfirmadas(){
            if($reservas = $this->objReservasModelo->MreservasConfirmadas()){
                return $reservas;
            }else{
                return false;
            }
        }
        public function CreservasNoConfirmadas(){
            if($resultado = $this->objReservasModelo->MreservasNoConfirmadas()){
                return $resultado;
            }else{
                return false;
            }
        }
        public function CguardadoAlumnosConReservaVerificada($resultado){
            if ($resultado->num_rows > 0) {
                // Almacenamos los resultados por alumno
                $alumnos = [];

                while ($fila = $resultado->fetch_assoc()) {
                    $alumnos[$fila['nombreAlumno']]['curso'] = $fila['codCurso'];
                    $alumnos[$fila['nombreAlumno']]['libros'][] = [
                        'titulo' => $fila['titulo'],
                        'isbn' => $fila['isbn']
                    ];
                }
                return $alumnos;
            }else{
                return 0;
            }
        }
        public function CaprobarReservas($nombreAlumno){
            if($this->objReservasModelo->MaprobarReservas($nombreAlumno)){
                return true;
            }else{
                return false;
            }

        }
        public function CdenegarReservas($nombreAlumno){
            if($this->objReservasModelo->MdenegarReservas($nombreAlumno)){
                return true;
            }else{
                return false;
            }

        }
        public function cConfirmarEntrega(){
            if($reservas = $this->objReservasModelo->mConfirmarEntrega()){
                return $reservas;
            }else{
                return false;
            }
        }
        public function cConfirmarEntrega2($idUsuario){
            $fechaActual = date("Y-m-d");
            if($this->objReservasModelo->mConfirmarEntrega2($idUsuario, $fechaActual)){
                return true;
            }else{
                return false;
            }
        }
    }
?>