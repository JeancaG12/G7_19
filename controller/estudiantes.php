<?php
   if($_SERVER['REQUEST_METHOD']==='OPTIONS'){
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
        header('Access-Control-Allow-Headers: token, Content-Type');
        header('Access-Control-Allow-Max-Age: 1728000');
        header('Content-Length: 0');
        header('Content-Type: text/plain');
        die();
    }

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    require_once("../config/Conexion.php");
    require_once("../models/Estudiantes.php");
    $estudiant = new Estudiantes();

    $body=json_decode(file_get_contents("php://input"),true);

    switch($_GET["op"]){
        case "GetEstudiantes":
            $datos=$estudiant->get_Estudiantes();
            echo json_encode($datos);
        break;

        case "GetEstudiante":
            $datos=$estudiant->get_Estudiante($body["Numero_Alumno"]);
            echo json_encode($datos);
        break;

        case "InsertEstudiante":
            $datos=$estudiant->insert_Estudiante($body["Numero_Alumno"],$body["Nombre"],$body["Apellidos"],$body["Fecha_Nacimiento"],$body["Direccion"],$body["Altura"],$body["Carrera"]);
            echo json_encode("-> Estudiante agregado con éxito!");
        break;

        case "UpdateEstudiante":
            $datos=$estudiant->update_Estudiante($body["Numero_Alumno"],$body["Nombre"],$body["Apellidos"],$body["Fecha_Nacimiento"],$body["Direccion"],$body["Altura"],$body["Carrera"]);
            echo json_encode("-> El estudiante ha sido actualizado con éxito!");
        break;

        case "DeleteEstudiante":
            $datos=$estudiant->delete_Estudiante($body["Numero_Alumno"]);
            echo json_encode("-> El estudiante ha sido eliminado con éxito!");
        break;
    }
?>