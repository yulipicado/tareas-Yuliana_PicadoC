<?php

$method = $_SERVER['REQUEST_METHOD'];


$path = trim($_SERVER["PATH_INFO"], '/');

$segmentos = explode("/", $path);


$queryString = $_SERVER['QUERY_STRING'];


parse_str($queryString, $queryParams);

//Extraer los parámetros de la consulta

$id = isset($queryParams['id']) ? $queryParams['id'] : null;


if($path == "usuarios")
{

    switch($method){
        case 'GET':
            if(!empty($id)){
                echo "El id del usuario es $id. Donde $id es el numero del id enviado por parámetros";
            }
           
            else {
                echo "Lista de todos los usuarios";
            }
            break;
        
        default:
            echo "Lista de todos los usuarios";
    }



}




?>