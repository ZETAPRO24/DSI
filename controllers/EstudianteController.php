
<?php
// controllers/EstudianteController.php
class EstudianteController {
    private $db;
    private $estudiante;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->estudiante = new Estudiante($this->db);
    }

    public function registrar() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->estudiante->codigo = $_POST['codigo'];
            $this->estudiante->nombre = $_POST['nombre'];
            $this->estudiante->apellido = $_POST['apellido'];
            $this->estudiante->email = $_POST['email'];
            $this->estudiante->carrera = $_POST['carrera'];
            $this->estudiante->creditos_aprobados = $_POST['creditos_aprobados'];
            $this->estudiante->telefono = $_POST['telefono'];

            if($this->estudiante->crear()) {
                header("Location: index.php?action=lista_estudiantes&success=1");
                exit();
            } else {
                $error = "Error al registrar estudiante";
            }
        }
        include 'views/estudiante/registro.php';
    }

    public function listar() {
        $stmt = $this->estudiante->leerTodos();
        include 'views/estudiante/lista.php';
    }
}
