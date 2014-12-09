TRUNCATE TABLE Persona; 
TRUNCATE TABLE Proyecto;
TRUNCATE TABLE Tile;
TRUNCATE TABLE Mapa;
TRUNCATE TABLE Mapa_Tile;
TRUNCATE TABLE Proyecto_Desarrollador;

insert into Persona values(null,'Nahum','Aguila','crownhum','patito','Diseño', null);
insert into Persona values(null,'Juan','Amieva','jcaami','amieva','Gerente', null);
insert into Persona values(null,'Eric','Garcia','sueric','golpebajo+2','Jefe', null);
insert into Persona values(null,'Ricardo','Camacho','desmont','pinguino', null,'ventas');
insert into Persona values(null,'Jorge','Serrano','yorge','chistosa', null,'recepcion');

insert into Proyecto values(null,'Tile1','MapaA',1);
insert into Proyecto values(null,'Tile2','MapaB',2);
insert into Proyecto values(null,'Tile3','MapaC',3);
insert into Proyecto values(null,'Tile4','MapaD',3);

insert into Tile values(null,'Dungeon_A1',512,384);
insert into Tile values(null,'006-Desert01',256,608);
insert into Tile values(null,'012-PortTown02',256,672);
insert into Tile values(null,'026-Castle02',256,800);

insert into Mapa values(null,'Mi mapa 1','hola',default,default,default,1);
insert into Mapa values(null,'Mi mapa 2','como',64,64,default,2);
insert into Mapa values(null,'Mi mapa 3','estas',default,default,3,4);
insert into Mapa values(null,'Mi mapa 3','tu',default,default,10,4);

insert into Mapa_Tile values(1,2,6,1,2,2,1);
insert into Mapa_Tile values(4,3,4,5,7,4,3);
insert into Mapa_Tile values(2,1,2,6,6,6,5);

insert into Proyecto_Desarrollador values(2,4);
insert into Proyecto_Desarrollador values(1,5);
insert into Proyecto_Desarrollador values(3,5);
insert into Proyecto_Desarrollador values(4,5);
insert into Proyecto_Desarrollador values(3,4);
insert into Proyecto_Desarrollador values(2,5);
insert into Proyecto_Desarrollador values(1,4);