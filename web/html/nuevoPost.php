<?php
session_start();
?>

<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="title" content="G1Blog">
    <title>G1Blog</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <section class="text-left">
        <form action="" method="POST">
            Titulo : <input type="text" name="titulo" />
            <br><br>
            Texto : <textarea name="Texto" name="texto" cols="55" rows="10"></textarea>
            <br><br>
            Publicado : <input type="checkbox" name="Publicado" />
            <br><br>
            <input type="submit" value="Enviar" name="Enviar">
            <input type="reset" value="Limpiar" name="Limpiar">
        </form>
    </section>

    <footer>
        <a href="about.html">About</a>
        <a href="index1.php">Volver al inicio</a>
    </footer>
</body>

</html>