<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include '../../model/Alquiler.php';
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
            <h1>REGISTRO DE COCHES</h1>       
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

            </ul>

        </nav>

        <?php
    
        $alqui = $_SESSION['alquiler'];
        ?>

        <form action="../../controller/controller.php">


            <section class="datos">
                <div>Id</div>
                <i class="ico_keyid fas fa-key" aria-hidden="true"></i>
                <input type="text" name="id_alqui"  value="<?php echo $alqui->getId_alqui(); ?>" placeholder="Alquiler" disabled="false" class="tipo" required/></br>
                <div>Cliente</div>
                <i class="ico_tipo fas fa-tags" aria-hidden="true"></i>
                <input type="text" name="id_cli" value="<?php echo $alqui->getId_cli(); ?>"  placeholder="Cliente" class="tipo" required/></br>
               <div>Empleado</div>
                <i class="ico_tipo fas fa-tags" aria-hidden="true"></i>
                <input type="text" name="id_emp" value="<?php echo $alqui->getId_emp(); ?>"  placeholder="Empleado" class="tipo" required/></br>
                <div>Valor Total</div>
                <i class="ico_tipo fas fa-tags" aria-hidden="true"></i>
                <input type="text" name="valor_total" value="<?php echo $alquii->getValor_total(); ?>"  placeholder="Valor Total" class="tipo" required/></br>
                <input type="hidden" value="actualizar_alquiler" name="opcion">
                <button type="submit" class="button-guardar">
                    <i class="ico_guardar far fa-save" aria-hidden="true"></i>
                </button>
            </section>

        </form>


    
    <table data-toggle="table"> 
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
