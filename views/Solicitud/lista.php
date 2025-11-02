<?php
// views/solicitud/lista.php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Solicitudes</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f5f5f5; padding: 20px; }
        .container { max-width: 1400px; margin: 0 auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h1 { color: #333; margin-bottom: 20px; text-align: center; }
        .nav { margin-bottom: 20px; }
        .nav a { color: #2196F3; text-decoration: none; margin-right: 15px; padding: 10px 15px; background: #f0f0f0; border-radius: 5px; display: inline-block; }
        .nav a:hover { background: #1976D2; color: white; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; vertical-align: top; }
        th { background: #2196F3; color: white; font-weight: bold; }
        tr:hover { background: #f9f9f9; }
        .badge { padding: 6px 10px; border-radius: 12px; font-size: 12px; font-weight: bold; display: inline-block; }
        .badge-pendiente { background: #fff3cd; color: #856404; }
        .badge-aprobada { background: #d4edda; color: #155724; }
        .badge-rechazada { background: #f8d7da; color: #721c24; }
        .small { font-size: 12px; color: #666; }
        .actions a { margin-right: 8px; text-decoration: none; padding: 6px 10px; border-radius: 6px; background: #eee; color: #333; }
        .actions a:hover { background: #ddd; }
        .empty { text-align: center; padding: 40px 0; color: #666; }
    </style>
</head>
<body>
    <div class="container">
        <div class="nav">
            <a href="index.php">← Inicio</a>
            <a href="index.php?action=registro_estudiante">+ Nuevo Estudiante</a>
            <a href="index.php?action=nueva_solicitud">+ Nueva Solicitud</a>
        </div>

        <h1>📑 Lista de Solicitudes</h1>

        <?php if(isset($_GET['success'])): ?>
            <div class="small" style="margin-bottom:10px;color:green;">✅ Acción realizada correctamente</div>
        <?php endif; ?>

        <?php
        // $stmt debería venir del controlador: $stmt = $solicitud->leerTodos();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(count($rows) === 0): ?>
            <div class="empty">No hay solicitudes registradas aún.</div>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Estudiante</th>
                        <th>Empresa</th>
                        <th>RUC / Teléfono</th>
                        <th>Estado</th>
                        <th>Fecha inicio / Duración</th>
                        <th>Observaciones</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; foreach($rows as $row): ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td>
                                <strong><?php echo htmlspecialchars($row['codigo'] ?? $row['codigo_estudiante'] ?? '—'); ?></strong><br>
                                <?php echo htmlspecialchars(($row['nombre'] ?? '') . ' ' . ($row['apellido'] ?? '')); ?><br>
                                <span class="small"><?php echo htmlspecialchars($row['carrera'] ?? ''); ?></span>
                            </td>
                            <td>
                                <?php echo htmlspecialchars($row['nombre_empresa'] ?? '—'); ?><br>
                                <span class="small"><?php echo htmlspecialchars($row['direccion'] ?? ''); ?></span>
                            </td>
                            <td>
                                <?php echo htmlspecialchars($row['ruc'] ?? '—'); ?><br>
                                <span class="small"><?php echo htmlspecialchars($row['telefono'] ?? $row['telefono_empresa'] ?? ''); ?></span>
                            </td>
                            <td>
                                <?php
                                    $estado = $row['estado'] ?? 'Pendiente';
                                    if(strtolower($estado) === 'pendiente') {
                                        echo '<span class="badge badge-pendiente">Pendiente</span>';
                                    } elseif(strtolower($estado) === 'aprobado' || strtolower($estado) === 'aprobada') {
                                        echo '<span class="badge badge-aprobada">Aprobado</span>';
                                    } elseif(strtolower($estado) === 'rechazado') {
                                        echo '<span class="badge badge-rechazada">Rechazado</span>';
                                    } else {
                                        echo '<span class="badge">' . htmlspecialchars($estado) . '</span>';
                                    }
                                ?>
                                <div class="small">Paso: <?php echo htmlspecialchars($row['paso_actual'] ?? '1'); ?></div>
                            </td>
                            <td>
                                <?php echo !empty($row['fecha_inicio']) ? date('d/m/Y', strtotime($row['fecha_inicio'])) : '—'; ?><br>
                                <span class="small"><?php echo !empty($row['duracion_meses']) ? ($row['duracion_meses'] . ' mes(es)') : '—'; ?></span>
                            </td>
                            <td><?php echo nl2br(htmlspecialchars($row['observaciones'] ?? '')); ?></td>
                            <td class="actions">
                                <a href="index.php?action=ver_solicitud&id=<?php echo $row['id'] ?? $row['solicitud_id'] ?? ''; ?>">Ver</a>
                                <a href="index.php?action=editar_solicitud&id=<?php echo $row['id'] ?? $row['solicitud_id'] ?? ''; ?>">Editar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>
