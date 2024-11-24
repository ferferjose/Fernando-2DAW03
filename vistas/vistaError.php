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
                <h1>Uuups...</h1>
                <p>
                    <?php
                        echo $msg;
                    ?>
                </p>
                <a href="index.html" class="boton mt-2">Volver</a>

            </div>
        </div>
        
        
    </main>
    <?php
        require_once 'vistas/elementos/footer.php';
    ?>
</body>
</html>