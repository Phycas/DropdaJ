CREATE TABLE usuarios(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(140),
    usuario VARCHAR(140),
    clave VARCHAR(140) not null,
    mail VARCHAR(140),
    PRIMARY KEY (id)
    );

CREATE TABLE archivos(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(140),
    tipo VARCHAR(140),
    data longblob not null,
    usuario_id INT UNSIGNED,
    carpeta_id INT UNSIGNED,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    FOREIGN KEY (carpeta_id) REFERENCES carpetas(id),
    PRIMARY KEY (id)
    );
    
CREATE TABLE carpetas(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(140),
    usuario_id INT UNSIGNED,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    PRIMARY KEY (id)
    );

CREATE TABLE compartidos(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(140),
    dueno_id INT UNSIGNED,
    destinatario_id INT UNSIGNED,
    FOREIGN KEY (dueno_id) REFERENCES usuarios(id),
    FOREIGN KEY (destinatario_id) REFERENCES usuarios(id),
    PRIMARY KEY (id)
    );

DELIMITER //

CREATE FUNCTION usuarioLogin(user VARCHAR(140), pass VARCHAR(140)) RETURNS INT UNSIGNED 
BEGIN   
    DECLARE esValido INT UNSIGNED;
    DECLARE userId INT UNSIGNED;

    
    SELECT usuarios.id INTO userId
    FROM usuarios
    WHERE usuarios.usuario = user AND usuarios.clave = clave;
    
    IF userId != 0 THEN SET esValido = 1;
    ELSE SET esValido = 0;
    END IF;
    
    RETURN esValido;
    
END; //

DELIMITER ;