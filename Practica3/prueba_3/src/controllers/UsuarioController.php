<?php

require_once '../src/models/UsuarioModel.php';

class UsuarioController{
    public function ObtenerTodos(){
        $modeloUsuario = new Usuario();    // Nombre de la clase relacionada con usuario
        echo json_encode(["Resultado" => $modeloUsuario->getAll()]);      
    }

     //Funcion para obtener datos por medio de un $id
     public function ObtenerPorId($id){
        $modeloUsuario = new Usuario();
        echo json_encode(value: ["Resultado" => $modeloUsuario->getById($id)]);
    }

    public function crear()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $modeloUsuario = new Usuario();
        echo json_encode(value: ["Resultado" => $modeloUsuario->create($data)]);
    }
}