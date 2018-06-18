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
        <link rel="stylesheet" type="text/css" href="../css/registroEmpleado.css">
        <script type="text/javascript" src="../js/validaciones.js"></script>
        <link rel="stylesheet" href="../css/jquery.dataTables.min.css">
        <script src="../js/jquery-3.3.1.min.js"></script>
        <script src="../js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#tablaEmple').DataTable();
            });
        </script>

        <script type="text/javascript">
            
            function validarced()
            {
                
                var i;
                var cedula;
                var acumulado;
                cedula = document.form.ced.value;
                var instancia;
                acumulado = 0;
                for (i = 1; i <= 9; i++)
                {
                    if (i % 2 != 0)
                    {
                        instancia = cedula.substring(i - 1, i) * 2;
                        if (instancia > 9)
                            instancia -= 9;
                    } else
                        instancia = cedula.substring(i - 1, i);
                    acumulado += parseInt(instancia);
                }
                while (acumulado > 0)
                    acumulado -= 10;
                if (cedula.substring(9, 10) != (acumulado * -1))
                {
                    ced.style.backgroundColor = '#ff7585';
                    nombre.disabled="true";
                    document.form.ced.setfocus();
                }
                ced.style.backgroundColor = '#fff';
                nombre.disabled="false";
            }
        </script>


    </head>
    <body >

        <section class="titulo_menu">
            <p>CYCLO AVENTURA</p>
            <h1>REGISTRO DE EMPLEADOS</h1>       
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

        <form action="../../controller/controller.php" name="form">
            <section class="datos">
                <div>Cédula</div>
                <i class="ico_cedula fa fa-id-card" aria-hidden="true"></i>
                <input type="text" name="cedula" id="ced" onchange="validarced()"  placeholder="Cédula" maxlength="13"  onkeypress="return soloNumeros(event);" onkeydown="return numeroCaracteres(this, 10)"class="cedula" required/></br>
                <div>Nombres/Apellidos</div>
                <i class="ico_user fa fa-user" aria-hidden="true"></i>
                <input type="text" name="nombres" id="nombre"  onkeypress="return soloLetras(event);" placeholder="Nombre" class="nombre" required/></br>
                <div>Dirección</div>
                <i class="ico_direccion fas fa-map-marker-alt" aria-hidden="true"></i>
                <input type="text" name="direccion" placeholder="Dirección" class="direccion" required/></br>
                <div>Teléfono</div>
                <i class="ico_telefono fas fa-mobile-alt" aria-hidden="true"></i>
                <input type="text" name="telefono" onkeypress="return soloNumeros(event);" placeholder="Teléfono" class="telefono" required/></br></br>
                <input type="hidden" value="guardar_empleado" name="opcion">
                <button type="submit" class="button-guardar" name="validar" onclick="validar()">
                    <i class="ico_guardar far fa-save" aria-hidden="true"></i>
                </button>
            </section>
        </form>

        <table data-toggle="table" id="tablaEmple" class="display"> 
            <thead>
                <tr>
                    <th>ID</th>
                    <th>CÉDULA</th>
                    <th>NOMBRE</th>
                    <th>DIRECCIÓN</th>
                    <th>TELÉFONO</th>
                    <th>ELIMINAR</th>
                    <th>ACTUALIZAR</th>

                </tr>
            </thead>
            <tbody>
                <?php
                include '../../model/Empleado.php';

                if (isset($_SESSION['lista_empleado'])) {

                    $registro = unserialize($_SESSION['lista_empleado']);

                    foreach ($registro as $dato) {
                        echo "<tr>";
                        echo "<td>" . $dato->getId() . "</td>";
                        echo "<td>" . $dato->getCedula() . "</td>";
                        echo "<td>" . $dato->getNombres() . "</td>";
                        echo "<td>" . $dato->getDireccion() . "</td>";
                        echo "<td>" . $dato->getTelefono() . "</td>";
                        echo "<td><a href='../../controller/controller.php?opcion=eliminar_empleado&id=" . $dato->getId() . "' class=\"eliminar\"><i class=\"ico_borrar far fa-trash-alt\" aria-hidden=\"true\"></i></a></td>";
                        echo "<td><a href='../../controller/controller.php?opcion=cargar_empleado&id=" . $dato->getId() . "' class=\"actualizar\"><i class=\"ico_actualizar fas fa-pencil-alt\" aria-hidden=\"true\"></i></a></td>";

                        echo "</tr>";
                    }
                } else {
                    
                }
                ?>
            </tbody>
        </table>
    </body>
</html>
