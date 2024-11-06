<?php

require_once "../src/controllers/usuariosC.php";

//http://localhost/libreria-api/public/index.php/saludo

$method = $_SERVER["REQUEST_METHOD"];


$path = trim($_SERVER["PATH_INFO"], '/');


$segmentos = explode("/", $path);


$queryString = $_SERVER['QUERY_STRING'];


parse_str($queryString, $queryParams);


// Extraemos los parámetros de la consulta
$id = isset($queryParams['id']) ? $queryParams['id'] : null;



if($path == "usuarios")
{

    switch($method) {
        case  'GET':

            $UsuarioController = new UsuarioController();
            $UsuarioController->ObtenerTodos();
            echo json_encode(["Resultado" =>  $UsuarioController->ObtenerTodos() ]);
           // echo json_encode(["Resultado" => "llamando al get de libros" ]);
          
            break;

        default:
            echo json_encode(["Error" => "llamando al get de libros" ]);

    }

}
