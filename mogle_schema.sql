/*
	MOGLE
	Eric & Nahum
	ESQUEMA DE LA BD
*/

create database MOGLE;
use MOGLE;

create table Persona(
	idPersona integer(11) not null AUTO_INCREMENT,
	nombre varchar(30),
	apellidos varchar(30),
	usuario varchar(30),
	password varchar(30),
	cargo varchar(20), -- Indica que es líder, tomará valor nulo si no lo es
	area varchar(10), -- Indica que es desarrollador, tomará valor nulo si no lo es
	primary key(idPersona)
)engine=myisam;

create table Proyecto(
	idProyecto integer(11) not null AUTO_INCREMENT,
	nombre varchar(30),
	descripcion varchar(100),
	Persona_idPersona integer(11) not null, -- Este debe ser un lider
	primary key(idProyecto),
	foreign key(Persona_idPersona) references Persona on delete cascade on update cascade
)engine=myisam;

create table Tile(
	idTile integer(11) not null AUTO_INCREMENT,
	url varchar(500) not null,
	alto integer(11),
	ancho integer(11),
	primary key(idTile),
	UNIQUE(url)
)engine=myisam;

create table Mapa(
	idMapa integer(11) not null AUTO_INCREMENT,
	nombre varchar(30),
	descripcion varchar(100),
	anchoM integer(11),
	altoM integer(11),
	Proyecto_idProyecto integer(11) not null,
	primary key(idMapa),
	foreign key(Proyecto_idProyecto) references Proyecto on delete cascade on update cascade
)engine=myisam;

create table Mapa_Tile(
	Mapa_idMapa integer(11) not null,
	Tile_idTile integer(11) not null,
	capa integer(11) default 1,
	xMapa integer(11),
	yMapa integer(11),
	xTile integer(11),
	yTile integer(11),
	primary key(Mapa_idMapa, Tile_idTile),
	foreign key(Mapa_idMapa) references Mapa on delete cascade on update cascade,
	foreign key(Tile_idTile) references Tile on delete cascade on update cascade
)engine=myisam;

create table Proyecto_Desarrollador(
	Proyecto_idProyecto integer(11) not null,
	Persona_idPersona integer(11) not null, -- Este debe ser un desarrollador
	primary key(Proyecto_idProyecto, Persona_idPersona),
	foreign key(Proyecto_idProyecto) references Proyecto on delete cascade on update cascade,
	foreign key(Persona_idPersona) references Persona on delete cascade on update cascade
)engine=myisam;