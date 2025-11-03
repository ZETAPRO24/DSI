CREATE DATABASE IF NOT EXISTS practicas_preprofesionales;
USE practicas_preprofesionales;

-- ============================================
-- TABLA ESTUDIANTES
-- ============================================
CREATE TABLE estudiantes (
    codigo VARCHAR(20) PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE,
    carrera VARCHAR(100),
    creditos_aprobados INT DEFAULT 0,
    telefono VARCHAR(20),
    fecha_registro DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- ============================================
-- TABLA SOLICITUDES (con código automático)
-- ============================================
CREATE TABLE solicitudes (
    id_solicitud VARCHAR(10) PRIMARY KEY,
    id_estudiante VARCHAR(20) NOT NULL,
    fecha_solicitud DATETIME DEFAULT CURRENT_TIMESTAMP,
    estado ENUM('Pendiente', 'En Proceso', 'Completado', 'Rechazado') DEFAULT 'Pendiente',
    paso_actual INT DEFAULT 1,
    observaciones TEXT,
    fecha_actualizacion DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_estudiante) REFERENCES estudiantes(codigo)
        ON UPDATE CASCADE ON DELETE CASCADE
);

-- ============================================
-- TABLA EMPRESAS (con código automático)
-- ============================================
CREATE TABLE empresas (
    id_empresa VARCHAR(10) PRIMARY KEY,
    id_solicitud VARCHAR(10) NOT NULL,
    nombre_empresa VARCHAR(255) NOT NULL,
    ruc VARCHAR(11) UNIQUE NOT NULL,
    direccion TEXT,
    telefono VARCHAR(20),
    supervisor VARCHAR(100),
    email_supervisor VARCHAR(100),
    fecha_inicio DATE,
    duracion_meses INT,
    FOREIGN KEY (id_solicitud) REFERENCES solicitudes(id_solicitud)
        ON UPDATE CASCADE ON DELETE CASCADE
);

-- ============================================
-- TABLA DOCUMENTOS (con código automático)
-- ============================================
CREATE TABLE documentos (
    id_documento VARCHAR(10) PRIMARY KEY,
    id_solicitud VARCHAR(10) NOT NULL,
    numero_paso INT NOT NULL,
    nombre_documento VARCHAR(255) NOT NULL,
    nombre_archivo VARCHAR(255) NOT NULL,
    ruta_archivo VARCHAR(500) NOT NULL,
    fecha_subida DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_solicitud) REFERENCES solicitudes(id_solicitud)
        ON UPDATE CASCADE ON DELETE CASCADE
);

-- ============================================
-- TRIGGERS PARA GENERAR CÓDIGOS AUTOMÁTICOS
-- ============================================

-- 🔹 Código automático para solicitudes
DELIMITER //
CREATE TRIGGER trg_solicitudes_before_insert
BEFORE INSERT ON solicitudes
FOR EACH ROW
BEGIN
  DECLARE next_id INT;
  DECLARE new_code VARCHAR(10);
  SELECT IFNULL(MAX(CAST(SUBSTRING(id_solicitud, 4) AS UNSIGNED)), 0) + 1 INTO next_id FROM solicitudes;
  SET new_code = CONCAT('SOL', LPAD(next_id, 4, '0'));
  SET NEW.id_solicitud = new_code;
END;
//
DELIMITER ;

-- 🔹 Código automático para empresas
DELIMITER //
CREATE TRIGGER trg_empresas_before_insert
BEFORE INSERT ON empresas
FOR EACH ROW
BEGIN
  DECLARE next_id INT;
  DECLARE new_code VARCHAR(10);
  SELECT IFNULL(MAX(CAST(SUBSTRING(id_empresa, 4) AS UNSIGNED)), 0) + 1 INTO next_id FROM empresas;
  SET new_code = CONCAT('EMP', LPAD(next_id, 4, '0'));
  SET NEW.id_empresa = new_code;
END;
//
DELIMITER ;

-- 🔹 Código automático para documentos
DELIMITER //
CREATE TRIGGER trg_documentos_before_insert
BEFORE INSERT ON documentos
FOR EACH ROW
BEGIN
  DECLARE next_id INT;
  DECLARE new_code VARCHAR(10);
  SELECT IFNULL(MAX(CAST(SUBSTRING(id_documento, 4) AS UNSIGNED)), 0) + 1 INTO next_id FROM documentos;
  SET new_code = CONCAT('DOC', LPAD(next_id, 4, '0'));
  SET NEW.id_documento = new_code;
END;
//
DELIMITER ;

-- ============================================
-- DATOS DE EJEMPLO
-- ============================================
INSERT INTO estudiantes (codigo, nombre, apellido, email, carrera, creditos_aprobados, telefono) VALUES
('2020123456', 'Juan', 'Pérez García', 'juan.perez@ejemplo.edu.pe', 'Ingeniería de Sistemas', 180, '987654321'),
('2021654321', 'María', 'López Torres', 'maria.lopez@ejemplo.edu.pe', 'Administración', 165, '987123456');

-- Los ID de solicitudes, empresas y documentos se generan automáticamente
INSERT INTO solicitudes (id_estudiante, estado, paso_actual, observaciones) VALUES
('2020123456', 'En Proceso', 3, 'Esperando firma de convenio'),
('2021654321', 'En Proceso', 5, 'Supervisión programada');


-- ============================================
-- DATOS DE EJEMPLO
-- ============================================
INSERT INTO estudiantes (codigo, nombre, apellido, email, carrera, creditos_aprobados, telefono) VALUES
('2020123456', 'Juan', 'Pérez García', 'juan.perez@ejemplo.edu.pe', 'Ingeniería de Sistemas', 180, '987654321'),
('2021654321', 'María', 'López Torres', 'maria.lopez@ejemplo.edu.pe', 'Administración', 165, '987123456'),
('2019987654', 'Carlos', 'Ramírez Silva', 'carlos.ramirez@ejemplo.edu.pe', 'Contabilidad', 150, '998765432');

INSERT INTO solicitudes (id_estudiante, estado, paso_actual, observaciones) VALUES
('2020123456', 'En Proceso', 3, 'Esperando firma de convenio'),
('2021654321', 'En Proceso', 5, 'Supervisión programada'),
('2019987654', 'Pendiente', 1, 'Solicitud recién enviada');

INSERT INTO empresas (id_solicitud, nombre_empresa, ruc, direccion, telefono, supervisor, email_supervisor, fecha_inicio, duracion_meses) VALUES
(1, 'Tech Solutions SAC', '20123456789', 'Av. Principal 123, Lima', '014567890', 'Carlos Rodríguez', 'carlos@techsolutions.com', '2025-03-01', 6),
(2, 'Comercial del Perú SA', '20987654321', 'Jr. Los Negocios 456, Lima', '015678901', 'Patricia Vega', 'pvega@comercialperu.com', '2025-02-15', 5);

INSERT INTO documentos (id_solicitud, numero_paso, nombre_documento, nombre_archivo, ruta_archivo) VALUES
(1, 1, 'Solicitud', 'solicitud_juan.pdf', '/uploads/solicitudes/solicitud_juan.pdf'),
(1, 2, 'Carta presentación', 'carta_juan.pdf', '/uploads/cartas/carta_juan.pdf'),
(2, 1, 'Solicitud', 'solicitud_maria.pdf', '/uploads/solicitudes/solicitud_maria.pdf');
