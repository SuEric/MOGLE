create database MOGLE;
use MOGLE;

create table Persona(
	idPersona integer(11) not null, 
	nombre varchar(30), 
	apellidos varchar(30), 
	usuario varchar(30), 
	password varchar(30),
	cargo varchar(20),
	area varchar(10),
	primary key(idPersona)
)engine=myisam;

/*
create table Lider(
	idLider integer(11) not null,
	cargo varchar(20),
	primary key(idLider),
	foreign key(idLider) references Persona on delete set default on update cascade
)engine=myisam;

create table Desarrollador(
	idDesarrollador integer(11) not null,
	area varchar(10),
	Equipo_idEquipo integer(11),
	Primary key(idDesarrollador),
	foreign key(Persona_idPersona) references Persona on delete set default on update cascade
)engine=myisam;
*/

create table Proyecto(
	idProyecto integer(11) not null, 
	nombre varchar(30),
	descripcion varchar(100),
	Lider_idLider integer(11) not null,
	primary key(idProyecto),
	foreign key(Lider_idLider) references Lider on delete set default on update cascade
)engine=myisam;

create table Equipo(
	idEquipo integer(11) not null,
	nombre varchar(30),
	descripcion varchar(100),
	Lider_idLider integer(11) not null,
	Proyecto_idProyecto integer(11) not null,
	primary key(idEquipo),
	foreign key(Lider_idLider) references Lider on delete set default on update cascade,
	foreign key(Proyecto_idProyecto) references Proyecto on delete set default on update cascade
)engine=myisam;

create table Tile(
	idTile integer(11) not null,
	url varchar(500),
	alto integer(11),
	ancho integer(11),
	primary key(idTile)
)engine=myisam;

create table Mapa(
	idMapa integer(11) not null,
	nombre varchar(30),
	descripcion varchar(100),
	altoM integer(11),
	anchoM integer(11),
	altoT integer(11),
	anchoT integer(11),
	Proyecto_idProyecto integer(11) not null,
	primary key(idMapa),
	foreign key(Proyecto_idProyecto) references Proyecto on delete set default on update cascade
)engine=myisam;

create table Miembro_Mapa(
	Miembro_idMiembro integer(11) not null,
	Mapa_idMapa char(10) not null,
	fecha date,
	primary key(Miembro_idMiembro, Mapa_idMapa),
	foreign key(Miembro_idMiembro) references Miembro on delete set default on update cascade,
	foreign key(Mapa_idMapa) references Mapa on delete set default on update cascade
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
	foreign key(Mapa_idMapa) references Mapa on delete set default on update cascade,
	foreign key(Tile_idTile) references Tile on delete set default on update cascade
)engine=myisam;
 