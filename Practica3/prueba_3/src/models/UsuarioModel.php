<?php
// Aqui la clase se llama "Libro" porque se esta trabajando en la tabla "Libros" en la bd.
// y para sustraer los datos de la tabla "libro", para esa tabla se le va a hacer una clase
// llamada "libro".
// Estas clases son para trabajar sobre esa tabla, hacer cualquier cosa con los datos de esa tabla.

require_once '../src/db/Database.php';


class Usuario {

    private $db;

    public function __construct(){      // este constructor se ejecuta automaticamente, para crear la coneccion
        $this->db = new Database();
    }

    public function getAll(){

        $consulta = $this->db->connect()->query("
        SELECT 
            usuarios.id,
            usuarios.nombre,
            usuarios.correo,
            usuarios.edad
        FROM usuarios
        ");
        return $consulta->fetchAll();
    }

    public function getById($id){
        $consulta = $this->db->connect()->prepare(
            "SELECT * FROM usuarios WHERE id = ?"); // El simbolo de pregunta es el parametro
        
        $consulta->execute(params:[$id]);
        return $consulta->fetch();
    }

    public function create($data){
        $consulta = $this->db->connect()->prepare(
            "INSERT INTO usuarios (nombre, correo, edad) VALUES (?,?,?)");
        $consulta->execute([$data['nombre'],$data['correo'],$data['edad']]);
        return $this->db->connect()->lastInsertId();
    
}

}


?>