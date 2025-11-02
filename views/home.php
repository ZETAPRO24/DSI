<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Prácticas Pre Profesionales</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: Arial, sans-serif; 
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .container { 
            max-width: 1000px; 
            width: 100%;
            background: white; 
            padding: 50px; 
            border-radius: 20px; 
            box-shadow: 0 10px 40px rgba(0,0,0,0.2); 
        }
        .header {
            text-align: center;
            margin-bottom: 50px;
        }
        .header h1 { 
            color: #1e3c72; 
            font-size: 36px;
            margin-bottom: 15px;
            font-weight: bold;
        }
        .header p {
            color: #5a7ba5;
            font-size: 18px;
        }
        .logo {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, #2196F3 0%, #1976D2 100%);
            border-radius: 50%;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 48px;
            box-shadow: 0 5px 15px rgba(33, 150, 243, 0.3);
        }
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
            margin-bottom: 40px;
        }
        .menu-card {
            background: #f8fbff;
            border: 2px solid #e3f2fd;
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            text-decoration: none;
            color: #333;
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }
        .menu-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(180deg, #2196F3 0%, #1976D2 100%);
            transition: width 0.3s ease;
        }
        .menu-card:hover::before {
            width: 100%;
            opacity: 0.05;
        }
        .menu-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(33, 150, 243, 0.2);
            border-color: #2196F3;
            background: white;
        }
        .menu-card .icon {
            font-size: 48px;
            margin-bottom: 15px;
            display: block;
            position: relative;
            z-index: 1;
        }
        .menu-card h3 {
            color: #1e3c72;
            font-size: 20px;
            margin-bottom: 10px;
            position: relative;
            z-index: 1;
        }
        .menu-card p {
            color: #5a7ba5;
            font-size: 14px;
            line-height: 1.5;
            position: relative;
            z-index: 1;
        }
        
        .card-primary .icon { color: #2196F3; }
        .card-secondary .icon { color: #1976D2; }
        .card-light .icon { color: #42a5f5; }
        .card-dark .icon { color: #1565C0; }
        
        .footer {
            text-align: center;
            padding-top: 30px;
            border-top: 1px solid #e3f2fd;
            color: #90a4ae;
            font-size: 14px;
        }
        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 40px;
            padding: 30px;
            background: linear-gradient(135deg, #2196F3 0%, #1976D2 100%);
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(33, 150, 243, 0.3);
        }
        .stat-box {
            text-align: center;
            color: white;
        }
        .stat-box .number {
            font-size: 36px;
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        .stat-box .label {
            font-size: 14px;
            opacity: 0.9;
        }
        
        @media (max-width: 768px) {
            .menu-grid {
                grid-template-columns: 1fr;
            }
            .stats {
                grid-template-columns: 1fr;
            }
            .container {
                padding: 30px;
            }
            .header h1 {
                font-size: 28px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">🎓</div>
            <h1>Sistema de Prácticas Pre Profesionales</h1>
            <p>Gestión integral de prácticas para estudiantes</p>
        </div>

        <div class="stats">
            <div class="stat-box">
                <span class="number">150+</span>
                <span class="label">Estudiantes Registrados</span>
            </div>
            <div class="stat-box">
                <span class="number">45</span>
                <span class="label">Solicitudes Activas</span>
            </div>
            <div class="stat-box">
                <span class="number">7</span>
                <span class="label">Pasos del Proceso</span>
            </div>
        </div>

        <div class="menu-grid">
            <a href="index.php?action=registro_estudiante" class="menu-card card-primary">
                <span class="icon">👤</span>
                <h3>Registrar Estudiante</h3>
                <p>Registra un nuevo estudiante en el sistema para que pueda solicitar sus prácticas</p>
            </a>

            <a href="index.php?action=lista_estudiantes" class="menu-card card-secondary">
                <span class="icon">📋</span>
                <h3>Ver Estudiantes</h3>
                <p>Consulta la lista completa de estudiantes registrados y su estado</p>
            </a>

            <a href="index.php?action=nueva_solicitud" class="menu-card card-light">
                <span class="icon">📝</span>
                <h3>Nueva Solicitud</h3>
                <p>Crea una nueva solicitud de prácticas pre profesionales</p>
            </a>

            <a href="index.php?action=lista_solicitudes" class="menu-card card-dark">
                <span class="icon">📊</span>
                <h3>Ver Solicitudes</h3>
                <p>Revisa todas las solicitudes y su estado actual en el proceso</p>
            </a>
        </div>

        <div class="footer">
            <p>© 2025 Sistema de Prácticas Pre Profesionales | Desarrollado para DSI</p>
            <p style="margin-top: 10px; font-size: 12px;">Versión 1.0 | Requiere mínimo 150 créditos aprobados</p>
        </div>
    </div>
</body>
</html>