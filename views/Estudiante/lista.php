
<?php
// views/estudiante/lista.php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Estudiantes</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f5f5f5; padding: 20px; }
        .container { max-width: 1200px; margin: 0 auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h1 { color: #333; margin-bottom: 30px; text-align: center; }
        .nav { margin-bottom: 20px; }
        .nav a { color: #4CAF50; text-decoration: none; margin-right: 15px; padding: 10px 15px; background: #f0f0f0; border-radius: 5px; display: inline-block; }
        .nav a:hover { background: #4CAF50; color: white; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background: #4CAF50; color: white; font-weight: bold; }
        tr:hover { background: #f5f5f5; }
        .badge { padding: 5px 10px; border-radius: 20px; font-size: 12px; font-weight: bold; }
        .badge-success { background: #d4edda; color: #155724; }
        .badge-warning { background: #fff3cd; color: #856404; }
        .alert-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; padding: 15px; border-radius: 5px; margin-bottom: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="nav">
            <a href="index.php">← Inicio</a>
            <a href="index.php?action=registro_estudiante">+ Nuevo Estudiante</a>
            <a href="index.php?action=nueva_solicitud">Nueva Solicitud</a>
        </div>

        <h1>📋 Lista de Estudiantes Registrados</h1>

        <?php if(isset($_GET['success'])): ?>
            <div class="alert-success">✅ Estudiante registrado exitosamente</div>
        <?php endif; ?>

        <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre Completo</th>
                    <th>Carrera</th>
                    <th>Créditos</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><strong><?php echo htmlspecialchars($row['codigo']); ?></strong></td>
                    <td><?php echo htmlspecialchars($row['nombre'] . ' ' . $row['apellido']); ?></td>
                    <td><?php echo htmlspecialchars($row['carrera']); ?></td>
                    <td>
                        <?php 
                        $creditos = $row['creditos_aprobados'];
                        $class = $creditos >= 150 ? 'badge-success' : 'badge-warning';
                        echo '<span class="badge ' . $class . '">' . $creditos . ' créditos</span>';
                        ?>
                    </td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['telefono']); ?></td>
                    <td>
                        <?php if($creditos >= 150): ?>
                            <span class="badge badge-success">✅ Puede solicitar</span>
                        <?php else: ?>
                            <span class="badge badge-warning">⚠️ Faltan créditos</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php