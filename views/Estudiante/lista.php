<?php
// views/estudiante/lista.php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Estudiantes</title>
    <link rel="stylesheet" href="views/style.css">
</head>
<body>
    <div class="container">
        <!-- Barra de navegación -->
        <div class="nav">
            <a href="index.php">← Inicio</a>
            <a href="index.php?action=registro_estudiante">👤 Nuevo Estudiante</a>
        </div>

        <!-- Encabezado -->
        <div class="header">
            <div class="logo">🎓</div>
            <h1>Lista de Estudiantes Registrados</h1>
            <p>Estudiantes registrados en el sistema de prácticas pre profesionales</p>
        </div>

        <!-- Alertas -->
        <?php if(isset($_GET['success'])): ?>
            <div class="alert alert-success">
                ✅ Estudiante registrado exitosamente.
            </div>
        <?php endif; ?>

        <?php if(isset($_GET['deleted'])): ?>
            <div class="alert alert-info">
                🗑️ Estudiante eliminado correctamente.
            </div>
        <?php endif; ?>

        <!-- Cuadro informativo -->
        <div class="info-box">
            <h3>ℹ️ Información</h3>
            <p>Solo los estudiantes con <strong>150 créditos o más</strong> pueden solicitar prácticas pre profesionales.</p>
        </div>

        <!-- Tabla de estudiantes -->
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nombre Completo</th>
                        <th>Carrera</th>
                        <th>Créditos Aprobados</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($stmt->rowCount() > 0): ?>
                        <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                            <?php 
                                $creditos = (int)$row['creditos_aprobados'];
                                $estadoBadge = $creditos >= 150 ? '✅ Puede solicitar' : '⚠️ Faltan créditos';
                                $badgeClass = $creditos >= 150 ? 'badge-success' : 'badge-warning';
                            ?>
                            <tr>
                                <td><strong><?php echo htmlspecialchars($row['codigo']); ?></strong></td>
                                <td><?php echo htmlspecialchars($row['nombre'] . ' ' . $row['apellido']); ?></td>
                                <td><?php echo htmlspecialchars($row['carrera']); ?></td>
                                <td><span class="badge <?php echo $badgeClass; ?>"><?php echo $creditos; ?> créditos</span></td>
                                <td><?php echo htmlspecialchars($row['email']); ?></td>
                                <td><?php echo htmlspecialchars($row['telefono']); ?></td>
                                <td><span class="badge <?php echo $badgeClass; ?>"><?php echo $estadoBadge; ?></span></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="no-data">No hay estudiantes registrados.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Pie de página -->
        <div class="footer">
            <p>© 2025 Sistema de Prácticas Pre Profesionales | Universidad Nacional del Callao</p>
        </div>
    </div>
</body>
</html>
