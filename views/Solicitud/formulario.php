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
    <link rel="stylesheet" href="views/style.css">
</head>
<body>
    <div class="container">
        <div class="nav">
            <a href="index.php">← Inicio</a>
            <a href="index.php?action=lista_solicitudes">Ver Solicitudes</a>
        </div>

        <h1>🎓 Nueva Solicitud de Prácticas Pre Profesionales</h1>
        <p class="subtitle">Complete todos los campos del formulario</p>

        <?php if(isset($error)): ?>
            <div class="alert alert-error"><?php echo $error; ?></div>
        <?php endif; ?>

        <div class="info-box">
            <strong>Importante:</strong> Debes tener al menos 150 créditos aprobados para solicitar prácticas preprofesionales.
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
                            <option value="<?php echo $row['codigo']; ?>">
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
                <h2>🗓️ Detalles de las Prácticas</h2>
                
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

            <button type="submit" class="btn">Enviar</button>
        </form>
    </div>
</body>
</html>
