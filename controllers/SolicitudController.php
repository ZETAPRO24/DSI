<?php
// ============================================
// controllers/SolicitudController.php
// ============================================
class SolicitudController {
    private $db;
    private $solicitud;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->solicitud = new Solicitud($this->db);
    }

    public function crear() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->solicitud->id_estudiante = $_POST['id_estudiante'];
            $this->solicitud->nombre_empresa = $_POST['nombre_empresa'];
            $this->solicitud->ruc = $_POST['ruc'];
            $this->solicitud->direccion = $_POST['direccion'];
            $this->solicitud->telefono_empresa = $_POST['telefono_empresa'];
            $this->solicitud->supervisor = $_POST['supervisor'];
            $this->solicitud->email_supervisor = $_POST['email_supervisor'];
            $this->solicitud->fecha_inicio = $_POST['fecha_inicio'];
            $this->solicitud->duracion_meses = $_POST['duracion_meses'];
            $this->solicitud->observaciones = $_POST['observaciones'];

            if($this->solicitud->crear()) {
                header("Location: index.php?action=lista_solicitudes&success=1");
                exit();
            } else {
                $error = "Error al crear solicitud";
            }
        }
        
        // Obtener lista de estudiantes para el select
        $estudiante = new Estudiante($this->db);
        $estudiantes = $estudiante->leerTodos();
        
        include 'views/solicitud/formulario.php';
    }

    public function listar() {
        $stmt = $this->solicitud->leerTodos();
        include 'views/solicitud/lista.php';
    }
}