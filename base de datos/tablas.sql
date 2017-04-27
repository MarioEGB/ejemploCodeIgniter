-- aqui creamos la base de datos
-- CREATE DATABASE Escuela;
-- DROP DATABASE Escuela;

-- aqui creamos la tabla de las carreras de la escuela
CREATE TABLE carrera
(id_carrera SERIAL NOT NULL,
 nombre_carrera character varying(20) NOT NULL,
 duracion_carrera float,
 CONSTRAINT pk_id_carrera PRIMARY KEY (id_carrera),
 CONSTRAINT u_id_carrera UNIQUE (id_carrera),
 CONSTRAINT chk_id_carrera CHECK (id_carrera > 0 )
 );
 -- aqui creamos la tabla de materias
 CREATE TABLE ueas
 (id_uea SERIAL NOT NULL,
  nombre_uea varchar(50) NOT NULL,
  creditos_uea integer NOT NULL,
  CONSTRAINT pk_id_uea PRIMARY KEY (id_uea),
  CONSTRAINT u_id_uea UNIQUE (id_uea),
  CONSTRAINT chk_id_uea CHECK (id_uea > 0 )
 );
 
 -- aqui creamos la tabla de profesores
 CREATE TABLE profesores
 (matricula_profesor integer NOT NULL,
  nombre_profesor varchar(100) NOT NULL,
  direccion_profesor varchar(150) NOT NULL,
  telefono_profesor integer NOT NULL,
  -- el horario del profesor 1 para matutino 2 para vespertino y 3 para tiempo completo 
  horario_profesor integer,
  CONSTRAINT chk_horario_profesor CHECK (horario_profesor IN (1,2,3)),
  CONSTRAINT pk_matricula_profesor PRIMARY KEY (matricula_profesor),
  CONSTRAINT u_matricula_profesor UNIQUE (matricula_profesor),
  CONSTRAINT chk_matricula_profesor CHECK (matricula_profesor > 0 )
 );
 
 -- aqui creamos la tabla alumno
 CREATE TABLE alumnos
 (matricula_alumno integer NOT NULL,
  nombre_alumno varchar(100) NOT NULL,
  edad_alumno integer NOT NULL,
  CONSTRAINT chk_edad_alumno CHECK (edad_alumno >= 18 ),
  trimestre_alumno integer NOT NULL,
  CONSTRAINT chk_trimestre_alumno CHECK (trimestre_alumno >= 0 AND trimestre_alumno <=12 ),
  -- el genero del alumno sera 0 para mujer y 1 para hombre
  genero_alumno integer NOT NULL,
  CONSTRAINT chk_genero_alumno CHECK (genero_alumno IN (0,1)),
  fk_id_carrera integer NOT NULL,
  CONSTRAINT pk_matricula_alumno PRIMARY KEY (matricula_alumno),
  CONSTRAINT u_matricula_alumno UNIQUE (matricula_alumno),
  CONSTRAINT chk_matricula_alumno CHECK (matricula_alumno > 0 ),
  CONSTRAINT fk_fk_id_carrera FOREIGN KEY (fk_id_carrera) REFERENCES carrera (id_carrera)
 );
 
 -- aqui creamos la tabla intermedia entre el alumnon y el profesor
 CREATE TABLE alumno_profesor
 (fk_matricula_alumno integer NOT NULL,
  CONSTRAINT fk_fk_matricula_alumno FOREIGN KEY (fk_matricula_alumno) REFERENCES alumnos (matricula_alumno),
  fk_matricula_profesor integer NOT NULL,
  CONSTRAINT fk_fk_matricula_profesor FOREIGN KEY (fk_matricula_profesor) REFERENCES profesores (matricula_profesor)
 );
 
 -- aqui creamos la tabla intermedia entre la materia y el alumno
 CREATE TABLE uea_alumno
 (fk_matricula_alumno_2 integer NOT NULL,
  CONSTRAINT fk_fk_matricula_alumno_2 FOREIGN KEY (fk_matricula_alumno_2) REFERENCES alumnos (matricula_alumno),
  fk_id_uea integer NOT NULL,
  CONSTRAINT fk_fk_id_uea FOREIGN KEY (fk_id_uea) REFERENCES ueas (id_uea)
 );
 
 -- aqui creamos la tabla intermedia entre materia 	profesor
  CREATE TABLE uea_profesor
 (fk_matricula_profesor_2 integer NOT NULL,
  CONSTRAINT fk_fk_matricula_profesor_2 FOREIGN KEY (fk_matricula_profesor_2) REFERENCES profesores (matricula_profesor),
  fk_id_uea_2 integer NOT NULL,
  CONSTRAINT fk_fk_id_uea_2 FOREIGN KEY (fk_id_uea_2) REFERENCES ueas (id_uea)
 );
 
 