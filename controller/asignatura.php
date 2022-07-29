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
    require_once("../models/Asignatura.php");
    $asignaturas = new Asignaturas();

    $body=json_decode(file_get_contents("php://input"),true);

    switch($_GET["opc"]){

        case "GetAsignaturas": 
            $datos=$asignaturas->get_asignaturas();
            echo json_encode($datos);
        break;    

        case "GetAsignatura":
            $datos=$asignaturas->insert_asignatura($body["CodigoAsignatura"]);
            echo json_encode($datos);

        break;

        case "InsertAsignatura":
            $datos=$asignaturas->insert_asignatura($body["CodigoAsignatura"], $body["NombreAsignatura"], $body["Carrera"], $body["FechaCreacion"], $body["UnidadesVal"], $body["PromedioAprob"], $body["NumeroEdificio"]);
            echo json_encode("Asignatura Agregada");

        break;

        case "UpdateAsignatura":
            $datos=$asignaturas->update_asignatura($body["NombreAsignatura"], $body["Carrera"], $body["FechaCreacion"], $body["UnidadesVal"], $body["PromedioAprob"], $body["NumeroEdificio"]);
            echo json_encode("Asignatura Actualizada");

        break;
        
        case "DeleteAsignatura":
            $datos=$asignaturas->delete_asignatura($body["CodigoAsignatura"]);
            echo json_encode("Asignatura Eliminada");

        break;
    }


?>