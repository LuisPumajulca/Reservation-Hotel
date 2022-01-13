CREATE DATABASE reservaHoteles
USE reservaHoteles

CREATE TABLE usuario(
codusuario INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
nombre VARCHAR(100) NOT NULL,
apellidos VARCHAR(100) NOT NULL,
correo VARCHAR(100) NOT NULL,
contrasena VARCHAR(255) NOT NULL,
estado VARCHAR(20) NOT NULL,
tipo_usuario VARCHAR(30) NOT NULL
)

CREATE TABLE habitaciones(
codhabitaciones INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
tipo_habitacion VARCHAR(50) NOT NULL,
precio DECIMAL NOT NULL
)

CREATE TABLE reservacion(
codreservacion INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
habitacion INT NOT NULL,
usuario INT NOT NULL,
periodo_estadia INT NOT NULL,
numero_personas INT NOT NULL,
numero_habitaciones INT NOT NULL,
numero_niños INT NOT NULL,
fecha DATE NOT NULL,
hora TIME NOT NULL,
nombre_banco VARCHAR(50) NOT NULL,
numero_tarjeta VARCHAR(100) NOT NULL,
fecha_vencimiento_tarjeta VARCHAR(20) NOT NULL,
cvv VARCHAR(20) NOT NULL,
total DECIMAL NOT NULL,
CONSTRAINT fk_habitaciones FOREIGN KEY (habitacion) REFERENCES habitaciones(codhabitaciones),
CONSTRAINT fk_usuario FOREIGN KEY (usuario) REFERENCES usuario(codusuario)
)



INSERT INTO habitaciones VALUES(NULL,NOW(), 600);

INSERT INTO habitaciones VALUES(NULL,"Simple Estandar", 400);

INSERT INTO habitaciones VALUES(NULL,"Doble Deluxe", 700);

INSERT INTO habitaciones VALUES(NULL,"Doble Estandar", 600);

INSERT INTO habitaciones VALUES(NULL,"Familia Deluxe", 800);

INSERT INTO habitaciones VALUES(NULL,"Familia Estandar", 600);

INSERT INTO habitaciones VALUES(NULL,"Luna de miel Suite", 900);

INSERT INTO habitaciones VALUES(NULL,"Simple Deluxe Suite", 1100);


DELIMITER $$
CREATE
    PROCEDURE `reservahoteles`.`registroUsuario`(IN nombre VARCHAR(100),
					         IN apellidos VARCHAR(100),
					         IN correo VARCHAR(100),
					         IN contrasena VARCHAR(255),
					         IN estado VARCHAR(20),
					         IN tipo_usuario VARCHAR(30))
	BEGIN
	INSERT INTO usuario VALUES(NULL, nombre, apellidos, correo, contrasena, estado, tipo_usuario);
	END$$
DELIMITER ;

DELIMITER $$
CREATE
    PROCEDURE `reservahoteles`.`verificarCorreo`(IN correos VARCHAR(100))
	BEGIN
	SELECT * FROM usuario WHERE correo = correos;
	END$$
DELIMITER ;

DELIMITER $$
CREATE
    PROCEDURE `reservahoteles`.`Login`(IN correos VARCHAR(100))
	BEGIN
	SELECT * FROM usuario WHERE correo = correos;
	END$$
DELIMITER ;

DELIMITER $$
CREATE
    PROCEDURE `reservahoteles`.`ActualizarLogin`(IN nombreA VARCHAR(100),
					         IN apellidosA VARCHAR(100),
					         IN correosA VARCHAR(100),
					         IN codigoA INT)
	BEGIN
	UPDATE usuario SET nombre = nombreA, apellidos = apellidosA, correo = correosA WHERE codusuario = codigoA;
	END$$
DELIMITER ;

DELIMITER $$
CREATE
    PROCEDURE `reservahoteles`.`MostrarReservaPorCodigo`(IN codigo INT)
	BEGIN
	SELECT h.tipo_habitacion AS tipo_habitacion, CONCAT(u.nombre,' ',u.apellidos) AS Usuario,
        r.periodo_estadia, r.numero_personas, r.numero_habitaciones, r.numero_niños, r.fecha, r.hora,
        r.nombre_banco, r.numero_tarjeta, r.fecha_vencimiento_tarjeta, r.cvv, r.total, r.codreservacion
        FROM reservacion r 
        INNER JOIN usuario u 
        ON r.usuario = u.codusuario
        INNER JOIN habitaciones h
        ON r.habitacion = h.codhabitaciones
        WHERE r.usuario = codigo;
	END$$
DELIMITER ;


DELIMITER $$
CREATE
    PROCEDURE `reservahoteles`.`MostrarReserva`()
	BEGIN
	SELECT h.tipo_habitacion AS tipo_habitacion, CONCAT(u.nombre,' ',u.apellidos) AS Usuario,
        r.periodo_estadia, r.numero_personas, r.numero_habitaciones, r.numero_niños, r.fecha, r.hora,
        r.nombre_banco, r.numero_tarjeta, r.fecha_vencimiento_tarjeta, r.cvv, r.total, r.codreservacion
        FROM reservacion r 
        INNER JOIN usuario u 
        ON r.usuario = u.codusuario
        INNER JOIN habitaciones h
        ON r.habitacion = h.codhabitaciones;
	END$$
DELIMITER ;

DELIMITER $$
CREATE
    PROCEDURE `reservahoteles`.`MostrarHabitaciones`()
	BEGIN
	SELECT * FROM habitaciones;
	END$$
DELIMITER ;

DELIMITER $$
CREATE
    PROCEDURE `reservahoteles`.`SacarPrecioHabitaciones`(IN cod INT)
	BEGIN
	SELECT * FROM habitaciones WHERE codhabitaciones = cod;
	END$$
DELIMITER ;

DELIMITER $$
CREATE
    PROCEDURE `reservahoteles`.`RegistrarReserva`(IN habitacion INT,
					         IN usuario INT,
					         IN periodo_estadia INT,
					         IN numero_personas INT,
					         IN numero_habitaciones INT,
					         IN numero_niños INT,
					         IN fecha DATE,
					         IN nombre_banco VARCHAR(100),
					         IN numero_tarjeta VARCHAR(100),
					         IN fecha_vencimiento DATE,
					         IN cvv VARCHAR(20),
					         IN total DECIMAL)
	BEGIN
	INSERT INTO reservacion VALUES
	(NULL,habitacion,usuario,
	periodo_estadia,numero_personas,
	numero_habitaciones,numero_niños,
	fecha ,CURTIME(),nombre_banco,
	numero_tarjeta,fecha_vencimiento,
	cvv,total);
	END$$
DELIMITER ;

DELIMITER $$
CREATE
    PROCEDURE `reservahoteles`.`ActualizarReserva`(IN codA INT,
						   IN habitacionA INT,
						   IN periodo_estadiaA INT,
						   IN numero_personasA INT,
						   IN numero_habitacionesA INT,
						   IN numero_niñosA INT,
						   IN fechaA DATE,
					           IN totalA DECIMAL)
	BEGIN
	UPDATE reservacion SET habitacion = habitacionA, 
	periodo_estadia = periodo_estadiaA, 
	numero_personas = numero_personasA,
	numero_habitaciones = numero_habitacionesA, 
	numero_niños =  numero_niñosA,
	fecha = fechaA , total = totalA
        WHERE codreservacion = codA;
	END$$
DELIMITER ;

DELIMITER $$
CREATE
    PROCEDURE `reservahoteles`.`EditarReserva`(IN cod INT)
	BEGIN
	SELECT * FROM reservacion WHERE codreservacion = cod;
	END$$
DELIMITER ;


DELIMITER $$
CREATE
    PROCEDURE `reservahoteles`.`EliminarReserva`(IN cod INT)
	BEGIN
	DELETE FROM reservacion WHERE codreservacion = cod;
	END$$
DELIMITER ;