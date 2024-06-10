DROP DATABASE IF EXISTS prueba_sysop;
CREATE DATABASE IF NOT EXISTS prueba_sysop;
use prueba_sysop;
#------------------------TABLA ADMINISTRADOR-------------------------#
drop table if exists administrador;
create table administrador(
	id_administrador		int				not null auto_increment,
    usuario					varchar(40)		not null,
    contra					varchar(40)		not null,
    
    primary key(id_administrador)
);
#----------------------------TABLA USUARIO----------------------------#
CREATE TABLE IF NOT EXISTS usuario (
    id_usuario 			INT AUTO_INCREMENT NOT NULL,
    nombre 				VARCHAR(150) NOT NULL,
    num_telefono 		VARCHAR(10) NOT NULL,
    email 				VARCHAR(50) UNIQUE NOT NULL,
    contra		 		VARCHAR(30) NOT NULL,
    fecha_nacimiento 	DATE NOT NULL,
    rfc 				VARCHAR(13) NOT NULL,
    foto_perfil			LONGBLOB NOT NULL,
    tipo_usuario 		VARCHAR(2) NOT NULL,
    baja_logica			bit default 0 not null,
    
    primary key(id_usuario)
);

###------------------ ALTAS BAJAS Y CAMBIOS USUARIO ------------------###
DROP PROCEDURE IF EXISTS sp_usuario;
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_usuario`(
in	sp_nombre 					varchar(150),
in	sp_num_telefono				varchar(10),
in	sp_email					varchar(50),
in	sp_contra					varchar(30),
in	sp_fecha_nacimiento			date,
in	sp_rfc						varchar(13),
in	sp_foto_perfil				longblob,
in	sp_tipo_usuario				varchar(2),
in 	opcion						varchar(2)
)
SQL SECURITY INVOKER
begin

	DECLARE EXIT HANDLER FOR 1062
		BEGIN
			SELECT 1062 as codigo,
            CONCAT('ERROR, El correo  (',sp_email,') ya esta en uso, vuelva intentar con otro correo') 
            AS mensaje;
		END;

	DECLARE EXIT HANDLER FOR 1146 
		SELECT 1146 as codigo,
        'Tabla no encontrada' as mensaje;
        
	DECLARE EXIT HANDLER FOR SQLEXCEPTION 
		SELECT 100 as codigo,
        'Error en base de datos' as mensaje; 

	if opcion =	'I' then
	INSERT INTO usuario(nombre, num_telefono, email, contra, fecha_nacimiento, rfc, foto_perfil, tipo_usuario)
    VALUES(sp_nombre, sp_num_telefono, sp_email, sp_contra, sp_fecha_nacimiento, sp_rfc, sp_foto_perfil, sp_tipo_usuario);
	
    select 1 as codigo,
    concat('registro exitoso') as mensaje;
	end if;
    
        if opcion = 'U' then
    
    update usuario set
    nombre = if(sp_nombre <> '', sp_nombre, nombre),
    num_telefono = if(sp_num_telefono <> '', sp_num_telefono, num_telefono),
    contra = if(sp_contra <> '', sp_contra, contra),
    fecha_nacimiento = if(sp_fecha_nacimiento <> '', sp_fecha_nacimiento, fecha_nacimiento),
    rfc = if(sp_rfc <> '', sp_rfc, rfc),
    foto_perfil = if(sp_foto_perfil <> '', sp_foto_perfil, foto_perfil),
    tipo_usuario = if(sp_tipo_usuario <> '', sp_tipo_usuario, tipo_usuario)
    where id_usuario = (select id_usuario from usuario where email = sp_email)
    ;
    
     select 1 as codigo,
    concat('Usuario modificado exitosamente') as mensaje;
    end if;
    
     if opcion = 'D' then 
		update usuario set baja_logica = 1 
        where id_usuario = (select id_usuario from usuario where email = sp_email)
        ;
        select 1 as codigo, 
        'Baja exitosa' as mensaje;
    end if;
end$$
DELIMITER ;