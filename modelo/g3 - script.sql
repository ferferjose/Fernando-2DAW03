CREATE TABLE editorIales (
    idEditorial TINYINT AUTO_INCREMENT,
    nombreEditorial VARCHAR(50),
    CONSTRAINT pk_editoriales PRIMARY KEY (idEditorial),
    CONSTRAINT unq_editoriales UNIQUE (nombreEditorial)
);

CREATE TABLE libros (
    idLibro TINYINT NOT NULL AUTO_INCREMENT,
    isbn CHAR(13),
    titulo VARCHAR(75),
    precio DECIMAL(5, 2),
    idEditorial TINYINT,
    CONSTRAINT pk_libros PRIMARY KEY (idLibro),
    CONSTRAINT unq_libros UNIQUE (titulo),
    CONSTRAINT fk_editoriales_libros FOREIGN KEY (idEditorial) REFERENCES editorales(idEditorial)
);

CREATE TABLE cursos (
    codCurso CHAR(4) NOT NULL,
    nombreCurso VARCHAR(75) NOT NULL,
    CONSTRAINT pk_cursos PRIMARY KEY (codCurso)
);

CREATE TABLE clases (
    codCurso CHAR(4) NOT NULL,
    letraClase CHAR(1) NOT NULL,
    CONSTRAINT pk_idClase PRIMARY KEY (codCurso, letraClase),
    CONSTRAINT fk_codCurso_clases FOREIGN KEY (codCurso) REFERENCES cursos(codCurso)
);

CREATE TABLE tutores (
    idTutor TINYINT NOT NULL AUTO_INCREMENT,
    nombreTutor VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NOT NULL,
    codCurso CHAR(4) NOT NULL,
    letraClase CHAR(1) NOT NULL,
    CONSTRAINT pk_tutores PRIMARY KEY (idTutor),
    CONSTRAINT fk_clase_tutores FOREIGN KEY (codCurso, letraClase) REFERENCES clases(codCurso, letraClase),
    CONSTRAINT unq_correo UNIQUE (correo)
);

CREATE TABLE cursosLibros (
    codCurso CHAR(4) NOT NULL,
    idLibro TINYINT NOT NULL,
    CONSTRAINT pk_cursosLibros PRIMARY KEY (codCurso, idLibro),
    CONSTRAINT fk_codCurso_cursosLibros FOREIGN KEY (codCurso) REFERENCES cursos(codCurso),
    CONSTRAINT fk_idLibro_cursosLibros FOREIGN KEY (idLibro) REFERENCES libros(idLibro)
);

CREATE TABLE administracion (
    idAdmin TINYINT NOT NULL AUTO_INCREMENT,
    usuario VARCHAR(25) NOT NULL,
    contrasenia VARCHAR(25) NOT NULL,
    CONSTRAINT pk_administracion PRIMARY KEY (idAdmin),
    CONSTRAINT unq_usuario_administracion UNIQUE (usuario),
    CONSTRAINT constrasenia_administracion CHECK (LENGTH(contrasenia) >= 8)
);

CREATE TABLE usuarios (
    idUsuario INT AUTO_INCREMENT,
    nombre VARCHAR(50) NULL,
    dni CHAR(9) NULL,
    correo VARCHAR(150) NOT NULL,
    contrasenia VARCHAR(25) NULL,
    CONSTRAINT pk_usuarios PRIMARY KEY (idUsuario),
    CONSTRAINT unq_correo_usuarios UNIQUE (correo),
    CONSTRAINT contrasenia_usuarios CHECK (LENGTH(contrasenia) >= 8),
    CONSTRAINT unq_dni UNIQUE (dni)
);

CREATE TABLE reservas (
    idReserva SMALLINT NOT NULL AUTO_INCREMENT,
    nombreAlumno varchar(100) NOT NULL,
    fechaReserva DATE NOT NULL,
    fechaEntrega DATE NULL,
    justificantePago char(10),
    tipoUsuario CHAR(3) NOT NULL,
    dni CHAR(9) NOT NULL,
    idUsuario INT NULL,
    idAdmin TINYINT NULL,
    codCurso char(4),
    CONSTRAINT pk_reservas PRIMARY KEY (idReserva),
    CONSTRAINT fk_administracion_reservas FOREIGN KEY (idAdmin) REFERENCES administracion(idAdmin),
    CONSTRAINT fk_cursos_reservas FOREIGN KEY (codCurso) REFERENCES cursos(codCurso),
    CONSTRAINT chk_tipoUsuario CHECK (tipoUsuario IN ('usr', 'adm'))

);

CREATE TABLE reservas_libros (
    idReserva SMALLINT NOT NULL,
    idLibro TINYINT NOT NULL,
    estado CHAR(1) DEFAULT 'N',
    CONSTRAINT pk_reservasLibros PRIMARY KEY (idReserva, idLibro),
    CONSTRAINT fk_idReserva_reservasLibros FOREIGN KEY (idReserva) REFERENCES reservas(idReserva),
    CONSTRAINT fk_idLibro_reservasLibros FOREIGN KEY (idLibro) REFERENCES libros(idLibro),
    CONSTRAINT chk_estado CHECK (estado IN ('N', 'P', 'R', 'E'))
);
