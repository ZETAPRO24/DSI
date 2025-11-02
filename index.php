
<?php
// index.php (Controlador frontal)
require_once 'config/database.php';
require_once 'models/Estudiante.php';
require_once 'models/Solicitud.php';
require_once 'controllers/EstudianteController.php';
require_once 'controllers/SolicitudController.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'home';

switch($action) {
    case 'registro_estudiante':
        $controller = new EstudianteController();
        $controller->registrar();
        break;
    
    case 'lista_estudiantes':
        $controller = new EstudianteController();
        $controller->listar();
        break;
    
    case 'nueva_solicitud':
        $controller = new SolicitudController();
        $controller->crear();
        break;
    
    case 'lista_solicitudes':
        $controller = new SolicitudController();
        $controller->listar();
        break;
    
    default:
        include 'views/home.php';
        break;
}
?>