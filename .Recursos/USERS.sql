CREATE TABLE "users" (
  "cedula" int PRIMARY KEY NOT NULL,
  "nombre" varchar(30) NOT NULL,
  "apellido" varchar(30) NOT NULL,
  "usuario" varchar(30) NOT NULL,
  "email" varchar(50) NOT NULL,
  "pass" varchar(30) NOT NULL,
  "telefono" int(10) NOT NULL,
  "sexo" varchar(1) NOT NULL,
  "direc" varchar(45) NOT NULL,
  "fechnac" varchar(50) NOT NULL,
  "fechreg" varchar(50) NOT NULL,
  "estado" int(1) DEFAULT 1
);

CREATE TABLE "pqrs" (
  "id" SERIAL PRIMARY KEY,
  "cedulauser" int NOT NULL,
  "asunto" int(2) NOT NULL,
  "tipoSolicitante" int(1) NOT NULL,
  "razonS" varchar(50) NOT NULL,
  "telefono" int(10) NOT NULL,
  "answerPqrs" varchar(20) NOT NULL,
  "tema" varchar(65) NOT NULL,
  "message" varchar NOT NULL,
  "archivos1" varchar(30),
  "archivos2" varchar(30),
  "fechpqrs" varchar(30) NOT NULL,
  "estado" int(1) DEFAULT 0
);

CREATE TABLE "tipopqrs" (
  "id" SERIAL PRIMARY KEY,
  "nompqrs" varchar(20),
  "estado" int(1) DEFAULT 1,
  "priority" varchar(10) NOT NULL
);

CREATE TABLE "tipos_solicitante" (
  "id" SERIAL PRIMARY KEY,
  "tiposol" varchar(20)
);

CREATE TABLE "preguntas_frecuentes" (
  "id" SERIAL PRIMARY KEY,
  "pregunta" varchar(256) NOT NULL,
  "respuesta" varchar(256) NOT NULL,
  "estado" int(1) DEFAULT 0
);

CREATE TABLE "tutoriales" (
  "id" SERIAL PRIMARY KEY,
  "nom" varchar(100) NOT NULL,
  "area" varchar(10) NOT NULL,
  "url" varchar(100) NOT NULL,
  "estado" int(1) DEFAULT 0
);

ALTER TABLE "pqrs" ADD FOREIGN KEY ("asunto") REFERENCES "tipopqrs" ("id");

ALTER TABLE "pqrs" ADD FOREIGN KEY ("tipoSolicitante") REFERENCES "tipos_solicitante" ("id");

ALTER TABLE "pqrs" ADD FOREIGN KEY ("cedulauser") REFERENCES "users" ("cedula");
