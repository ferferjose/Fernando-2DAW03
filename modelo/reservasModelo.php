<?php

    class ReservasModelo{
        private $conexion;
        function __construct(){
            require_once 'config/configDb.php';

            $this->conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD); //Conecta con la base de datos
            $this->conexion->set_charset("utf8"); //Usa juego caracteres UTF8
            $controlador = new mysqli_driver();//Desactivar errores
            $controlador->report_mode = MYSQLI_REPORT_OFF;//Desactivar errores
            $texto_error=$this->conexion->errno;

        }

        public function MvisualizarReservasUsuario($idUsuario){
            $sql = 'SELECT 
                        reservas.nombreAlumno, 
                        libros.titulo, 
                        cursos.codCurso, 
                        reservas_libros.estado
                    FROM reservas
                    INNER JOIN reservas_libros ON reservas.idReserva = reservas_libros.idReserva
                    INNER JOIN libros ON reservas_libros.idLibro = libros.idLibro
                    INNER JOIN cursos ON reservas.codCurso = cursos.codCurso
                    WHERE reservas.idUsuario = '.$idUsuario.';';

            $resultado = $this->conexion->query($sql);

            if($resultado->num_rows > 0){
                $librosPorUser = [];
                while($fila = $resultado->fetch_assoc()){
                    $librosPorUser[$fila['nombreAlumno']][] = [
                        "titulo" => $fila['titulo'],
                        "curso" => $fila['codCurso'],
                        "estado" => $fila['estado']
                    ];
                }
                return $librosPorUser;
            }else {
                return false;
            }

        }
        public function MreservasConfirmadas(){
            $sql = 'SELECT 
                    reservas.nombreAlumno, 
                    cursos.codCurso, 
                    libros.titulo, 
                    libros.isbn
                    FROM reservas
                    INNER JOIN reservas_libros ON reservas.idReserva = reservas_libros.idReserva
                    INNER JOIN libros ON reservas_libros.idLibro = libros.idLibro
                    INNER JOIN cursos ON reservas.codCurso = cursos.codCurso
                    WHERE reservas_libros.estado = "P"';

            $resultado = $this->conexion->query($sql);
            if($resultado->num_rows >= 0){
                $reservas = [];
                while ($fila = $resultado->fetch_assoc()){
                    $reserva[] = $fila;
                }
                return $reservas;
            }else{
                return false;
            }
        }
        public function MreservasNoConfirmadas(){
            $sql = 'SELECT 
                    reservas.nombreAlumno, 
                    reservas.fechaReserva,
                    cursos.codCurso, 
                    libros.titulo, 
                    libros.isbn
                    FROM reservas
                    INNER JOIN reservas_libros ON reservas.idReserva = reservas_libros.idReserva
                    INNER JOIN libros ON reservas_libros.idLibro = libros.idLibro
                    INNER JOIN cursos ON reservas.codCurso = cursos.codCurso
                    WHERE reservas_libros.estado = "N" ORDER BY reservas.fechaReserva;';

            $resultado = $this->conexion->query($sql);
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
            }
        }
        public function MaprobarReservas($nombreAlumno){
            $sql = 'UPDATE reservas_libros rl
                JOIN reservas r ON rl.idReserva = r.idReserva
                SET rl.estado = "P"
                WHERE r.nombreAlumno = "'.$nombreAlumno.'"';

            if($resultado = $this->conexion->query($sql)){
                return true;
            }else{
                return false;
            }

        }
        public function MdenegarReservas($nombreAlumno){
            $sql = 'DELETE rl FROM reservas_libros rl
            JOIN reservas r ON rl.idReserva = r.idReserva
            WHERE r.nombreAlumno = "' . $nombreAlumno . '";';

            $resultado = $this->conexion->query($sql);
            
            $sql = 'DELETE r FROM reservas r
                WHERE r.nombreAlumno = "' . $nombreAlumno . '";';

            if($resultado = $this->conexion->query($sql)){
                return true;
            }else{
                return false;
            }

        }
        public function mConfirmarEntrega(){
            $sql = 'SELECT 
                reservas.nombreAlumno, 
                reservas.fechaReserva,
                cursos.codCurso, 
                libros.titulo, 
                libros.isbn, 
                reservas.idReserva
                FROM reservas_libros
                INNER JOIN reservas ON reservas_libros.idReserva = reservas.idReserva
                INNER JOIN libros ON reservas_libros.idLibro = libros.idLibro
                INNER JOIN cursos ON reservas.codCurso = cursos.codCurso
                WHERE reservas_libros.estado = "P" ORDER BY reservas.fechaReserva;';

            $resultado = $this->conexion->query($sql);
            if ($resultado) {
                // Almacenamos los resultados por alumno
                $reservas = [];

                while ($fila = $resultado->fetch_assoc()) {
                    $reservas[$fila['nombreAlumno']][] = [
                        'codCurso' => $fila['codCurso'],
                        'titulo' => $fila['titulo'],
                        'isbn' => $fila['isbn'],
                        'idReserva' => $fila['idReserva']
                    ];
                }
                return $reservas;
            }else{
                return false;
            }
        }
        public function mConfirmarEntrega2($idReserva, $fechaActual){
            $sql1 = 'UPDATE reservas_libros
                SET estado = "E"
                WHERE idReserva = "'.$idReserva.'";';

            $sql2 = 'UPDATE reservas
                SET fechaEntrega = "'.$fechaActual.'"
                WHERE idReserva = "'.$idReserva.'";';
            if($resultado = $this->conexion->query($sql1) && $resultado = $this->conexion->query($sql2)){
                return true;
            }else{
                return false;
            }

        }
    }
?>