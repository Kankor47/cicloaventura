<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
include '../../model/Coches.php';
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
                $('#tablaCoche').DataTable();
            });
        </script>



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

        <?php
    
        $coh = $_SESSION['coche'];
        ?>

        <form action="../../controller/controller.php">


            <section class="datos">
                <div>Id</div>
                <i class="ico_keyid fas fa-key" aria-hidden="true"></i>
                <input type="text" name="coche" value="<?php echo $coh->getId_coche(); ?>"placeholder="Tipo de coche" readonly="readonly" class="key" required/></br>
                 <div>Tipo/Categoria</div>
                <i class="ico_tipo fas fa-tags" aria-hidden="true"></i>
               
                <select name="tipo" class="tipo" >
                    
                    <?php
                    include '../../model/Tipo.php';
                    $registro = unserialize($_SESSION['lista_tipo']);
                    foreach ($registro as $dato) {
                        $opcion = "<option value=\"" . $dato->getId_tipo() . "\">" . $dato->getTip_desc() . "</option> ";
                        echo $opcion;
                    }
                    ?>
                   
                </select></br> 
                <div>Descripcion</div>
                <i class="ico_descripcion fas fa-comment" aria-hidden="true"></i>
                <input type="text" name="descripcion" value="<?php echo $coh->getDescripcion_coche(); ?>" placeholder="Descripcion" class="descripcion" required/></br>
                <div>Fecha de adquisición</div>
                <i class="ico_calendario far fa-calendar-alt" aria-hidden="true"></i>
                <input type="text" name="fecha" value="<?php echo $coh->getFecha_adquisicion(); ?>"placeholder="dd/mm/aaaa" class="fecha" required/></br></br>

                <input type="hidden" value="actualizar_coche" name="opcion">
                <button type="submit" class="button-guardar">
                    <i class="ico_guardar far fa-save" aria-hidden="true"></i>
                </button>
            </section>

        </form>


        <div class="tabla"></div>

        <table data-toggle="table" id="tablaCoche" class="display"> 
            <thead>
                <tr>
                    <th>ID</th>
                    <th>CATEGORÍA</th>
                    <th>DESCRIPCIÓN</th>
                    <th>FECHA DE ADQUISICIÓN</th>
                    <th>ELIMINAR</th>
                    <th>ACTUALIZAR</th>
                </tr>
            </thead>
            <tbody>
                <?php
               

                if (isset($_SESSION['lista_coche'])) {

                    $registro = unserialize($_SESSION['lista_coche']);

                    foreach ($registro as $dato) {
                        echo "<tr>";
                        echo "<td>" . $dato->getId_coche() . "</td>";
                        echo "<td>" . $dato->getId_tipo() . "</td>";
                        echo "<td>" . $dato->getDescripcion_coche() . "</td>";
                        echo "<td>" . $dato->getFecha_adquisicion() . "</td>";
                        echo "<td><a href='../../controller/controller.php?opcion=eliminar_coche&id=" . $dato->getId_coche() . "' class=\"eliminar\"><i class=\"ico_borrar far fa-trash-alt\" aria-hidden=\"true\"></i></a></td>";
                        echo "<td><a href='../../controller/controller.php?opcion=cargar_coche&id=" . $dato->getId_coche() . "' class=\"actualizar\"><i class=\"ico_actualizar fas fa-pencil-alt\" aria-hidden=\"true\"></i></a></td>";

                        echo "</tr>";
                    }
                } else {
                    
                }
                ?>

            </tbody>
        </table>


    </body>
</html>