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
        <script type="text/javascript" src="../js/validaciones.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/registroCoche.css">
        <link rel="stylesheet" href="../css/jquery.dataTables.min.css">
        <script src="../js/jquery-3.3.1.min.js"></script>
        <script src="../js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#tablaAlqui').DataTable();
            });
        </script>


    </head>
    <body >

        <section class="titulo_menu">
            <p>CYCLO AVENTURA</p>
            <h1>ALQUILER</h1>       
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
                <div>Cliente</div>
                <i class="ico_cedula fas fa-user-tie" aria-hidden="true"></i>
<!--                <select name="id_cli" class="tipo">
                    //<?php
                //include '../../model/Cliente.php';
                //$regis=inserialize($_SESSION['lista_cliente']);
                //foreach ($regis as $dato1) {
                //$opcion = "<option value=\"" . $dato1->getId() . "\">" . $dato1->getNombres() . "</option> ";
                //echo $opcion;
                //}
                //?>
                </select>-->
                <input type="text" name="id_cli" placeholder="Cliente" class="direccion" required/></br>
                <div>Empleado</div>
                <i class="ico_cedula fas fa-user-tie" aria-hidden="true"></i>
                <select name="id_emp" class="tipo" >
                    <?php
                    include '../../model/Empleado.php';
                    $registro = unserialize($_SESSION['lista_empleado']);
                    foreach ($registro as $dato) {
                        $opcion = "<option value=\"" . $dato->getId() . "\">" . $dato->getNombres() . "</option> ";
                        echo $opcion;
                    }
                    ?>
                </select></br>
                <div>Coche</div>
                <i class="fa-car" aria-hidden="true"></i>
                <div>Valor</div>
                <div>Tiempo de Salida</div>
                <div>Tiempo de Llegada</div>
                <div>Valor Total</div>
                <i class="ico_direccion fas fa-map-marker-alt" aria-hidden="true"></i>
                <input type="text" name="valor_total" placeholder="Valor Total" class="direccion" required/></br>
                <input type="hidden" value="guardar_alquiler" name="opcion">
                <button type="submit" class="button-guardar">
                    <i class="ico_guardar far fa-save" aria-hidden="true"></i>
                </button>
            </section>
        </form>

        <table data-toggle="table" id="tablaAlqui" class="display"> 
            <thead>
                <tr>
                    <th>ID</th>
                    <th>CLIENTE</th>
                    <th>EMPLEADO</th>
                    <th>VALOR TOTAL</th>
                    <th>ELIMINAR</th>
                    <th>ACTUALIZAR</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../../model/Alquiler.php';
                if (isset($_SESSION['lista_alquiler'])) {
                    $registro = unserialize($_SESSION['lista_alquiler']);
                    foreach ($registro as $dato) {
                        echo "<tr>";
                        echo "<td>" . $dato->getId_alqui() . "</td>";
                        echo "<td>" . $dato->getId_cli() . "</td>";
                        echo "<td>" . $dato->getId_emp() . "</td>";
                        echo "<td>" . $dato->getValor_total() . "</td>";
                        echo "<td><a href='../../controller/controller.php?opcion=eliminar_alquiler&id=" . $dato->getId_alqui() . "' class=\"eliminar\"><i class=\"ico_borrar far fa-trash-alt\" aria-hidden=\"true\"></i></a></td>";
                        echo "<td><a href='../../controller/controller.php?opcion=cargar_alquiler&id=" . $dato->getId_alqui() . "' class=\"actualizar\"><i class=\"ico_actualizar fas fa-pencil-alt\" aria-hidden=\"true\"></i></a></td>";

                        echo "</tr>";
                    }
                } else {
                    
                }
                ?>

            </tbody>
        </table>


    </body>
</html>
