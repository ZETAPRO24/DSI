-- ============================================
-- VERSIÓN 1: MYSQL / MARIADB
-- ============================================

CREATE DATABASE IF NOT EXISTS practicas_preprofesionales;
USE practicas_preprofesionales;

CREATE TABLE estudiantes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    codigo VARCHAR(20) UNIQUE NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    email VARCHAR(100),
    carrera VARCHAR(100),
    creditos_aprobados INT DEFAULT 0,
    telefono VARCHAR(20),
    fecha_registro DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE solicitudes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_estudiante INT NOT NULL,
    fecha_solicitud DATETIME DEFAULT CURRENT_TIMESTAMP,
    estado ENUM('Pendiente', 'En Proceso', 'Completado', 'Rechazado') DEFAULT 'Pendiente',
    paso_actual INT DEFAULT 1,
    observaciones TEXT,
    fecha_actualizacion DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_estudiante) REFERENCES estudiantes(id)
);

CREATE TABLE empresas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_solicitud INT NOT NULL,
    nombre_empresa VARCHAR(255) NOT NULL,
    ruc VARCHAR(11) NOT NULL,
    direccion TEXT,
    telefono VARCHAR(20),
    supervisor VARCHAR(100),
    email_supervisor VARCHAR(100),
    fecha_inicio DATE,
    duracion_meses INT,
    FOREIGN KEY (id_solicitud) REFERENCES solicitudes(id) ON DELETE CASCADE
);

CREATE TABLE documentos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_solicitud INT NOT NULL,
    numero_paso INT NOT NULL,
    nombre_documento VARCHAR(255) NOT NULL,
    nombre_archivo VARCHAR(255) NOT NULL,
    ruta_archivo VARCHAR(500) NOT NULL,
    fecha_subida DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_solicitud) REFERENCES solicitudes(id) ON DELETE CASCADE
);

INSERT INTO estudiantes (codigo, nombre, apellido, email, carrera, creditos_aprobados, telefono) VALUES
('2020123456', 'Juan', 'Pérez García', 'juan.perez@ejemplo.edu.pe', 'Ingeniería de Sistemas', 180, '987654321'),
('2021654321', 'María', 'López Torres', 'maria.lopez@ejemplo.edu.pe', 'Administración', 165, '987123456'),
('2019987654', 'Carlos', 'Ramírez Silva', 'carlos.ramirez@ejemplo.edu.pe', 'Contabilidad', 150, '998765432');

INSERT INTO solicitudes (id_estudiante, estado, paso_actual, observaciones) VALUES
(1, 'En Proceso', 3, 'Esperando firma de convenio'),
(2, 'En Proceso', 5, 'Supervisión programada'),
(3, 'Pendiente', 1, 'Solicitud recién enviada');

INSERT INTO empresas (id_solicitud, nombre_empresa, ruc, direccion, telefono, supervisor, email_supervisor, fecha_inicio, duracion_meses) VALUES
(1, 'Tech Solutions SAC', '20123456789', 'Av. Principal 123, Lima', '014567890', 'Carlos Rodríguez', 'carlos@techsolutions.com', '2025-03-01', 6),
(2, 'Comercial del Perú SA', '20987654321', 'Jr. Los Negocios 456, Lima', '015678901', 'Patricia Vega', 'pvega@comercialperu.com', '2025-02-15', 5);

INSERT INTO documentos (id_solicitud, numero_paso, nombre_documento, nombre_archivo, ruta_archivo) VALUES
(1, 1, 'Solicitud', 'solicitud_juan.pdf', '/uploads/solicitudes/solicitud_juan.pdf'),
(1, 2, 'Carta presentación', 'carta_juan.pdf', '/uploads/cartas/carta_juan.pdf'),
(2, 1, 'Solicitud', 'solicitud_maria.pdf', '/uploads/solicitudes/solicitud_maria.pdf');

