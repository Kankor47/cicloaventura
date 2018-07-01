<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
include '../../model/Tipo.php';
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
        <link rel="stylesheet" href="../css/jquery.dataTables.min.css">
        <script src="../js/jquery-3.3.1.min.js"></script>
        <script src="../js/jquery.dataTables.min.js"></script>
          <link rel="stylesheet" type="text/css" href="../css/menuToggle.css">
        <script>
            $(document).ready(function () {
                $('#tablaCate').DataTable();
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
                        <h1>REGISTRO DE CATEGORIAS</h1>       
                    </section>
                    <div id="contenedor">
                        <div id="lateral2">


                            <?php
                            $tip = $_SESSION['categoria'];
                            ?>

                            <form action="../../controller/controller.php">


                                <section class="datos">
                                    <div>Id</div>
                                    <i class="ico_keyid fas fa-key" aria-hidden="true"></i>
                                    <input type="text" name="id_tipo"  value="<?php echo $tip->getId_tipo(); ?>" placeholder="Tipo de coche" disabled="false" class="tipo" required/></br>
                                    <div>Tipo/Categoria</div>
                                    <i class="ico_tipo fas fa-tags" aria-hidden="true"></i>
                                    <input type="text" name="tipo" value="<?php echo $tip->getTip_desc(); ?>"  placeholder="Tipo de coche" class="tipo" required/></br>

                                    <input type="hidden" value="actualizar_tipo" name="opcion">
                                    <button type="submit" class="button-guardar">
                                        <i class="ico_guardar far fa-save" aria-hidden="true"></i>
                                    </button>
                                </section>

                            </form>
                        </div>
                        <div id="principal2">

                            <section class="datosTabla">
                                <table data-toggle="table" id="tablaCate" class="display"> 
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>CATEGORÍA</th>
                                            <th>ACTUALIZAR</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($_SESSION['lista_tipo'])) {

                                            $registro = unserialize($_SESSION['lista_tipo']);

                                            foreach ($registro as $dato) {
                                                echo "<tr>";
                                                echo "<td>" . $dato->getId_tipo() . "</td>";
                                                echo "<td>" . $dato->getTip_desc() . "</td>";
                                                echo "<td><a href='../../controller/controller.php?opcion=cargar_tipo&id=" . $dato->getId_tipo() . "' class=\"actualizar\"><i class=\"ico_actualizar fas fa-pencil-alt\" aria-hidden=\"true\"></i></a></td>";
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