<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include '../../model/Usuario.php';
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
        <link rel="stylesheet" type="text/css" href="../css/registroUsuario.css">
        <link rel="stylesheet" href="../css/jquery.dataTables.min.css">
        <script src="../js/jquery-3.3.1.min.js"></script>
        <script src="../js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#tablaUser').DataTable();
            });
        </script>

    </head>
    <body >

        <section class="titulo_menu">
            <p>CYCLO AVENTURA</p>
            <h1>REGISTRO DE USUARIOS</h1>       
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
        $usu = $_SESSION['usuario'];
        ?>

        <form action="../../controller/controller.php">
            <section class="datos">
                <div>Id</div>
                <i class="ico_keyid fas fa-key" aria-hidden="true"></i>
                <input type="text" name="id_usuario" value="<?php echo $usu->getId(); ?>"  class="cedula" required  readonly="readonly"/></br>
                <div>Empleado</div>
                <i class="ico_cedula fas fa-user-tie" aria-hidden="true"></i>
                <input type="text" value="<?php echo $usu->getNombre(); ?>"  placeholder="Cédula" class="cedula" required readonly="readonly"/></br>

                <div>Nombre de usuario</div>
                <i class="ico_user fa fa-user" aria-hidden="true"></i>
                <input type="text" name="nombres" value="<?php echo $usu->getUsuario(); ?>"  placeholder="Nombre" class="nombre" required/></br>
                <div>Contraseña</div>
                <i class="ico_password fas fa-unlock-alt" aria-hidden="true"></i>
                <input type="password" name="contrasena" value="<?php echo $usu->getContrasena(); ?>"  placeholder="Contraseña" class="contrasena" required/></br>
                <div>Tipo de usuario</div>
                <i class="ico_usuarios fas fa-users" aria-hidden="true"></i>
                <select name="tipo" class="tipo" >
                    <option value="Administrador" >Administrador</option> 
                    <option value="Normal">Normal</option> 
                </select></br></br>
                <input type="hidden" value="actualizar_usuario" name="opcion">
                <button type="submit" class="button-guardar">
                    <i class="ico_guardar far fa-save" aria-hidden="true"></i>
                </button>
            </section>

        </form>


        <section class="datosTabla"> 
            <table data-toggle="table" id="tablaUser" class="display"> 
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>CÉDULA</th>
                        <th>EMPLEADO</th>
                        <th>USUARIO</th>
                        <th>CONTRASEÑA</th>
                        <th>TIPO DE USUARIO</th>
                        <th>ELIMINAR</th>
                        <th>ACTUALIZAR</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_SESSION['lista_usuario'])) {

                        $registro = unserialize($_SESSION['lista_usuario']);

                        foreach ($registro as $dato) {
                            echo "<tr>";
                            echo "<td>" . $dato->getId() . "</td>";
                            echo "<td>" . $dato->getCedula() . "</td>";
                            echo "<td>" . $dato->getNombre() . "</td>";
                            echo "<td>" . $dato->getUsuario() . "</td>";
                            echo "<td>" . $dato->getContrasena() . "</td>";
                            echo "<td>" . $dato->getTipo() . "</td>";
                            echo "<td><a href='../../controller/controller.php?opcion=eliminar_usuario&id=" . $dato->getId() . "' class=\"eliminar\"><i class=\"ico_borrar far fa-trash-alt\" aria-hidden=\"true\"></i></a></td>";
                            echo "<td><a href='../../controller/controller.php?opcion=cargar_usuario&id=" . $dato->getId() . "' class=\"actualizar\"><i class=\"ico_actualizar fas fa-pencil-alt\" aria-hidden=\"true\"></i></a></td>";

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
