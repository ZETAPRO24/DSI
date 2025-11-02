
<?php
// views/estudiante/registro.php
?>
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Estudiante</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f5f5f5; padding: 20px; }
        .container { max-width: 800px; margin: 0 auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h1 { color: #333; margin-bottom: 30px; text-align: center; }
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 5px; color: #555; font-weight: bold; }
        input, select { width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px; }
        input:focus, select:focus { outline: none; border-color: #4CAF50; }
        .btn { background: #4CAF50; color: white; padding: 15px 30px; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; width: 100%; margin-top: 10px; }
        .btn:hover { background: #45a049; }
        .btn-secondary { background: #666; }
        .btn-secondary:hover { background: #555; }
        .alert { padding: 15px; margin-bottom: 20px; border-radius: 5px; }
        .alert-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .alert-error { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; }
        .nav { margin-bottom: 20px; }
        .nav a { color: #4CAF50; text-decoration: none; margin-right: 15px; }
        .nav a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="container">
        <div class="nav">
            <a href="index.php">← Inicio</a>
            <a href="index.php?action=lista_estudiantes">Ver Estudiantes</a>
            <a href="index.php?action=nueva_solicitud">Nueva Solicitud</a>
        </div>

        <h1>📝 Registro de Estudiante</h1>

        <?php if(isset($error)): ?>
            <div class="alert alert-error"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST" action="index.php?action=registro_estudiante">
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
                <label>Email *</label>
                <input type="email" name="email" required placeholder="Ej: juan.perez@ejemplo.edu.pe">
            </div>

            <div class="grid-2">
                <div class="form-group">
                    <label>Carrera Profesional *</label>
                    <select name="carrera" required>
                        <option value="">Seleccione...</option>
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
                    <input type="number" name="creditos_aprobados" required min="0" max="250" placeholder="Ej: 180">
                </div>
            </div>

            <button type="submit" class="btn">✅ Registrar Estudiante</button>
            <a href="index.php?action=lista_estudiantes"><button type="button" class="btn btn-secondary">Ver Estudiantes Registrados</button></a>
        </form>
    </div>
</body>
</html>