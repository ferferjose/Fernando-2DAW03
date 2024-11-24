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
                <h1>Verificar reservas</h1>
                <?php
                    if($alumnos != 0){
                        echo '<table id="verificarReservas">';
                        
                        // Recorremos los alumnos y mostramos sus reservas
                        foreach ($alumnos as $nombreAlumno => $valor) {
                            echo '<tr>';
                            echo '<td>' . $nombreAlumno . '</td>';
                            echo '<td>' . $valor['curso'] . '</td>';
                            
                            // Mostramos los libros y sus ISBN
                            echo '<td>';
                            foreach ($valor['libros'] as $libro) {
                                echo '<p>' . $libro['titulo'] . ' : ' . $libro['isbn'] . '</p>';
                            }
                            echo '</td>';
                            
                            // Botón para ver justificante
                            echo '<td><a class="boton" href="justificantes/1.pdf">Ver justificante</a></td>';
                            
                            // Botones para aprobar o denegar
                            echo '<td>';
                            echo '<form action="aprobarReservas.php" method="POST">';
                            echo '<input type="hidden" value="'.$nombreAlumno.'" name="nombre">';
                            echo '<input type="submit" value="Aprobar" class="boton aprobar">';
                            echo '</form>';
                            echo '<form action="denegarReservas.php" method="POST">';
                            echo '<input type="hidden" value="'.$nombreAlumno.'" name="nombre">';
                            echo '<input type="submit" value="Denegar" class="boton denegar">';
                            echo '</form>';
                            echo '</td>';
                            
                            echo '</tr>';
                        }
                        echo '</table>';
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