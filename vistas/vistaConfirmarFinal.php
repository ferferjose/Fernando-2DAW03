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
                <p class="mb-2">Entrega confirmada</p>
                <a href="confirmarEntrega.php" class="boton">Volver</a>
            </div>
            
        </div>
    </main>
    <?php
        require_once 'vistas/elementos/footer.php';
    ?>
</body>
</html>