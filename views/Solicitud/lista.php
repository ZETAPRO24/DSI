<?php
// views/solicitud/lista.php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Solicitudes</title>
    <link rel="stylesheet" href="views/style.css">
</head>
<body>
<div class="container">

    <!-- Navegación -->
    <div class="nav">
        <a href="index.php">← Inicio</a>
        <a href="index.php?action=nueva_solicitud">+ Nueva Solicitud</a>
    </div>

    <h1>📑 Lista de Solicitudes</h1>

    <?php if(isset($_GET['success'])): ?>
        <div class="alert alert-success">✅ Solicitud registrada correctamente.</div>
    <?php endif; ?>

    <?php if(isset($_GET['updated'])): ?>
        <div class="alert alert-info">✏️ Solicitud actualizada correctamente.</div>
    <?php endif; ?>

    <?php
    // Asegúrate que $stmt venga del controlador: $stmt = $solicitud->leerTodos();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (count($rows) === 0): ?>
        <div class="empty">No hay solicitudes registradas aún.</div>
    <?php else: ?>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Estudiante</th>
                        <th>Empresa</th>
                        <th>RUC / Teléfono</th>
                        <th>Supervisor</th>
                        <th>Estado</th>
                        <th>Fecha inicio / Duración</th>
                        <th>Observaciones</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; foreach($rows as $row): 
                        $solicitud_id = $row['id_solicitud'] ?? null;
                        $codigo_estudiante = $row['id_estudiante'] ?? '';
                        $nombre_estudiante = $row['nombre'] ?? '';
                        $apellido_estudiante = $row['apellido'] ?? '';
                        $carrera = $row['carrera'] ?? '';

                        $nombre_empresa = $row['nombre_empresa'] ?? '—';
                        $direccion = $row['direccion'] ?? '';
                        $ruc = $row['ruc'] ?? '—';
                        $telefono = $row['telefono'] ?? $row['telefono_empresa'] ?? '';

                        $supervisor = $row['supervisor'] ?? '—';
                        $email_supervisor = $row['email_supervisor'] ?? '';

                        $estado = strtolower($row['estado'] ?? 'pendiente');
                        $paso_actual = $row['paso_actual'] ?? '1';
                        $fecha_inicio = $row['fecha_inicio'] ?? null;
                        $duracion_meses = $row['duracion_meses'] ?? null;
                        $observaciones = $row['observaciones'] ?? '';
                    ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td>
                            <strong><?php echo htmlspecialchars($codigo_estudiante); ?></strong><br>
                            <?php echo htmlspecialchars(trim($nombre_estudiante . ' ' . $apellido_estudiante)); ?><br>
                            <span class="small"><?php echo htmlspecialchars($carrera); ?></span>
                        </td>
                        <td>
                            <?php echo htmlspecialchars($nombre_empresa); ?><br>
                            <span class="small"><?php echo htmlspecialchars($direccion); ?></span>
                        </td>
                        <td>
                            <?php echo htmlspecialchars($ruc); ?><br>
                            <span class="small"><?php echo htmlspecialchars($telefono); ?></span>
                        </td>
                        <td>
                            <?php echo htmlspecialchars($supervisor); ?><br>
                            <span class="small"><?php echo htmlspecialchars($email_supervisor); ?></span>
                        </td>
                        <td>
                            <?php
                                switch ($estado) {
                                    case 'en proceso':
                                    case 'en_proceso':
                                        $badgeClass = 'badge-proceso';
                                        $estadoText = 'En Proceso';
                                        break;
                                    case 'completado':
                                        $badgeClass = 'badge-exito';
                                        $estadoText = 'Completado';
                                        break;
                                    case 'rechazado':
                                        $badgeClass = 'badge-rechazada';
                                        $estadoText = 'Rechazado';
                                        break;
                                    default:
                                        $badgeClass = 'badge-pendiente';
                                        $estadoText = 'Pendiente';
                                        break;
                                }
                                echo "<span class='badge $badgeClass'>" . htmlspecialchars($estadoText) . "</span>";
                            ?>
                            <div class="small">Paso <?php echo htmlspecialchars($paso_actual); ?></div>
                        </td>
                        <td>
                            <?php echo !empty($fecha_inicio) ? date('d/m/Y', strtotime($fecha_inicio)) : '—'; ?><br>
                            <span class="small"><?php echo !empty($duracion_meses) ? ($duracion_meses . ' mes(es)') : '—'; ?></span>
                        </td>
                        <td><?php echo nl2br(htmlspecialchars($observaciones)); ?></td>
                        
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>
</body>
</html>
