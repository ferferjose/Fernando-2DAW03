
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
            require_once 'vistas/elementos/nav.php';
    ?>
    <main>
        <div class="tabla">
        <div class="container">
                <h1>Tus reservas</h1>
                <?php
                    if ($reservas != 0) {
                        foreach ($reservas as $nombreAlumno => $libros) {
                            echo '<h2>' . $nombreAlumno . '</h2>';
                            echo '<table>';
                    
                            foreach ($libros as $libro) {
                                echo '<tr>';
                                echo '<td><strong>Libro</strong></td>';
                                echo '<td>' . $libro['titulo'] . '</td>';
                                echo '</tr>';
                    
                                echo '<tr>';
                                echo '<td><strong>Curso</strong></td>';
                                echo '<td>' . $libro['curso'] . '</td>';
                                echo '</tr>';
                    
                                echo '<tr>';
                                echo '<td><strong>Estado</strong></td>';
                                echo '<td>' . $libro['estado'] . '</td>';
                                echo '</tr>';
                    
                                echo '<tr><td>---------</td><td>---------</td></tr>';
                            }
                    
                            echo '</table>';
                        }
                    } else {
                        echo '<p>No tienes ninguna reserva</p>';
                    }
                    
                    
                ?>

                <a href="index.html" class="boton mt-2">Volver</a>
            </div>
        </div>
    </main>
    <?php
        require_once 'vistas/elementos/footer.php';
    ?>
</body>
</html>