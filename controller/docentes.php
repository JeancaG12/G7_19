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
    require_once("../models/Docentes.php");
    $docente = new Docentes();

    $body=json_decode(file_get_contents("php://input"),true);

    switch($_GET["op"]){
        case "GetDocentes":
            $datos=$docente->get_Docentes();
            echo json_encode($datos);
        break;

        case "GetDocente":
            $datos=$docente->get_Docente($body["Numero_Docente"]);
            echo json_encode($datos);
        break;

        case "InsertDocente":
            $datos=$docente->insert_Docente($body["Numero_Docente"],$body["Nombre"],$body["Apellidos"],$body["Fecha_Contratacion"],$body["Direccion"],$body["Salario"],$body["Profesion"]);
            echo json_encode("-> Docente agregado con éxito!");
        break;

        case "UpdateDocente":
            $datos=$docente->update_Docente($body["Numero_Docente"],$body["Nombre"],$body["Apellidos"],$body["Fecha_Contratacion"],$body["Direccion"],$body["Salario"],$body["Profesion"]);
            echo json_encode("-> El docente ha sido actualizado con éxito!");
        break;

        case "DeleteDocente":
            $datos=$docente->delete_Docente($body["Numero_Docente"]);
            echo json_encode("-> El docente ha sido eliminado con éxito!");
        break;
    }
?>