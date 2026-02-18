CREATE DATABASE b_componentes;
USE b_componentes;

CREATE TABLE componentes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    cantidad INT NOT NULL,
    tipo ENUM('Activo','Pasivo') NOT NULL,
    descripcion TEXT
);

DELIMITER $$

CREATE PROCEDURE sp_agregar_componente(
    IN p_nombre VARCHAR(100),
    IN p_cantidad INT,
    IN p_tipo ENUM('Activo','Pasivo'),
    IN p_descripcion TEXT
)
BEGIN
    INSERT INTO componentes(nombre, cantidad, tipo, descripcion)
    VALUES(p_nombre, p_cantidad, p_tipo, p_descripcion);
END$$

CREATE PROCEDURE sp_listar_componentes()
BEGIN
    SELECT * FROM componentes;
END$$

CREATE PROCEDURE sp_buscar_componente(IN p_id INT)
BEGIN
    SELECT * FROM componentes WHERE id = p_id;
END$$

CREATE PROCEDURE sp_editar_componente(
    IN p_id INT,
    IN p_nombre VARCHAR(100),
    IN p_cantidad INT,
    IN p_tipo ENUM('Activo','Pasivo'),
    IN p_descripcion TEXT
)
BEGIN
    UPDATE componentes
    SET nombre=p_nombre,
        cantidad=p_cantidad,
        tipo=p_tipo,
        descripcion=p_descripcion
    WHERE id=p_id;
END$$

CREATE PROCEDURE sp_eliminar_componente(IN p_id INT)
BEGIN
    DELETE FROM componentes WHERE id=p_id;
END$$

DELIMITER ;

CALL sp_agregar_componente('Resistencia 220Ω',100,'Pasivo','Limita corriente');
CALL sp_agregar_componente('LED rojo',60,'Activo','Diodo emisor de luz');
CALL sp_agregar_componente('Capacitor 100uF',40,'Pasivo','Almacena carga');
CALL sp_agregar_componente('Transistor BC547',25,'Activo','Amplificador NPN');
