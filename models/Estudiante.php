<?php
class Estudiante {
    private $conn;
    private $table = "estudiantes";

    public $id;
    public $codigo;
    public $nombre;
    public $apellido;
    public $email;
    public $carrera;
    public $creditos_aprobados;
    public $telefono;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function crear() {
        $query = "INSERT INTO " . $this->table . " 
                  (codigo, nombre, apellido, email, carrera, creditos_aprobados, telefono) 
                  VALUES (:codigo, :nombre, :apellido, :email, :carrera, :creditos, :telefono)";
        
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(":codigo", $this->codigo);
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":apellido", $this->apellido);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":carrera", $this->carrera);
        $stmt->bindParam(":creditos", $this->creditos_aprobados);
        $stmt->bindParam(":telefono", $this->telefono);
        
        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function leerTodos() {
        $query = "SELECT * FROM " . $this->table . " ORDER BY fecha_registro DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function buscarPorCodigo() {
        $query = "SELECT * FROM " . $this->table . " WHERE codigo = :codigo LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":codigo", $this->codigo);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}