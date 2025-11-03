<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - Prácticas Pre Profesionales</title>
  <link rel="stylesheet" href="views/dashboard.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/37ef4fca07.js" crossorigin="anonymous"></script>
</head>
<body>

  <!-- SIDEBAR -->
  <aside class="sidebar">
    <div class="logo">
      <img src="img/logo-unac.png" alt="UNAC">
      <h2>UNAC</h2>
    </div>
    <nav class="menu">
      <a href="#" class="active"><i class="fas fa-home"></i>Inicio</a>
      <a href="index.php?action=lista_estudiantes"><i class="fas fa-user-graduate"></i>Estudiantes</a>
      <a href="index.php?action=lista_solicitudes"><i class="fas fa-file-alt"></i>Solicitudes</a>
      <a href="#"><i class="fas fa-check-circle"></i>Requisitos</a>
      <a href="#"><i class="fas fa-chart-bar"></i>Reportes</a>
      <a href="#"><i class="fas fa-sign-out-alt"></i>Salir</a>
    </nav>
  </aside>

  <!-- CONTENIDO PRINCIPAL -->
  <main class="main-content">
    <header class="topbar">
      <h1>Panel Principal</h1>
      <div class="user-info">
        <span>👤 Zecarlos Calero</span>
      </div>
    </header>

    <section class="dashboard">
      <div class="card">
        <i class="fas fa-user-graduate"></i>
        <h3>Estudiantes</h3>
        <p>Gestiona los datos de los estudiantes.</p>
        <a href="index.php?action=lista_estudiantes" class="btn">Ver</a>
      </div>

      <div class="card">
        <i class="fas fa-file-alt"></i>
        <h3>Solicitudes</h3>
        <p>Revisa el estado de las solicitudes de prácticas.</p>
        <a href="index.php?action=lista_solicitudes" class="btn">Ver</a>
      </div>

      <div class="card">
        <i class="fas fa-check-circle"></i>
        <h3>Requisitos</h3>
        <p>Consulta los criterios y documentos necesarios.</p>
        <a href="#" class="btn">Ver</a>
      </div>

      <div class="card">
        <i class="fas fa-chart-bar"></i>
        <h3>Reportes</h3>
        <p>Visualiza estadísticas y reportes de avance.</p>
        <a href="#" class="btn">Ver</a>
      </div>
    </section>
  </main>

</body>
</html>
