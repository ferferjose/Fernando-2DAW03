<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php
        require_once 'vistas/elementos/header.php';
        require_once 'vistas/elementos/navAdmin.php';
    ?>
    <main>
        <div class="tabla">
            <div class="container">
                <h1>Confirmar recepcion</h1>
                <?php
                if(is_array($reservas)){
                    foreach ($reservas as $nombreAlumno => $reservasAlumno) { // $reservasAlumno es un array de reservas
                        echo '<table class="tableConfirmar">';
                        echo '<tr><td>Alumno</td><td>' . $nombreAlumno . '</td></tr>';
    
                        foreach ($reservasAlumno as $reserva) { // Iteramos sobre cada reserva del alumno
                            echo '<tr>';
                            echo '<td>Curso</td><td>' . $reserva['codCurso'] . '</td>';
                            echo '</tr>';
                            echo '<tr>';
                            echo '<td>Libro</td><td>' . $reserva['titulo'] . '</td>';
                            echo '</tr>';
                            echo '<tr>';
                            echo '<td>ISBN</td><td>' . $reserva['isbn'] . '</td>';
                            echo '</tr>';
                            echo '<tr>';
                            echo '<td colspan="2">';
                            echo '<form method="POST" action="cambiarEstadoEntregado.php">';
                            echo '<input type="hidden" name="idReserva" value="' . $reserva['idReserva'] . '">';
                            echo '<input class="boton mb-2" type="submit" value="Confirmar recepción">';
                            echo '</form>';
                            echo '</td>';
                            echo '</tr>';
                        }
    
                        echo '</table>';
                    }
                }else{
                    echo '<p class="mb-2">No hay reservas por confirmar</p>';
                }
                    
                    
                ?>
                <a href="index.html" class="boton">Volver</a>
            </div>
            
        </div>
    </main>
    <?php
        require_once 'vistas/elementos/footer.php';
    ?>
</body>
</html>