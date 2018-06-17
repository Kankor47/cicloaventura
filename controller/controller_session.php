<?php
require_once '../model/ModelPaciente.php';
require_once '../model/ModelPacienteDatos.php';
session_start();
$opcion = $_REQUEST['opcion'];
$sintoma = $_REQUEST['sintoma'];
$model = new ModelPacienteDatos();
$usuario = new ModelPaciente();

switch ($opcion) {

    case "aspectos_generales":

        $problema = $_REQUEST['problema'];
        $otros = $_REQUEST['otros'];
        $antecedentes = $_REQUEST['antecedentes'];
        $ginecologicos = $_REQUEST['ginecologicos'];
        
        $cedula=$_REQUEST['cedula'];
        $fecha=$_REQUEST['fecha_registro'];
        
        
        $_SESSION['cedula']= serialize($cedula);     
        $_SESSION['fecha_registro'] = serialize($fecha);
        $_SESSION['problema'] = serialize($problema);
        $_SESSION['otros'] = serialize($otros);
        $_SESSION['antecedentes'] = serialize($antecedentes);
        $_SESSION['ginecologicos'] = serialize($ginecologicos);

        header('Location: ../view/paciente/estilos_vida.php');
        break;
    case "estilos_vida":

        $diario = $_REQUEST['diario'];
        $actividad = $_REQUEST['actividad'];
        $ejercicio = $_REQUEST['ejercicio'];
        $consumo= $_REQUEST['consumo'];

        $_SESSION['diario'] = serialize($diario);
        $_SESSION['actividad'] = serialize($actividad);
        $_SESSION['ejercicio'] = serialize($ejercicio);
        $_SESSION['consumo'] = serialize($consumo);
     

        header('Location: ../view/paciente/consumo.php');
        break;
    case "consumo":

        $indicadores = $_REQUEST['indicadores'];
        $habitos = $_REQUEST['habitos'];
        $apetito = $_REQUEST['apetito'];
        $especial = $_REQUEST['especial'];
        $habitual = $_REQUEST['habitual'];
       

        $_SESSION['indicadores'] = serialize($indicadores);
        $_SESSION['habitos'] = serialize($habitos);
        $_SESSION['apetito'] = serialize($apetito);
        $_SESSION['especial'] = serialize($especial);
        $_SESSION['habitual'] = serialize($habitual);
        
        
        $cedul= unserialize($_SESSION['cedula']);
        $fecha_r= unserialize($_SESSION['fecha_registro']);
       
       
        $user = $usuario->getPaciente($cedul);
        $_SESSION['user'] = $user;
        
        header('Location: ../view/paciente/reporte.php');
        break;
    
    case "guardar_registro":
        
        $fecha_r= unserialize($_SESSION['fecha_registro']);
        $problem=$_REQUEST['problema'];
        $otro=$_REQUEST['otros'] ;
        $antecedente=$_REQUEST['antecedentes'] ;
        $ginecologico=$_REQUEST['ginecologicos'] ;
        $diari=$_REQUEST['diario'];
        $activida= $_REQUEST['actividad'];
        $ejercici=$_REQUEST['ejercicio'];
        $consum=$_REQUEST['consumo'] ;
        $indicadore=$_REQUEST['indicadores'] ;
        $habito=$_REQUEST['habitos'];
        $apetit=$_REQUEST['apetito'] ;
        $especia=$_REQUEST['especial'];
        $habitua=$_REQUEST['habitual'];
          
        
     $registro = $model->crearRegistro($fecha_r, $problem, $otro, $antecedente,
                $ginecologico, $diari, $activida, $ejercici, $consum, $indicadore, $habito, $apetit,
                $especia, $habitua);
        $_SESSION['registro'] = serialize($registro);
         header('Location: ../view/paciente/reporte.php');
        break;
}


