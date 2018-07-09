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