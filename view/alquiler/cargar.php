<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
require_once '../../model/AlquilerCompleto.php';
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
        <link rel="stylesheet" type="text/css" href="../css/menuToggle.css">


        <script>
            $(document).ready(function () {
                $('#tablaCoche').DataTable();
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
                        <h1>REGISTRO DE ALQUILER</h1>       
                    </section>
                    <div id="contenedor">
                        <div id="lateral2">
                            <?php
                            $comple = $_SESSION['completo'];
                            ?>
                            <form action="../../controller/controller.php">
                                <section class="datos">
                                    <div>Id</div>
                                    <i class="ico_keyid fas fa-key" aria-hidden="true"></i>
                                    <input type="text" name="id" value="<?php echo $comple->getId_alqui(); ?>"readonly="readonly" class="key" required/></br>
                                    <div>Cliente</div>
                                    <i class="ico_cedula fas fa-user-tie" aria-hidden="true"></i>
                                    <select name="id_cli" class="tipo" >
                                        <?php
                                        include '../../model/Cliente.php';
                                        $registro = unserialize($_SESSION['lista_cliente']);
                                        foreach ($registro as $dato) {
                                            $opcion = "<option value=\"" . $dato->getId() . "\">" . $dato->getNombres() . "</option> ";
                                            echo $opcion;
                                        }
                                        ?>
                                    </select></br>
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
                                    <i class="ico_cedula fas fa-car" aria-hidden="true"></i>
                                    <select name="id_coche" class="tipo">
                                        <?php
                                        include '../../model/Coches.php';
                                        $registro= unserialize($_SESSION['lista_coche']);
                                        foreach ($registro as $dato) {
                                            $opcion = "<option value='" . $dato->getId_coche() . "'>" . $dato->getDescripcion_coche() . "</option>";
                                            echo $opcion;
                                        }
                                        ?>
                                    </select>
                                    <div>Tiempo de Inicio</div>
                                    <i class="ico_telefono far fa-envelope"></i>
                                    <input type="datetime-local" value="<?php echo $comple->getTiempo_ini(); ?>" name="tiempo_ini" placeholder="Tiempo de Inicio" class="tiempo" required/></br>
                                    <div>Tiempo Fin</div>
                                    <i class="ico_telefono far fa-envelope"></i>
                                    <input type="datetime-local" value="<?php echo $comple->getTiempo_fin();; ?>" name="tiempo_fin" placeholder="Tiempo Finalizado" class="tiempo" required/></br>
                                    <div>Valor</div>
                                    <i class="ico_telefono far fa-money-check"></i>
                                    <input type="text" name="valor" values="<?php echo $comple->getValor(); ?>" placeholder="Valor" class="valor" required/></br>
                                    <input type="hidden" value="actualizar_completo" name="opcion">
                                    <button type="submit" class="button-guardar">
                                        <i class="ico_guardar far fa-save" aria-hidden="true"></i>
                                    </button>
                                </section>
                            </form>
                        </div>
                        <div id="principal2">
                            <section class="datosTabla">
                                <table data-toggle="table" id="tablaAlqui" class="display"> 
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>ID CLIENTE</th>
                                            <th>CLIENTE</th>
                                            <th>ID EMPLEADO</th>
                                            <th>EMPLEADO</th>
                                            <th>ID COCHE</th>
                                            <th>COCHE</th>
                                            <th>INICIO</th>
                                            <th>FIN</th>
                                            <th>VALOR</th>
                                            <th>ELIMINAR</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($_SESSION['lista_completo'])) {
                                            $registro = unserialize($_SESSION['lista_completo']);
                                            foreach ($registro as $dato) {
                                                echo "<tr>";
                                                echo "<td>" . $dato->getId_alqui() . "</td>";
                                                echo "<td>" . $dato->getId_cli() . "</td>";
                                                echo "<td>" . $dato->getNombre_cli() . "</td>";
                                                echo "<td>" . $dato->getId_emp() . "</td>";
                                                echo "<td>" . $dato->getNombre_emp() . "</td>";
                                                echo "<td>" . $dato->getId_coche() . "</td>";
                                                echo "<td>" . $dato->getDesc_coche() . "</td>";
                                                echo "<td>" . $dato->getTiempo_ini() . "</td>";
                                                echo "<td>" . $dato->getTiempo_fin() . "</td>";
                                                echo "<td>" . $dato->getValor() . "</td>";
                                                echo "<td><a href='../../controller/controller.php?opcion=cargar_completo&id=" . $dato->getId_alqui() . "' class=\"actualizar\"><i class=\"ico_actualizar fas fa-pencil-alt\" aria-hidden=\"true\"></i></a></td>";
                                                echo "</tr>";
                                            }
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
