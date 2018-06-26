<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include '../../model/Cliente.php';
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../css/fontawesome-all.css">
        <script src="../js/jquery-2.1.4.js"></script>
        <script src="../js/bootstrap-table.js"></script>
        <link href="../css/bootstrap-table.css" rel="stylesheet">
        <script type="text/javascript" src="../js/validaciones.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/registroCliente.css">
        <link rel="stylesheet" href="../css/jquery.dataTables.min.css">
        <script src="../js/jquery-3.3.1.min.js"></script>
        <script src="../js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#tablaCli').DataTable();
            });
        </script>


    </head>
    <section class="titulo_menu">
        <p>CYCLO AVENTURA</p>
        <h1>REGISTRO DE CLIENTES</h1>       
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
            <li>
                <div class="tooltip"> 
                    <a   href="../empleado/index.php" class="empleado">
                        <i class="ico_inicio fas fa-user-tie" aria-hidden="true"></i></a>
                    <span class="tooltiptext">Empleados</span>
                </div>
            </li>

            <li>
                <div class="tooltip"> 
                    <a   href="../usuario/index.php" class="usuario"> 
                        <i class="ico_inicio fa fa-user" aria-hidden="true"></i></a>
                    <span class="tooltiptext">Usuarios</span>
                </div>
            </li>
            <li>
                <div class="tooltip"> 
                    <a  href="../cliente/index.php" class="cliente">
                        <i class="ico_inicio fas fa-user-tag" aria-hidden="true"></i></a>
                    <span class="tooltiptext">Clientes</span>
                </div>
            </li>
            <li>
                <div class="tooltip"> 
                    <a  href="../coche/index.php" class="producto">
                        <i class="ico_inicio fas fa-bus" aria-hidden="true"></i></a>
                    <span class="tooltiptext">Coches</span>
                </div>
            </li>
            <li>
                <div class="tooltip"> 
                    <a  href="../categoria/index.php" class="categoria">
                        <i class="ico_inicio fas fa-tags" aria-hidden="true"></i></a>
                    <span class="tooltiptext">Categorias</span>
                </div>
            </li>


        </ul>

    </nav>
    <body >

        <?php
        $cli = $_SESSION['cliente'];
        ?>
        <form action="../../controller/controller.php">


            <section class="datos">
                <div>Id</div>
                <i class="ico_keyid fas fa-key" aria-hidden="true"></i>
                <input type="text" name="id_cliente" value="<?php echo $cli->getId(); ?>"placeholder="Tipo de coche" readonly="readonly"class="cedula" required/></br>
                <div>Cédula</div>
                <i class="ico_cedula fa fa-id-card" aria-hidden="true"></i>
                <input type="text" name="cedula" value="<?php echo $cli->getCedula(); ?>" placeholder="Cédula" class="cedula" required/></br>
                <div>Nombres/Apellidos</div>
                <i class="ico_user fa fa-user" aria-hidden="true"></i>
                <input type="text" name="nombres" value="<?php echo $cli->getNombres(); ?>"placeholder="Nombre" class="nombre" required/></br>
                <div>Dirección</div>
                <i class="ico_direccion fas fa-map-marker-alt" aria-hidden="true"></i>
                <input type="text" name="direccion" value="<?php echo $cli->getDireccion(); ?>"placeholder="Dirección" class="direccion" required/></br>
                <div>Teléfono</div>
                <i class="ico_telefono fas fa-mobile-alt" aria-hidden="true"></i>
                <input type="text" name="telefono" value="<?php echo $cli->getTelefono(); ?> "placeholder="Teléfono" class="telefono" required/></br>
                <div>Correo electrónico</div>
                <i class="ico_correo far fa-envelope" aria-hidden="true"></i>
                <input type="text" name="correo" value="<?php echo $cli->getCorreo(); ?> "placeholder="Correo electrónico" class="correo" required/></br>

                <input type="hidden" value="actualizar_cliente" name="opcion">
                <button type="submit" class="button-guardar">
                    <i class="ico_guardar far fa-save" aria-hidden="true"></i>
                </button>
            </section>

        </form>

        <div class="tabla"></div>


        <section class="datosTabla">
            <table data-toggle="table" id="tablaCli" class="display"> 
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>CÉDULA</th>
                        <th>NOMBRE</th>
                        <th>DIRECCIÓN</th>
                        <th>TELÉFONO</th>
                        <th>CORREO ELECTRÓNICO</th>
                        <th>ACTUALIZAR</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_SESSION['lista_cliente'])) {

                        $registro = unserialize($_SESSION['lista_cliente']);

                        foreach ($registro as $dato) {
                            echo "<tr>";
                            echo "<td>" . $dato->getId() . "</td>";
                            echo "<td>" . $dato->getCedula() . "</td>";
                            echo "<td>" . $dato->getNombres() . "</td>";
                            echo "<td>" . $dato->getDireccion() . "</td>";
                            echo "<td>" . $dato->getTelefono() . "</td>";
                            echo "<td>" . $dato->getCorreo() . "</td>";
                            echo "<td><a href='../../controller/controller.php?opcion=eliminar_cliente&id=" . $dato->getId() . "' class=\"eliminar\"><i class=\"ico_borrar far fa-trash-alt\" aria-hidden=\"true\"></i></a></td>";
                            echo "<td><a href='../../controller/controller.php?opcion=cargar_cliente&id=" . $dato->getId() . "' class=\"actualizar\"><i class=\"ico_actualizar fas fa-pencil-alt\" aria-hidden=\"true\"></i></a></td>";

                            echo "</tr>";
                        }
                    } else {
                        
                    }
                    ?>

                </tbody>
            </table>
        </section>

    </body>
</html>
