<?php
class Solicitud {
    private $conn;
    private $table = "solicitudes";

    public $id;
    public $id_estudiante;
    public $estado;
    public $paso_actual;
    public $observaciones;
    
    // Datos de empresa
    public $nombre_empresa;
    public $ruc;
    public $direccion;
    public $telefono_empresa;
    public $supervisor;
    public $email_supervisor;
    public $fecha_inicio;
    public $duracion_meses;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function crear() {
        // Iniciar transacción
        $this->conn->beginTransaction();
        
        try {
            // Insertar solicitud
            $query = "INSERT INTO " . $this->table . " 
                      (id_estudiante, estado, paso_actual, observaciones) 
                      VALUES (:id_estudiante, 'Pendiente', 1, :observaciones)";
            
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":id_estudiante", $this->id_estudiante);
            $stmt->bindParam(":observaciones", $this->observaciones);
            $stmt->execute();
            
            $solicitud_id = $this->conn->lastInsertId();
            
            // Insertar datos de empresa
            $query2 = "INSERT INTO empresas 
                       (id_solicitud, nombre_empresa, ruc, direccion, telefono, supervisor, email_supervisor, fecha_inicio, duracion_meses) 
                       VALUES (:id_solicitud, :nombre_empresa, :ruc, :direccion, :telefono, :supervisor, :email_supervisor, :fecha_inicio, :duracion)";
            
            $stmt2 = $this->conn->prepare($query2);
            $stmt2->bindParam(":id_solicitud", $solicitud_id);
            $stmt2->bindParam(":nombre_empresa", $this->nombre_empresa);
            $stmt2->bindParam(":ruc", $this->ruc);
            $stmt2->bindParam(":direccion", $this->direccion);
            $stmt2->bindParam(":telefono", $this->telefono_empresa);
            $stmt2->bindParam(":supervisor", $this->supervisor);
            $stmt2->bindParam(":email_supervisor", $this->email_supervisor);
            $stmt2->bindParam(":fecha_inicio", $this->fecha_inicio);
            $stmt2->bindParam(":duracion", $this->duracion_meses);
            $stmt2->execute();
            
            $this->conn->commit();
            return true;
            
        } catch(Exception $e) {
            $this->conn->rollBack();
            return false;
        }
    }

    public function leerTodos() {
        $query = "SELECT s.*, e.codigo, e.nombre, e.apellido, e.carrera, emp.nombre_empresa, emp.ruc
                  FROM " . $this->table . " s
                  INNER JOIN estudiantes e ON s.id_estudiante = e.id
                  LEFT JOIN empresas emp ON s.id = emp.id_solicitud
                  ORDER BY s.fecha_solicitud DESC";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}