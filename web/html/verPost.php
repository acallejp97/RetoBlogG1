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
    <header>
        <form action="nose.php" method="POST">
            Usuario : <input type="text" id="usuario" />
            Password : <input type="Password" id="password" />
            <input type="submit" value="Loguear" name="Loguear">
        </form>
        <form action="registro.html" method="POST">
            <input type="submit" value="Registrarse" name="Registrarse">
        </form>
    </header>
    <section>
        <label id="TituloPost">asfas</label>
        <br>
        <label id="FechaPost">asfasf</label>
        <br>
        <p id="ContenidoPost">asfasfasfsf</p>
        <form action="nose.php" method="POST">
            Texto <textarea name="ComentarioPost" id="ComentarioPost" cols="30" rows="10"></textarea>
            <br><br>
            <input type="submit" value="Enviar" name="Enviar">
            <input type="reset" value="Limpiar" name="Limpiar">
        </form>
    </section>


    <footer>
        <a href="index.html">Volver al inicio</a>
    </footer>
</body>

</html>