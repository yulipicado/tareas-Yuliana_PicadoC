<?php

require_once '../src/models/Libro.php';



class UsuarioController{


    public function ObtenerTodos(){

        $modeloUsuario = new Usuario();
         return  $modeloUsuario->getAll();
    }
}


?>