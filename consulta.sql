
create table cliente(
cui bigint primary key not null unique,
nombres nvarchar (50) not null,
apellidos nvarchar (50) not null,
direccion nvarchar (100) not null,
tjtC nvarchar (20) not null,
tel int unique not null,
constraint dpi check( cui <= 9999999999999 and cui >0)
)

create table resevas(
cod bigint primary key identity(1,1) not null,
nasientos int check(nasientos>0) not null
)

create table embarque(
cod int primary key not null identity(1,1),
cui int not null,
reseva bigint,
constraint fk_res foreign key(reseva) references resevas(cod)
)

create table aviones(
cod int primary key identity(1,1) not null,
nplaza int not null
)

create table aeropuerto(
cod int primary key identity(1,1) not null,
nombre nvarchar(30) not null,
pais nvarchar(30)not null,
)

create table vuelo(
cod int primary key identity(1,1) not null,
fsale date not null,
fllega date not null,
aesale int not null,
aellega int not null,
avion int not null,
embar int not null,
constraint fk_salida foreign key(aesale) references aeropuerto(cod),
constraint fk_entra foreign key(aellega) references aeropuerto(cod),
constraint fk_avion foreign key(avion) references aviones(cod),
constraint fkembar foreign key(embar) references embarque(cod)
)

/*
select
	c.nombres+' '+c.apellidos as nombre_completo, v.cod as cod_vuelo, asa.nombre as origen, alle.nombre as destino, v.fsale as salida, v.fllega as llegada
from 
	cliente as c
inner join embarque as e
on c.cui=e.cui

inner join vuelo as v
on e.cod=v.embar

inner join aeropuerto as asa
on v.aesale=asa.cod 
inner join aeropuerto as alle
on  v.aellega=alle.cod
*/

CREATE PROCEDURE VISTA(
@cui bigint)
AS
	SELECT V.*
	FROM VUELO AS V
		JOIN embarque as E
		on V.embar=E.cod
		JOIN cliente as c
		on E.cui=c.cui
	WHERE c.cui=@cui

ALTER PROCEDURE VISTA
@cui bigint
as
	SELECT *
	FROM VUELO AS V
	JOIN embarque as E
	on V.embar=E.cod
	JOIN cliente as c
	on E.cui=c.cui
	WHERE c.cui=@cui