-- crear la base de datos
CREATE DATABASE gestion_proyectos;
USE gestion_proyectos;

-- tabla de usuarios (para el login)
CREATE TABLE usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(20) NOT NULL UNIQUE,
    passwd VARCHAR(300) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50)NOT NULL,
    rol VARCHAR (50) DEFAULT 'Empleado',
    fecha_registro  TIMESTAMP DEFusuariosAULT CURRENT_TIMESTAMP,
    ultimo_login DATETIME DEFAULT '2000-01-01 20:45:00',
    activo TINYINT(1) DEFAULT 1
    
);

-- Tabla de clientes
CREATE TABLE clientes (
    id_cliente INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefono VARCHAR(20),
    direccion VARCHAR (100),
    ruc VARCHAR(20),
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    estado VARCHAR (20)
);

-- Tabla de proyectos
CREATE TABLE proyectos (
    id_proyecto INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT NOT NULL,
    id_responsable INT NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    fecha_inicio DATE NOT NULL,
    fecha_fin DATE,
    presupuesto DECIMAL(12,2) ,
    estado VARCHAR (50) DEFAULT 'Pendiente',
    FOREIGN KEY (id_cliente) REFERENCES clientes(id_cliente),
    FOREIGN KEY (id_responsable) REFERENCES usuarios(id_usuario)
);

-- Tabla de tareas 
CREATE TABLE tareas (
    id_tarea INT AUTO_INCREMENT PRIMARY KEY,
    id_proyecto INT NOT NULL,
    id_usuario INT NOT NULL,
    nombre_tarea VARCHAR(100) NOT NULL,
    descripcion TEXT,
    fecha_inicio DATE,
    fecha_fin DATE,
    prioridad VARCHAR (20) DEFAULT 'Medio',
    estado VARCHAR (20) DEFAULT 'Pendiente',
    FOREIGN KEY (id_proyecto) REFERENCES proyectos(id_proyecto),
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario)
);
INSERT INTO usuarios (username, passwd, email, nombre, apellido, rol, ultimo_login, activo) 
VALUES 
('admin', '$2y$10$CjWWXLZegZNlZidzvgGVne5yLWyHsmo6qyU/32a5R2sGciSpbJt1K', 'admin@example.com', 'Juan', 'Pérez', 'Administrador', '2025-05-28 10:30:00', 1),
('ana2025', '$2y$10$HdVFj3o2Sj7K7jNin2sCL.RAcpS.yNmAEuaavxqqVRStmrTYaIR3K', 'ana@example.com', 'Ana', 'Gómez', 'Empleado', '2025-05-27 15:20:00', 1),
('yhonam', '$2y$10$UoVx69WKEjjks0wMOuWK5eLT6K4OGU0yHQvtqo6O/p9zipjOpXEwq', 'carlos@example.com', 'Carlos', 'Ramírez', 'Empleado', '2000-01-01 20:45:00', 0);
INSERT INTO clientes (nombre, email, telefono, direccion, ruc, estado) 
VALUES 
('Empresa XYZ', 'contacto@xyz.com', '123456789', 'Av. Principal 123', '20123456789', 'Activo'),
('Inversiones ABC', 'info@abc.com', '987654321', 'Calle Secundaria 456', '10987654321', 'Pendiente'),
('Consultora DEF', 'consultora@def.com', '555666777', 'Boulevard Empresarial 789', '30876543210', 'Inactivo');
INSERT INTO proyectos (id_cliente, id_responsable, nombre, descripcion, fecha_inicio, fecha_fin, presupuesto, estado) 
VALUES 
(1, 1, 'Desarrollo de software', 'Creación de una aplicación web para gestión empresarial', '2025-06-01', '2025-12-01', 50000.00, 'Activo'),
(2, 2, 'Implementación ERP', 'Integración de un sistema ERP para la gestión contable', '2025-07-15', '2026-02-15', 75000.00, 'Pendiente'),
(3, 3, 'Marketing digital', 'Estrategia de publicidad en redes sociales y SEO', '2025-08-01', '2025-11-30', 30000.00, 'Finalizado');
INSERT INTO tareas (id_proyecto, id_usuario, nombre_tarea, descripcion, fecha_inicio, fecha_fin, prioridad, estado) 
VALUES 
(1, 1, 'Análisis de requisitos', 'Definir requisitos funcionales y técnicos', '2025-06-05', '2025-06-20', 'Alto', 'En progreso'),
(2, 2, 'Configuración del sistema', 'Instalación y parametrización de módulos ERP', '2025-07-20', '2025-08-15', 'Medio', 'Pendiente'),
(3, 3, 'Campaña publicitaria', 'Lanzamiento de anuncios y estrategias de tráfico', '2025-08-10', '2025-09-30', 'Bajo', 'Planificado');

SELECT * FROM clientes;
SELECT * FROM proyectos;
SELECT * FROM usuarios;
SELECT * FROM tareas;