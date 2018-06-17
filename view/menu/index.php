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
    </head>
    <body>


        <section class="titulo_menu">
             <p>CYCLO AVENTURA</p>
            <h1>MENÚ PRINCIPAL</h1>       
        </section>

     
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
