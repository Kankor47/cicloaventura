<?php

require_once '../model/ModelEmpleado.php';
require_once '../model/ModelCliente.php';
require_once '../model/ModelUsuario.php';
require_once '../model/ModelLogin.php';
require_once '../model/ModelCoches.php';
require_once '../model/ModelTipo.php';
require_once '../model/ModelMantenimiento.php';


session_start();
$usuario = new ModelUsuario();
$empleado = new ModelEmpleado();
$cliente = new ModelCliente();
$login = new ModelLogin();
$coches = new ModelCoches();
$tipo = new ModelTipo();
$mantenimiento = new ModelMantenimiento();
$opcion = $_REQUEST['opcion'];

switch ($opcion) {

    case 'entrar':
        $usuario = $_REQUEST['usuario'];
        $contrasena = $_REQUEST['contrasena'];
        $sesion = $login->verificacionUsuario($usuario, $contrasena);

        if ($sesion->getUsuario() == $usuario && $sesion->getContrasena() == $contrasena) {

            header('Location: ../view/menu/index.php');
        } else {
            header('Location: ../view/index.php ');
        }
        break;
    case "registrar":

        $listaTipos = $tipo->getTipos();
        $_SESSION['lista_tipo'] = serialize($listaTipos);
        $listaCoches = $coches->getCoches();
        $_SESSION['lista_coche'] = serialize($listaCoches);
        $listaClientes = $cliente->getClientes();
        $_SESSION['lista_cliente'] = serialize($listaClientes);
        $listaUsuario = $usuario->getUsuarios();
        $_SESSION['lista_usuario'] = serialize($listaUsuario);
        $listaEmpleados = $empleado->getEmpleados();
        $_SESSION['lista_empleado'] = serialize($listaEmpleados);
        header('Location: ../view/empleado/index.php');
        break;
    //REPORTES
    
      case "reportes":
        header('Location: ../view/reportes/index.php');
        break;
    //ALQUILER
    case "alquiler":
        header('Location: ../view/alquiler/index.php');
        break;
    //INVENTARIO
     case "inventario":
        header('Location: ../view/inventario/index.php');
        break;
    //MANTENIMIENTO
    case "mantenimiento":
        $listaCoches = $coches->getCoches();
        $_SESSION['lista_coche'] = serialize($listaCoches);
        $listaMantenimiento = $mantenimiento->getMantenimientos();
        $_SESSION['lista_mantenimiento'] = serialize($listaMantenimiento);
        header('Location: ../view/mantenimiento/index.php');
        break;
    case "guardar_mantenimiento":

        $id_coche = $_REQUEST['tipo'];
        $descripcion_dano = $_REQUEST['descripcion'];
        $estado = $_REQUEST['estado'];
        $fecha_ing = $_REQUEST['fecha_ingreso'];
        $fecha_salida = $_REQUEST['fecha_salida'];
        $mantenimiento->crearMantenimiento($id_coche, $descripcion_dano, $fecha_ing, $estado, $fecha_salida);
        $listaMantenimiento = $mantenimiento->getMantenimientos();
        $_SESSION['lista_mantenimiento'] = serialize($listaMantenimiento);
        header('Location: ../view/mantenimiento/index.php');
        break;
    case "eliminar_mantenimiento":

        $id_mant = $_REQUEST['id'];
        $mantenimiento->eliminarMantenimiento($id_mant);
        $listaMantenimiento = $mantenimiento->getMantenimientos();
        $_SESSION['lista_mantenimiento'] = serialize($listaMantenimiento);
        header('Location: ../view/mantenimiento/index.php');
        break;
    case "cargar_mantenimiento":
        $id_mant = $_REQUEST['id'];
        $man = $mantenimiento->getMantenimiento($id_mant);
        $_SESSION['mantenimiento'] = $man;
        header('Location: ../view/mantenimiento/cargar.php');
        break;
    case "actualizar_mantenimiento":
        $id_mant = $_REQUEST['mantenimiento'];

        $id_coche = $_REQUEST['tipo'];
        $descripcion_dano = $_REQUEST['descripcion'];
        $estado = $_REQUEST['estado'];
        $fecha_ing = $_REQUEST['fecha_ingreso'];
        $fecha_salida = $_REQUEST['fecha_salida'];
        $mantenimiento->actualizarMantenimiento($id_mant, $id_coche, $descripcion_dano, $fecha_ing, $estado, $fecha_salida);
        $listaMantenimiento = $mantenimiento->getMantenimientos();
        $_SESSION['lista_mantenimiento'] = serialize($listaMantenimiento);
        header('Location: ../view/mantenimiento/index.php');

        break;


    //USUARIO
    case "guardar_usuario":

        $cedula = $_REQUEST['cedula'];
        $nombres = $_REQUEST['nombres'];
        $contrasena = $_REQUEST['contrasena'];
        $tipo = $_REQUEST['tipo'];
        $usuario->crearUsuario($cedula, $nombres, $contrasena, $tipo);
        $listaUsuario = $usuario->getUsuarios();
        $_SESSION['lista_usuario'] = serialize($listaUsuario);
        header('Location: ../view/usuario/index.php');
        break;
    case "eliminar_usuario":

        $id = $_REQUEST['id'];
        $usuario->eliminarUsuario($id);
        $listaUsuario = $usuario->getUsuarios();
        $_SESSION['lista_usuario'] = serialize($listaUsuario);
        header('Location: ../view/usuario/index.php');
        break;
    case "cargar_usuario":
        $id = $_REQUEST['id'];
        $usu = $usuario->getUsuario($id);
        $_SESSION['usuario'] = $usu;
        header('Location: ../view/usuario/cargar.php');
        break;
    case "actualizar_usuario":
        $id_usuario = $_REQUEST['id_usuario'];
        $nombres = $_REQUEST['nombres'];
        $contrasena = $_REQUEST['contrasena'];
        $tipo = $_REQUEST['tipo'];
        $usuario->actualizarUsuario($id_usuario, $nombres, $contrasena, $tipo);
        $listaUsuario = $usuario->getUsuarios();
        $_SESSION['lista_usuario'] = serialize($listaUsuario);
        header('Location: ../view/usuario/index.php');
        break;

    //EMPLEADO
    case "guardar_empleado":

        $cedula = $_REQUEST['cedula'];
        $nombres = $_REQUEST['nombres'];
        $direccion = $_REQUEST['direccion'];
        $telefono = $_REQUEST['telefono'];
        $empleado->crearEmpleado($cedula, $nombres, $direccion, $telefono);
        $listaEmpleados = $empleado->getEmpleados();
        $_SESSION['lista_empleado'] = serialize($listaEmpleados);
        header('Location: ../view/empleado/index.php');
        break;
    case "eliminar_empleado":

        $id = $_REQUEST['id'];
        $empleado->eliminarEmpleado($id);
        $listaEmpleados = $empleado->getEmpleados();
        $_SESSION['lista_empleado'] = serialize($listaEmpleados);
        header('Location: ../view/empleado/index.php');
        break;
    case "cargar_empleado":
        $id = $_REQUEST['id'];
        $emp = $empleado->getEmpleado($id);
        $_SESSION['empleado'] = $emp;
        header('Location: ../view/empleado/cargar.php');
        break;
    
        case "buscar_empleado":
        $ced_emp =  $_REQUEST['ced_emp'];
        $emp=$empleado->buscarEmpleado($ced_emp);
        $_SESSION['empleado']=$emp;
        header('Location: ../view/empleado/index.php');
    
    case "actualizar_empleado":

        $id_empleado = $_REQUEST['id_empleado'];
        $cedula = $_REQUEST['cedula'];
        $nombres = $_REQUEST['nombres'];
        $direccion = $_REQUEST['direccion'];
        $telefono = $_REQUEST['telefono'];
        $empleado->actualizarUsuario($id_empleado, $cedula, $nombres, $direccion, $telefono);
        $listaEmpleados = $empleado->getEmpleados();
        $_SESSION['lista_empleado'] = serialize($listaEmpleados);
        header('Location: ../view/empleado/index.php');
        break;

    //CLIENTE    
    case "guardar_cliente":

        $cedula = $_REQUEST['cedula'];
        $nombres = $_REQUEST['nombres'];
        $direccion = $_REQUEST['direccion'];
        $telefono = $_REQUEST['telefono'];
        $correo = $_REQUEST['correo'];
        $cliente->crearCliente($cedula, $nombres, $direccion, $telefono, $correo);
        $listaClientes = $cliente->getClientes();
        $_SESSION['lista_cliente'] = serialize($listaClientes);
        header('Location: ../view/cliente/index.php');
        break;
    case "eliminar_cliente":

        $id = $_REQUEST['id'];
        $cliente->eliminarCliente($id);
        $listaClientes = $cliente->getClientes();
        $_SESSION['lista_cliente'] = serialize($listaClientes);
        header('Location: ../view/cliente/index.php');
        break;
    case "cargar_cliente":
        $id = $_REQUEST['id'];
        $cli = $cliente->getCliente($id);
        $_SESSION['cliente'] = $cli;
        header('Location: ../view/cliente/cargar.php');
        break;
    case "actualizar_cliente":

        $id_cliente = $_REQUEST['id_cliente'];
        $cedula = $_REQUEST['cedula'];
        $nombres = $_REQUEST['nombres'];
        $direccion = $_REQUEST['direccion'];
        $telefono = $_REQUEST['telefono'];
        $correo = $_REQUEST['correo'];
        $cliente->actualizarCliente($id_cliente, $cedula, $nombres, $direccion, $telefono, $correo);
        $listaClientes = $cliente->getClientes();
        $_SESSION['lista_cliente'] = serialize($listaClientes);
        header('Location: ../view/cliente/index.php');
        break;

    //COCHE

    case "guardar_coche":

        $id_tipo = $_REQUEST['tipo'];
        $descripcion = $_REQUEST['descripcion'];
        $fecha = $_REQUEST['fecha'];
        $coches->crearCoche($id_tipo, $descripcion, $fecha);
        $listaCoches = $coches->getCoches();
        $_SESSION['lista_coche'] = serialize($listaCoches);
        header('Location: ../view/coche/index.php');
        break;

    case "eliminar_coche":

        $id_coche = $_REQUEST['id'];
        $coches->eliminarCoche($id_coche);
        $listaCoches = $coches->getCoches();
        $_SESSION['lista_coche'] = serialize($listaCoches);
        header('Location: ../view/coche/index.php');
        break;
    case "cargar_coche":

        $id_coche = $_REQUEST['id'];
        $coh = $coches->getCoche($id_coche);
        $_SESSION['coche'] = $coh;
        header('Location: ../view/coche/cargar.php');
        break;
    case "actualizar_coche":

        $id_coche = $_REQUEST['coche'];
        $id_tipo = $_REQUEST['tipo'];
        $descripcion = $_REQUEST['descripcion'];
        $fecha = $_REQUEST['fecha'];
        $coches->actualizarCoche($id_coche, $id_tipo, $descripcion, $fecha);
        $listaCoches = $coches->getCoches();
        $_SESSION['lista_coche'] = serialize($listaCoches);
        header('Location: ../view/coche/index.php');
        break;
    //TIPO

    case "guardar_tipo":
        $tip_desc = $_REQUEST['tipo'];
        $tipo->crearTipo($tip_desc);
        $listaTipos = $tipo->getTipos();
        $_SESSION['lista_tipo'] = serialize($listaTipos);
        header('Location: ../view/categoria/index.php');
        break;
    case "eliminar_tipo":

        $id_tipo = $_REQUEST['id'];
        $tipo->eliminarTipo($id_tipo);
        $listaTipos = $tipo->getTipos();
        $_SESSION['lista_tipo'] = serialize($listaTipos);
        header('Location: ../view/categoria/index.php');
        break;
    case "cargar_tipo":

        $id_tipo = $_REQUEST['id'];
        $tip = $tipo->getTipo($id_tipo);
        $_SESSION['categoria'] = $tip;
        header('Location: ../view/categoria/cargar.php');
        break;
    case "actualizar_tipo":
        $id_tipo = $_REQUEST['id_tipo'];
        $tip_desc = $_REQUEST['tipo'];
        $tipo->actualizarTipo($id_tipo, $tip_desc);
        $listaTipos = $tipo->getTipos();
        $_SESSION['lista_tipo'] = serialize($listaTipos);
        header('Location: ../view/categoria/index.php');

        break;
    default:
        header('Location: ../view/index.php ');
}




