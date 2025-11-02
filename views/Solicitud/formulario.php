<?php
// ============================================
// views/solicitud/formulario.php
// ============================================
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Solicitud de Prácticas</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f5f5f5; padding: 20px; }
        .container { max-width: 900px; margin: 0 auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h1 { color: #333; margin-bottom: 10px; text-align: center; }
        .subtitle { text-align: center; color: #666; margin-bottom: 30px; }
        .section { background: #f9f9f9; padding: 20px; border-radius: 8px; margin-bottom: 25px; border-left: 4px solid #2196F3; }
        .section h2 { color: #2196F3; margin-bottom: 15px; font-size: 18px; }
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 5px; color: #555; font-weight: bold; }
        input, select, textarea { width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px; }
        input:focus, select:focus, textarea:focus { outline: none; border-color: #2196F3; }
        textarea { resize: vertical; min-height: 80px; }
        .btn { background: #2196F3; color: white; padding: 15px 30px; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; width: 100%; margin-top: 10px; }
        .btn:hover { background: #1976D2; }
        .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; }
        .grid-3 { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 15px; }
        .alert { padding: 15px; margin-bottom: 20px; border-radius: 5px; }
        .alert-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .alert-error { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        .nav { margin-bottom: 20px; }
        .nav a { color: #2196F3; text-decoration: none; margin-right: 15px; }
        .nav a:hover { text-decoration: underline; }
        .info-box { background: #e3f2fd; border: 1px solid #2196F3; padding: 15px; border-radius: 5px; margin-bottom: 20px; }
        .info-box strong { color: #1976D2; }
    </style>
</head>
<body>
    <div class="container">
        <div class="nav">
            <a href="index.php">← Inicio</a>
            <a href="index.php?action=registro_estudiante">Registrar Estudiante</a>
            <a href="index.php?action=lista_solicitudes">Ver Solicitudes</a>
        </div>

        <h1>🎓 Nueva Solicitud de Prácticas Pre Profesionales</h1>
        <p class="subtitle">Complete todos los campos del formulario</p>

        <?php if(isset($error)): ?>
            <div class="alert alert-error"><?php echo $error; ?></div>
        <?php endif; ?>

        <div class="info-box">
            <strong>ℹ️ Importante:</strong> Debes tener al menos 150 créditos aprobados para solicitar prácticas pre profesionales.
        </div>

        <form method="POST" action="index.php?action=nueva_solicitud">
            
            <!-- SECCIÓN 1: ESTUDIANTE -->
            <div class="section">
                <h2>👤 Datos del Estudiante</h2>
                <div class="form-group">
                    <label>Selecciona tu cuenta *</label>
                    <select name="id_estudiante" required>
                        <option value="">-- Selecciona un estudiante --</option>
                        <?php while($row = $estudiantes->fetch(PDO::FETCH_ASSOC)): ?>
                            <option value="<?php echo $row['id']; ?>">
                                <?php echo $row['codigo'] . ' - ' . $row['nombre'] . ' ' . $row['apellido'] . ' (' . $row['creditos_aprobados'] . ' créditos)'; ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>
            </div>

            <!-- SECCIÓN 2: EMPRESA -->
            <div class="section">
                <h2>🏢 Datos de la Empresa</h2>
                
                <div class="form-group">
                    <label>Nombre de la Empresa/Institución *</label>
                    <input type="text" name="nombre_empresa" required placeholder="Ej: Tech Solutions SAC">
                </div>

                <div class="grid-2">
                    <div class="form-group">
                        <label>RUC *</label>
                        <input type="text" name="ruc" required maxlength="11" placeholder="20123456789">
                    </div>

                    <div class="form-group">
                        <label>Teléfono *</label>
                        <input type="text" name="telefono_empresa" required placeholder="014567890">
                    </div>
                </div>

                <div class="form-group">
                    <label>Dirección Completa *</label>
                    <textarea name="direccion" required placeholder="Av. Principal 123, Distrito, Provincia"></textarea>
                </div>
            </div>

            <!-- SECCIÓN 3: SUPERVISOR -->
            <div class="section">
                <h2>👨‍💼 Supervisor en la Empresa</h2>
                
                <div class="grid-2">
                    <div class="form-group">
                        <label>Nombre del Supervisor *</label>
                        <input type="text" name="supervisor" required placeholder="Ej: Carlos Rodríguez">
                    </div>

                    <div class="form-group">
                        <label>Email del Supervisor *</label>
                        <input type="email" name="email_supervisor" required placeholder="carlos@empresa.com">
                    </div>
                </div>
            </div>

            <!-- SECCIÓN 4: PRÁCTICAS -->
            <div class="section">
                <h2>📅 Detalles de las Prácticas</h2>
                
                <div class="grid-2">
                    <div class="form-group">
                        <label>Fecha de Inicio *</label>
                        <input type="date" name="fecha_inicio" required min="<?php echo date('Y-m-d'); ?>">
                    </div>

                    <div class="form-group">
                        <label>Duración (meses) *</label>
                        <select name="duracion_meses" required>
                            <option value="">Seleccione...</option>
                            <option value="3">3 meses</option>
                            <option value="4">4 meses</option>
                            <option value="5">5 meses</option>
                            <option value="6">6 meses</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label>Observaciones</label>
                    <textarea name="observaciones" placeholder="Información adicional relevante (opcional)"></textarea>
                </div>
            </div>

            <button type="submit" class="btn">📤 Enviar Solicitud</button>
        </form>
    </div>
</body>
</html><?php