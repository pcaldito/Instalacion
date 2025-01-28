CREATE TABLE IF NOT EXISTS UsuariosPermisos (
    idAdmin SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
    nombreAdmin CHAR(20) NOT NULL,
    contrasenia CHAR(8) NOT NULL,
    tipo CHAR(5) NOT NULL DEFAULT 'SECRE', -- SECRE  ADMIN
    CONSTRAINT PK_UsuariosPermisos PRIMARY KEY (idAdmin)
);

CREATE TABLE IF NOT EXISTS Usuarios (
    idUsuario SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
    nombre varchar(60) NOT NULL,
    correo varchar(255) NOT NULL,
    pw char(9) NOT NULL,
    rol char(1) NOT NULL,
    CONSTRAINT PK_Usuarios PRIMARY KEY (idUsuario)
);

INSERT INTO Usuarios (nombre, correo, pw, rol) VALUES ('instalacion', 'instalacion@gmail.com', '1234', 'I');
GRANT ALL PRIVILEGES ON *.* TO 'instalacion'@'localhost' IDENTIFIED BY '1234' WITH GRANT OPTION;



 