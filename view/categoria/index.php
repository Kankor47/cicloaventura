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
        <link rel="stylesheet" type="text/css" href="../css/registroTipo.css">



    </head>
    <body >

        <section class="titulo_menu">
            <p>CYCLO AVENTURA</p>
            <h1>REGISTRO DE CATEGORIAS</h1>       
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


        <form action="../../controller/controller.php">


            <section class="datos">
                <div>Tipo/Categoria</div>
                <i class="ico_tipo fas fa-tags" aria-hidden="true"></i>
                <input type="text" name="tipo" placeholder="Tipo de coche" class="tipo" required/></br>
                <input type="hidden" value="guardar_tipo" name="opcion">
                <button type="submit" class="button-guardar">
                    <i class="ico_guardar far fa-save" aria-hidden="true"></i>
                </button>
            </section>

        </form>


        <table data-toggle="table"> 
            <thead>
                <tr>
                    <th>ID</th>
                    <th>CATEGORÍA</th>
                    <th>ELIMINAR</th>
                    <th>ACTUALIZAR</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../../model/Tipo.php';

                if (isset($_SESSION['lista_tipo'])) {

                    $registro = unserialize($_SESSION['lista_tipo']);

                    foreach ($registro as $dato) {
                        echo "<tr>";
                        echo "<td>" . $dato->getId_tipo() . "</td>";
                        echo "<td>" . $dato->getTip_desc() . "</td>";
                        echo "<td><a href='../../controller/controller.php?opcion=eliminar_tipo&id=" . $dato->getId_tipo() . "' class=\"eliminar\"><i class=\"ico_borrar far fa-trash-alt\" aria-hidden=\"true\"></i></a></td>";
                        echo "<td><a href='../../controller/controller.php?opcion=cargar_tipo&id=" . $dato->getId_tipo() . "' class=\"actualizar\"><i class=\"ico_actualizar fas fa-pencil-alt\" aria-hidden=\"true\"></i></a></td>";
                        echo "</tr>";
                    }
                } else {
                    
                }
                ?>

            </tbody>
        </table>


    </body>
</html>
