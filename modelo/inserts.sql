-- Insert en editorales
INSERT INTO editorales (nombreEditorial) VALUES ('Editorial Alpha');

-- Insert en libros
INSERT INTO libros (isbn, titulo, precio, idEditorial) 
VALUES ('9781234567890', 'Introducción a MySQL', 29.99, 1);

-- Insert en cursos
INSERT INTO cursos (codCurso, nombreCurso) 
VALUES ('CS01', 'Curso de Base de Datos');

-- Insert en clases
INSERT INTO clases (codCurso, letraClase) 
VALUES ('CS01', 'A');

-- Insert en tutores
INSERT INTO tutores (nombreTutor, correo, codCurso, letraClase) 
VALUES ('Juan Pérez', 'juan.perez@example.com', 'CS01', 'A');

-- Insert en cursosLibros
INSERT INTO cursosLibros (codCurso, idLibro) 
VALUES ('CS01', 1);

-- Insert en administracion
INSERT INTO administracion (usuario, contrasenia) 
VALUES ('admin01', 'password123');

-- Insert en usuarios
INSERT INTO usuarios (nombre, dni, correo, contrasenia) 
VALUES ('Ana Gómez', '12345678A', 'ana.gomez@example.com', 'password456');

-- Insert en reservas
INSERT INTO reservas (idReserva, nombreAlumno, fechaReserva, fechaEntrega, justificantePago, tipoUsuario, dni, idUsuario, codCurso) 
VALUES (1, 'Ana Gómez', '2024-11-01', '2024-11-15', '/docs/pago1.pdf', 'usr', '12345678A', 1, 'CS01');

-- Insert en reservas_libros
INSERT INTO reservas_libros (idReserva, idLibro, estado) 
VALUES (1, 1, 'N');
