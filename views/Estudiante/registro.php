<?php
// views/estudiante/registro.php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Estudiante</title>
    <link rel="stylesheet" href="views/style.css">
</head>
<body>
    <div class="container">
        <div class="nav">
            <a href="index.php">← Inicio</a>
            <a href="index.php?action=lista_estudiantes">📋 Ver Estudiantes</a>
        </div>

        <div class="header">
            <div class="logo">👤</div>
            <h1>Registro de Estudiante</h1>
            <p>Complete el formulario para registrar un nuevo estudiante</p>
        </div>

        <div class="info-box">
            <h3>ℹ️ Requisitos para el Registro</h3>
            <ul>
                <li>Todos los campos marcados con (*) son obligatorios</li>
                <li>El estudiante debe tener mínimo 150 créditos aprobados</li>
                <li>El código debe ser único en el sistema</li>
            </ul>
        </div>

        <?php if(isset($error)): ?>
            <div class="alert alert-error">⚠️ <?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST" action="index.php?action=registro_estudiante">
            <div class="form-section">
                <div class="grid-2">
                    <div class="form-group">
                        <label>Código de Estudiante *</label>
                        <input type="text" name="codigo" required placeholder="Ej: 2020123456">
                    </div>

                    <div class="form-group">
                        <label>Teléfono *</label>
                        <input type="text" name="telefono" required placeholder="Ej: 987654321">
                    </div>
                </div>

                <div class="grid-2">
                    <div class="form-group">
                        <label>Nombres *</label>
                        <input type="text" name="nombre" required placeholder="Ej: Juan Carlos">
                    </div>

                    <div class="form-group">
                        <label>Apellidos *</label>
                        <input type="text" name="apellido" required placeholder="Ej: Pérez García">
                    </div>
                </div>

                <div class="form-group">
                    <label>Email Institucional *</label>
                    <input type="email" name="email" required placeholder="Ej: juan.perez@ejemplo.edu.pe">
                </div>

                <div class="grid-2">
                    <div class="form-group">
                        <label>Carrera Profesional *</label>
                        <select name="carrera" required>
                            <option value="">Seleccione una carrera...</option>
                            <option value="Ingeniería de Sistemas">Ingeniería de Sistemas</option>
                            <option value="Ingeniería Industrial">Ingeniería Industrial</option>
                            <option value="Administración">Administración</option>
                            <option value="Contabilidad">Contabilidad</option>
                            <option value="Derecho">Derecho</option>
                            <option value="Medicina">Medicina</option>
                            <option value="Arquitectura">Arquitectura</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Créditos Aprobados *</label>
                        <input type="number" name="creditos_aprobados" required min="150" max="250" placeholder="Ej: 180">
                    </div>
                </div>
            </div>

            <button type="submit" class="btn">Registrar</button>
            <a href="index.php?action=lista_estudiantes" style="text-decoration: none;">
                <button type="button" class="btn btn-secondary">📋 Ver Estudiantes Registrados</button>
            </a>
        </form>

        <div class="footer">
            <p>© 2025 Sistema de Prácticas Pre Profesionales</p>
        </div>
    </div>
</body>
</html>