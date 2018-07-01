<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Inicio de Sesión</title>
        <link rel="stylesheet" type="text/css" href="../view/css/fontawesome-all.css">
        <link rel="stylesheet" type="text/css" href="../view/css/login.css">
        <script type="text/javascript" src="js/validaciones.js"></script>


    </head>
    <body >


       
           
            <section class="titulo">
                <h1>CYCLO AVENTURA</h1>
                <p>TU MEJOR EXPERIENCIA</p>


            </section>

            <form action="../controller/controller.php">


                <section class="login">

                    <i class="ico_usuario fas fa-user-tie" aria-hidden="true"></i>
                    <input type="text" name="usuario" placeholder="Usuario" class="nombre" required/></br>
                    <i class="ico_password fas fa-unlock-alt" aria-hidden="true"></i>
                    <input type="password" name="contrasena" placeholder="Contraseña" class="password" required/></br>

                </section>
                <input type="hidden" value="entrar" name="opcion">
                <button type="submit" class="button-ingresar">
                    <i class="ico_entrar fas fa-caret-right"></i>
                </button>

            </form></br>

    </body>
</html>
