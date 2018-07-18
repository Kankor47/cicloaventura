<?php

require_once '../model/ModelEmpleado.php';
require_once '../model/ModelCliente.php';
require_once '../model/ModelUsuario.php';
require_once '../model/ModelLogin.php';
require_once '../model/ModelCoches.php';
require_once '../model/ModelTipo.php';
require_once '../model/ModelMantenimiento.php';
require_once '../model/ModelAlquiler.php';
require_once '../model/ModelInventario.php';
require_once '../model/ModelDetalle.php';
require_once '../model/ModelAlquilerCompleto.php';

session_start();
$usuario = new ModelUsuario();
$empleado = new ModelEmpleado();
$cliente = new ModelCliente();
$login = new ModelLogin();
$coches = new ModelCoches();
$tipo = new ModelTipo();
$mantenimiento = new ModelMantenimiento();
$alquiler = new ModelAlquiler();
$inventario= new ModelInventario();
$detalle = new ModelDetalle();
$completo = new ModelAlquilerCompleto();
$opcion = $_REQUEST['opcion'];

switch ($opcion) {

    case 'entrar':
        $user = $_REQUEST['usuario'];
        $contrasena = $_REQUEST['contrasena'];
        $sesion = $login->verificacionUsuario($user, $contrasena);

        if ($sesion->getUsuario() == $user && $sesion->getContrasena() == $contrasena) {
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
            $listaMantenimiento = $mantenimiento->getMantenimientos();
            $_SESSION['lista_mantenimiento'] = serialize($listaMantenimiento);
             $listaInventario = $inventario->getInventario();
            $_SESSION['lista_inventario'] = serialize($listaInventario);
            $listaCompletos = $completo->getCompletos();
        $_SESSION['lista_completo'] = serialize($listaCompletos);

            
            header('Location: ../view/empleado/index.php');

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
        $ced_emp = $_REQUEST['ced_emp'];
        $emp = $empleado->buscarEmpleado($ced_emp);
        $_SESSION['empleado'] = $emp;
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
    case "cargar_cliente_cedula":
        $ced_cli = $_REQUEST['ced_cli'];
        $cli = $cliente->getCliente_ced($ced_cli);
        $_SESSION['cliente'] = $cli;
        header('Location: ../view/alquiler/index.php');
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
    case "imprimir_tipo":
        $tip = $tipo->getTipos();
        $_SESSION['categoria'] = $tip;
        header('Location: ../view/categoria/reporte.php');
        break;
    case "actualizar_tipo":
        $id_tipo = $_REQUEST['id_tipo'];
        $tip_desc = $_REQUEST['tipo'];
        $tipo->actualizarTipo($id_tipo, $tip_desc);
        $listaTipos = $tipo->getTipos();
        $_SESSION['lista_tipo'] = serialize($listaTipos);
        header('Location: ../view/categoria/index.php');

        break;

    //ALQUILER
    case "guardar_alquiler":
        $id_cli = $_REQUEST['id_cli'];
        $id_emp = $_REQUEST['id_emp'];
        $valor_total = $_REQUEST['valor_total'];
        $alquiler->crearAlquiler($id_cli, $id_emp, $valor_total);
        $listaAlquilers = $alquiler->getAlquilers();
        $_SESSION['lista_alquiler'] = serialize($listaAlquilers);
        header('Location: ../view/alquiler/index.php');
        break;
    case "eliminar_alquiler":

        $id = $_REQUEST['id'];
        $alquiler->eliminarAlquiler($id);
        $listaAlquilers = $alquiler->getAlquilers();
        $_SESSION['lista_alquiler'] = serialize($listaAlquilers);
        header('Location: ../view/alquiler/index.php');
        break;
    case "cargar_alquiler":
        $id = $_REQUEST['id'];
        $alqui = $alquiler->getAlquiler($id);
        $_SESSION['alquiler'] = $alqui;
        header('Location: ../view/alquiler/cargar.php');
        break;
    case "actualizar_alquiler":

        $id_alqui = $_REQUEST['id_alqui'];
        $id_cli = $_REQUEST['id_cli'];
        $id_emp = $_REQUEST['id_emp'];
        $valor_total = $_REQUEST['valor_total'];
        $alquiler->actualizarAlquiler($id_alqui, $id_cli, $id_emp, $valor_total);
        $listaAlquilers = $alquiler->getAlquilers();
        $_SESSION['lista_alquiler'] = serialize($listaAlquilers);
        header('Location: ../view/alquiler/index.php');
        break;

    //DETALLE AQUILER
    case "guardar_detalle":
        $id_coche = $_REQUEST['id_coche'];
        $id_alqui = $_REQUEST['id_alqui'];
        $valor = $_REQUEST['valor'];
        $tiempo_ini = $_REQUEST['tiempo_ini'];
        $tiempo_fin = $_REQUEST['tiempo_fin'];
        $detalle->crearDeta_alqui($id_coche, $id_alqui, $valor, $tiempo_ini,$tiempo_fin);
        $listadetalles = $detalle->getDeta_alquis();
        $_SESSION['lista_detalle'] = serialize($listadetalles);
        header('Location: ../view/alquiler/index.php');
        break;
    case "eliminar_detalle":

        $id = $_REQUEST['id'];
        $detalle->eliminarDeta_alqui($id);
        $listadetalles = $detalle->getDeta_alquis();
        $_SESSION['lista_detalle'] = serialize($listadetalles);
        header('Location: ../view/alquiler/index.php');
        break;
    case "cargar_detalle":
        $id = $_REQUEST['id'];
        $deta = $detalle->getDeta_alqui($id);
        $_SESSION['detalle'] = $deta;
        header('Location: ../view/alquiler/cargar.php');
        break;
    case "actualizar_detalle":

        $id_deta_alqui = $_REQUEST['id_deta_alqui'];
        $id_coche = $_REQUEST['id_coche'];
        $id_alqui = $_REQUEST['id_alqui'];
        $valor = $_REQUEST['valor'];
        $tiempo_ini = $_REQUEST['tiempo_ini'];
        $tiempo_fin = $_REQUEST['tiempo_fin'];
        $alquiler->actualizarAlquiler($id_deta_alqui, $id_coche, $id_alqui, $valor,$tiempo_ini,$tiempo_fin);
        $listadetalles = $detalle->getDeta_alquis();
        $_SESSION['lista_detalle'] = serialize($listadetalles);
        header('Location: ../view/alquiler/index.php');
        break;
    
    //completo
    case "guardar_completo":
        $id_cli = $_REQUEST['id_cli'];
        $id_emp = $_REQUEST['id_emp'];
        $id_coche=$_REQUEST['id_coche'];
        $tiempo_ini = $_REQUEST['tiempo_ini'];
        $tiempo_fin = $_REQUEST['tiempo_fin'];
        $valor = $_REQUEST['valor'];
        $completo->crearCompleto($id_cli,$id_emp,$id_coche,$tiempo_ini,$tiempo_fin,$valor);
        $listaCompletos = $completo->getCompletos();
        $_SESSION['lista_completo'] = serialize($listaCompletos);
        header('Location: ../view/alquiler/index.php');
        
        break;
    case "eliminar_completo":
        $id = $_REQUEST['id_alqui'];
        $alquiler->eliminarAlquiler($id);
        $listaCompletos = $completo->getCompletos();
        $_SESSION['lista_completo'] = serialize($listaCompletos);
        header('Location: ../view/alquiler/index.php');
        break;
    case "cargar_completo":
        $id = $_REQUEST['id'];
        $comple = $completo->getCompleto($id);
        $_SESSION['completo'] = $comple;
        header('Location: ../view/alquiler/cargar.php');
        break;
    case "imprimir_completo":
        $id = $_REQUEST['id'];
        $comple = $completo->getCompleto($id);
        $_SESSION['completo'] = $comple;
        header('Location: ../view/alquiler/resibo.php');
        break;
    case "actualizar_completo":
        $id_alqui = $_REQUEST['id_alqui'];
        $id_cli = $_REQUEST['id_cli'];
        $id_emp = $_REQUEST['id_emp'];
        $id_coche=$_REQUEST['id_coche'];
        $tiempo_ini = $_REQUEST['tiempo_ini'];
        $tiempo_fin = $_REQUEST['tiempo_fin'];
        $valor = $_REQUEST['valor'];
        $completo->actualizarCompleto($id_alqui, $id_cli,$id_emp,$id_coche,$tiempo_ini,$tiempo_fin,$valor);
        $listaCompletos = $completo->getCompletos();
        $_SESSION['lista_completo'] = serialize($listaCompletos);
        header('Location: ../view/alquiler/index.php');
        break;
    
    case "adicionar_detalle":
        //obtenemos los parametros del formulario:
        $idcoche=$_REQUEST['id_coche'];
        $tiempo_1=$_REQUEST['tiempo_ini'];
        $tiempo_2=$_REQUEST['tiempo_fin'];
        $valor=$_REQUEST['valor'];
        if(!isset($_SESSION['listaAlqui_deta'])){
            $listaAlqui_deta=array();
        }else{
            $listaAlqui_deta=unserialize($_SESSION['listaAlqui_deta']);
        }
        try{
            $listaAlqui_deta=$detalle->adicionarDetalle($listaAlqui_deta, $id_coche,$tiempo_1,$tiempo_2, $valor);
            $_SESSION['listaAlqui_deta']=serialize($listaAlqui_deta);
        }catch(Exception $e){
            $mensajeError=$e->getMessage();
            $_SESSION['mensajeError']=$mensajeError;
        }
        header('Location: ../view/alquiler/index.php');
        break;
    
    default:
        header('Location: ../view/index.php ');
}