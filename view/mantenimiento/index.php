<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8"> 
        <title>Registro</title>
        <link rel="stylesheet" type="text/css" href="../css/fontawesome-all.css">
        <script src="../js/jquery-2.1.4.js"></script>
        <script src="../js/bootstrap-table.js"></script>
        <link href="../css/bootstrap-table.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../css/mantenimiento.css">
        <script type="text/javascript" src="../js/validaciones.js"></script>
        <link rel="stylesheet" href="../css/jquery.dataTables.min.css">
        <script src="../js/jquery-3.3.1.min.js"></script>
        <script src="../js/jquery.dataTables.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/menuToggle.css">

        <script>
            $(document).ready(function () {
                $('#tablaMante').DataTable();
            });
        </script>
    </head>

    <body onload="openSideMenu()">

        <div id="contenedor"> 

            <div id="cuerpo"> 
                <div id="lateral">


                    <nav class="navbar">
                        <span class="open-slide">
                            <a href="#" onclick="openSideMenu()" >
                                <svg width="30" height="30">
                                <path d="M0,2 20,2" stroke="#777777" stroke-width="2"/>
                                <path d="M0,6 20,6" stroke="#777777" stroke-width="2"/>
                                <path d="M0,10 20,10" stroke="#777777" stroke-width="2"/>
                            </a>
                        </span>


                    </nav>
                    <div id="side-menu" class="side-nav">
                        <a href="#" class="btn_close" onclick="closeSideMenu()">  
                            <svg width="30" height="12">
                            <path d="M0,2 20,2" stroke="#fff" stroke-width="2"/>
                            <path d="M0,6 20,6" stroke="#fff" stroke-width="2"/>
                            <path d="M0,10 20,10" stroke="#fff" stroke-width="2"/>
                        </a>

                        <a href="#" > <i class="fa fa-home" aria-hidden="true"></i> Inicio</a>

                        <a href="../empleado/index.php" > <i class="fas fa-clipboard-check"></i> Registros</a>
                        <li>
                            <ul><a href="../empleado/index.php" ><i class="ico_inicio fas fa-user-tie" aria-hidden="true"></i> Empleados</a></ul>
                            <ul><a href="../usuario/index.php" ><i class="ico_inicio fa fa-user" aria-hidden="true"></i> Usuarios</a></ul>
                            <ul><a href="../cliente/index.php" ><i class="ico_inicio fas fa-user-tag" aria-hidden="true"></i> Clientes</a></ul>
                            <ul><a href="../coche/index.php" ><i class="ico_inicio fas fa-bus" aria-hidden="true"></i> Coches</a></ul>
                            <ul><a href="../categoria/index.php" ><i class="ico_inicio fas fa-tags" aria-hidden="true"></i> Categorias</a></ul>
                        </li>
                        <a href="../alquiler/index.php"><i class="fas fa-stopwatch" aria-hidden="true"></i> Alquiler</a>
                        <a href="../inventario/index.php"><i class="fas fa-clipboard-list" aria-hidden="true"></i> Inventario</a>
                        <a href="../mantenimiento/index.php"><i class="fas fa-toolbox" aria-hidden="true"></i> Mantenimiento</a>
                        <a href="../reportes/index.php"><i class=" fas fa-chart-line" aria-hidden="true"></i> Reportes</a>
                    </div>

                    <script>
                        function openSideMenu()
                        {
                            document.getElementById('side-menu').style.width = '200px';
                            document.getElementById('principal').style.marginLeft = '200px';
                        }
                        function closeSideMenu()
                        {
                            document.getElementById('side-menu').style.width = '0px';
                            document.getElementById('principal').style.marginLeft = '0px';
                        }
                    </script>

                </div>
                <div id="principal"> 
                    <section class="titulo_menu">
                        <p>CYCLO AVENTURA</p>
                        <h1>MANTENIMIENTO</h1>       
                    </section>

                    <div id="contenedor">
                        <div id="lateral2">



                            <form action="../../controller/controller.php">

                                <section class="datos">

                                    <div>Coche</div>
                                    <i class="ico_tipo fas fa-bus" aria-hidden="true"></i>
                                    <select name="tipo" class="tipo" >
                                        <option value="" disabled selected>Seleccionar</option>

                                        <?php
                                        include '../../model/Coches.php';
                                        $registro = unserialize($_SESSION['lista_coche']);
                                        foreach ($registro as $dato) {
                                            $opcion = "<option value=\"" . $dato->getId_coche() . "\">" . $dato->getDescripcion_coche() . "</option> ";
                                            echo $opcion;
                                        }
                                        ?>

                                    </select></br>

                                    <div>Descripcion del daño</div>
                                    <i class="ico_descripcion fas fa-comment" aria-hidden="true"></i>
                                    <input type="text" name="descripcion" placeholder="Descripcion" class="descripcion" required/></br>
                                    <div>Estado</div>
                                    <i class="ico_descripcion fas fa-power-off" aria-hidden="true"></i>
                                    <select name="estado" class="tipo2" >

                                        <option value="Activo" >Activo</option> 
                                        <option value="Inactivo">Inactivo</option> 

                                    </select></br>
                                    <div>Fecha de ingreso</div>
                                    <i class="ico_calendario far fa-calendar-alt" aria-hidden="true"></i>
                                    <input type="date" value="<?php echo date("Y-m-d"); ?>" name="fecha_ingreso" placeholder="dd/mm/aaaa" class="fecha" required/></br>
                                    <div>Fecha de salida</div>
                                    <i class="ico_calendario far fa-calendar-alt" aria-hidden="true"></i>
                                    <input type="date" value="<?php echo date("Y-m-d"); ?>" name="fecha_salida" placeholder="dd/mm/aaaa" class="fecha" required/></br></br>

                                    <input type="hidden" value="guardar_mantenimiento" name="opcion">
                                    <button type="submit" class="button-guardar">
                                        <i class="ico_guardar far fa-save" aria-hidden="true"></i>
                                    </button>
                                    <a target="_blank" href="reporte.php" class="imprimir">
                                        <i class="fas fa-print"></i></a>
                                  
                                </section>

                            </form>
                        </div>
                        <div id="principal2">


                            <section class="datosTabla"> 
                                <table data-toggle="table" id="tablaMante" class="display"> 
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>COCHE</th>
                                            <th>CATEGORÍA</th>
                                            <th>DESCRIPCIÓN</th>
                                            <th>ESTADO</th>
                                            <th>FECHA DE INGRESO</th>
                                            <th>FECHA DE SALIDA</th>
                                            <th>ACTUALIZAR</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include '../../model/Mantenimiento.php';

                                        if (isset($_SESSION['lista_mantenimiento'])) {

                                            $registro = unserialize($_SESSION['lista_mantenimiento']);

                                            foreach ($registro as $dato) {
                                                echo "<tr>";
                                                echo "<td>" . $dato->getId() . "</td>";
                                                echo "<td>" . $dato->getId_coche() . "</td>";
                                                echo "<td>" . $dato->getId_tipo() . "</td>";
                                                echo "<td>" . $dato->getDano() . "</td>";
                                                echo "<td>" . $dato->getEstado() . "</td>";
                                                echo "<td>" . $dato->getIngreso() . "</td>";
                                                echo "<td>" . $dato->getSalida() . "</td>";
                                                echo "<td><a href='../../controller/controller.php?opcion=cargar_mantenimiento&id=" . $dato->getId() . "' class=\"actualizar\"><i class=\"ico_actualizar fas fa-pencil-alt\" aria-hidden=\"true\"></i></a></td>";

                                                echo "</tr>";
                                            }
                                        } else {
                                            
                                        }
                                        ?>
                                    </tbody>

                                </table>
                            </section>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </body>
</html>
