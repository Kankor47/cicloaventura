<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Menú</title>
        <link rel="stylesheet" type="text/css" href="../css/fontawesome-all.css">
        <link rel="stylesheet" type="text/css" href="../css/menu.css">
        <link rel="stylesheet" type="text/css" href="../css/menuToggle.css">
    </head>
    <body>




        <nav class="navbar">
            <span class="open-slide">
                <a href="#" onclick="openSideMenu()">
                    <svg width="30" height="30">
                    <path d="M0,2 20,2" stroke="#777777" stroke-width="2"/>
                    <path d="M0,6 20,6" stroke="#777777" stroke-width="2"/>
                    <path d="M0,10 20,10" stroke="#777777" stroke-width="2"/>
                </a>
            </span>
            <div class="nombreSistema">CICLO AVENTURA</div>
            

        </nav>
        <div id="side-menu" class="side-nav">
            <a href="#" class="btn_close" onclick="closeSideMenu()">  
                <svg width="30" height="12">
                <path d="M0,2 20,2" stroke="#fff" stroke-width="2"/>
                <path d="M0,6 20,6" stroke="#fff" stroke-width="2"/>
                <path d="M0,10 20,10" stroke="#fff" stroke-width="2"/>
            </a>
           
            <a href="#" > <i class="fa fa-home" aria-hidden="true"></i> Inicio</a>

            <a href="#" > <i class="fas fa-clipboard-check"></i> Registros</a>
            <li>
                <ul><a href="#" ><i class="ico_inicio fas fa-user-tie" aria-hidden="true"></i> Empleados</a></ul>
                <ul><a href="#" ><i class="ico_inicio fa fa-user" aria-hidden="true"></i> Usuarios</a></ul>
                <ul><a href="#" ><i class="ico_inicio fas fa-user-tag" aria-hidden="true"></i> Clientes</a></ul>
                <ul><a href="#" ><i class="ico_inicio fas fa-bus" aria-hidden="true"></i> Coches</a></ul>
                <ul><a href="#" ><i class="ico_inicio fas fa-tags" aria-hidden="true"></i> Categorias</a></ul>
            </li>
            <a href="#"><i class="fas fa-stopwatch" aria-hidden="true"></i> Alquiler</a>
            <a href="#"><i class="fas fa-clipboard-list" aria-hidden="true"></i> Inventario</a>
            <a href="#"><i class="fas fa-toolbox" aria-hidden="true"></i> Mantenimiento</a>
            <a href="#"><i class=" fas fa-chart-line" aria-hidden="true"></i> Reportes</a>
        </div>

        <script>
            function openSideMenu()
            {
                document.getElementById('side-menu').style.width = '200px';
            }
            function closeSideMenu()
            {
                document.getElementById('side-menu').style.width = '0px';
            }
        </script>

    
        <section class="menu">
            <form action="../../controller/controller.php">
                <input type="hidden" value="registrar" name="opcion">
                <button type="submit" class="button-registro">
                    <i class="ico_registro fas fa-plus" aria-hidden="true"></i></br><b>REGISTRO</b>
                </button>
            </form>

            <form action="../../controller/controller.php">
                <input type="hidden" value="alquiler" name="opcion">
                <button type="submit" class="button-alquiler">
                    <i class="ico_alquiler fas fa-stopwatch" aria-hidden="true"></i></br><b>ALQUILER</b>
                </button>
            </form>

            <form action="../../controller/controller.php">
                <input type="hidden" value="inventario" name="opcion">
                <button type="submit" class="button-inventario">
                    <i class="ico_inventario fas fa-clipboard-list" aria-hidden="true"></i></br><b>INVENTARIO</b>
                </button>
            </form>

            <form action="../../controller/controller.php">
                <input type="hidden" value="mantenimiento" name="opcion">
                <button type="submit" class="button-mantenimiento">
                    <i class="ico_mantenimiento fas fa-toolbox" aria-hidden="true"></i></br><b>MANTENIMIENTO</b>
                </button>
            </form>

            <form action="../../controller/controller.php">
                <input type="hidden" value="reportes" name="opcion">
                <button type="submit" class="button-reporte">
                    <i class="ico_reporte fas fa-chart-line" aria-hidden="true"></i></br><b>REPORTES</b>
                </button>
            </form>


        </section>


    </body>
</html>
