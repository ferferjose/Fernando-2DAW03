<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva de libros</title>
</head>
<body>
    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservar libros</title>
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
                <h1>Reservas confirmadas</h1>
                <?php
                    
                    if($reservas){
                        echo '<table>';
                        foreach($reservas as $reserva) {
                            echo '<tr>';
                            echo '<td>' . $reserva['nombreAlumno'] . '</td>';
                            echo '<td>' . $reserva['codCurso'] . '</td>';
                            echo '<td>' . $reserva['titulo'] . ' : ' . $reserva['isbn'] . '</td>';
                            echo '</tr>';
                        }
                            
                        echo '</table>';
                    }else{
                        echo '<p>No hay reservas confirmadas</p>';
                    }
                    
                    ?>

                <a href="index.html" class="boton mt-2">Volver</a>
            </div>
        </div>
    </main>
    <?php
        require_once 'vistas/elementos/footerAdmin.php';
    ?>
</body>
</html>