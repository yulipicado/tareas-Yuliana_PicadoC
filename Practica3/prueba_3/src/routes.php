<?php
require_once "../src/controllers/UsuarioController.php";

$method = $_SERVER['REQUEST_METHOD'];


$path = trim($_SERVER["PATH_INFO"], '/');

$segmentos = explode("/", $path);


$queryString = $_SERVER['QUERY_STRING'];


parse_str($queryString, $queryParams);

//Extraer los parámetros de la consulta

$id = isset($queryParams['id']) ? $queryParams['id'] : null;



if($path == "usuarios")
{
    $usuarioController = new UsuarioController();
    switch($method){
        
        case 'GET':
            // con esto permite extraer los parametros de la consulta y si no llega nada envia un "null"
            //
            $id = isset($queryParams['id']) ? $queryParams['id'] : null;
            


            if ($id != null){
                $usuarioController->ObtenerPorId(id: $id);
            }
            else {
                $usuarioController->ObtenerTodos();
            }
            
            break;
                CASE 'POST':
                $usuarioController->crear();
            break;
        
        default: 
        echo json_encode(["Error" =>"Metodo no implementado todavia para usuarios."]);
    }

}
?>