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
        <script>
            $(document).ready(function () {
                $('#tablaMante').DataTable();
            });
        </script>
    </head>
    <body >

        <section class="titulo_menu">
            <p>CYCLO AVENTURA</p>
            <h1>MANTENIMIENTO</h1>       
        </section>

        <nav>

            <ul>


                <li>
                    <div class="tooltip"> 
                        <a href="../menu/index.php" class="home"> 
                            <i class="ico_inicio fa fa-home" aria-hidden="true"></i></a>
                        <span class="tooltiptext">Menú</span>
                    </div>
                </li>


        </nav>




        <form action="../../controller/controller.php">

            <section class="datos">

                <div>Coche</div>
                <i class="ico_tipo fas fa-bus" aria-hidden="true"></i>
                <select name="tipo" class="tipo" >

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
                <input type="date" max="datetime-local" name="fecha_ingreso" placeholder="dd/mm/aaaa" class="fecha" required/></br>
                <div>Fecha de salida</div>
                <i class="ico_calendario far fa-calendar-alt" aria-hidden="true"></i>
                <input type="text" name="fecha_salida" placeholder="dd/mm/aaaa" class="fecha" required/></br></br>




                <input type="hidden" value="guardar_mantenimiento" name="opcion">
                <button type="submit" class="button-guardar">
                    <i class="ico_guardar far fa-save" aria-hidden="true"></i>
                </button>
            </section>

        </form>




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
                    <th>ELIMINAR</th>
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
                        echo "<td><a href='../../controller/controller.php?opcion=eliminar_mantenimiento&id=" . $dato->getId() . "' class=\"eliminar\"><i class=\"ico_borrar far fa-trash-alt\" aria-hidden=\"true\"></i></a></td>";
                        echo "<td><a href='../../controller/controller.php?opcion=cargar_mantenimiento&id=" . $dato->getId() . "' class=\"actualizar\"><i class=\"ico_actualizar fas fa-pencil-alt\" aria-hidden=\"true\"></i></a></td>";

                        echo "</tr>";
                    }
                } else {
                    
                }
                ?>
            </tbody>

        </table>



    </body>
</html>
