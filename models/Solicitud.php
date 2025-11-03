<?php
class Solicitud {
    private $conn;
    private $table = "solicitudes";

    public $id_solicitud;
    public $id_estudiante;
    public $estado;
    public $paso_actual;
    public $observaciones;
    public $fecha_solicitud;

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

    // ============================================================
    // CREAR NUEVA SOLICITUD CON DATOS DE EMPRESA
    // ============================================================
    public function crear() {
        try {
            $this->conn->beginTransaction();

            // Insertar solicitud
            $query = "INSERT INTO solicitudes 
                      (id_estudiante, estado, paso_actual, observaciones)
                      VALUES (:id_estudiante, 'Pendiente', 1, :observaciones)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":id_estudiante", $this->id_estudiante);
            $stmt->bindParam(":observaciones", $this->observaciones);
            $stmt->execute();

            // Obtener el ID generado automáticamente (por trigger)
            $queryLast = "SELECT id_solicitud FROM solicitudes 
                          WHERE id_estudiante = :id_estudiante 
                          ORDER BY fecha_solicitud DESC LIMIT 1";
            $stmtLast = $this->conn->prepare($queryLast);
            $stmtLast->bindParam(":id_estudiante", $this->id_estudiante);
            $stmtLast->execute();
            $row = $stmtLast->fetch(PDO::FETCH_ASSOC);
            $idGenerado = $row['id_solicitud'];

            // Insertar empresa
            $query2 = "INSERT INTO empresas 
                       (id_solicitud, nombre_empresa, ruc, direccion, telefono, supervisor, email_supervisor, fecha_inicio, duracion_meses)
                       VALUES (:id_solicitud, :nombre_empresa, :ruc, :direccion, :telefono, :supervisor, :email_supervisor, :fecha_inicio, :duracion)";
            $stmt2 = $this->conn->prepare($query2);
            $stmt2->bindParam(":id_solicitud", $idGenerado);
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

        } catch (Exception $e) {
            $this->conn->rollBack();
            error_log("Error al crear solicitud: " . $e->getMessage());
            return false;
        }
    }

    // ============================================================
    // LISTAR TODAS LAS SOLICITUDES CON DATOS DE ESTUDIANTE Y EMPRESA
    // ============================================================
    public function leerTodos() {
        $query = "SELECT 
                        s.id_solicitud,
                        s.id_estudiante,
                        s.estado,
                        s.paso_actual,
                        s.observaciones,
                        s.fecha_solicitud,
                        e.nombre,
                        e.apellido,
                        e.carrera,
                        e.creditos_aprobados,
                        e.email,
                        emp.nombre_empresa,
                        emp.ruc
                  FROM solicitudes s
                  INNER JOIN estudiantes e ON s.id_estudiante = e.codigo
                  LEFT JOIN empresas emp ON s.id_solicitud = emp.id_solicitud
                  ORDER BY s.fecha_solicitud DESC";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
?>
