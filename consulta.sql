create database aeropuerto

create table cliente(
id bigint primary key not NULL identity(1,1),
cui bigint not null unique,
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

create table aviones(
cod int primary key identity(1,1) not null,
nplaza int not null,
ndisponibles int
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
constraint fk_salida foreign key(aesale) references aeropuerto(cod),
constraint fk_entra foreign key(aellega) references aeropuerto(cod),
constraint fk_avion foreign key(avion) references aviones(cod),
)

create table embarque(
cod int primary key not null identity(1,1),
cui bigint not null,
reseva bigint,
id_vuelo int,
costo decimal(5,2) not null,
costo_f decimal(5,2),
fechac date not null,
constraint fk_idvuelo foreign key(id_vuelo) references vuelo(cod),
constraint fk_res foreign key(reseva) references resevas(cod),
constraint fk_cui foreign key(cui) references cliente(cui)
)

create trigger TR_ingreso
on embarque
after insert
as
begin
set nocount on
  update aviones
  set ndisponibles= ndisponibles-1
  where cod=(select v.avion
    from vuelo as v
   where v.cod=(select id_vuelo from inserted))

if (select fechac
  from inserted)=(select v.fsale
                    from vuelo as v
                    where v.cod=(select id_vuelo from inserted))
    update embarque
    set costo_f=costo-(costo*0.2)
    where embarque.cod=(select cod from inserted)
else
    update embarque
    set costo_f=costo
    where embarque.cod=(select cod from inserted)
end;

--------------------------------insertar datos------------------------------

create proc Insertar_aeropuerto
@nombre nvarchar(30),
@pais nvarchar(30)
as
begin
insert into dbo.aeropuerto values (@nombre,@pais)
end

alter proc Insertar_aviones
@nplaza int
as
begin 
insert into dbo.aviones values(@nplaza,@nplaza)
end

create proc Insertar_cliente
@cui bigint,
@nombres nvarchar(50),
@apellidos nvarchar(50),
@direccion nvarchar(100),
@tjtC nvarchar(20),
@tel int
as
begin
insert into dbo.cliente values(@cui,@nombres,@apellidos,@direccion,@tjtC,@tel) 
end

alter proc Insertar_embarque
@cui bigint,
@reserva bigint,
@avion int,
@costo decimal(5,2),
@fecha date
as
begin
insert into dbo.embarque values(@cui,@reserva,@avion,0,@costo,@fecha)
end


create proc Insertar_reservas
@nasientos int
as
begin
insert into dbo.resevas values (@nasientos)
end

create proc Insertar_vuelo
@fsale date,
@fllegada date,
@aesale int,
@aellega int,
@avion int
as
begin
insert into dbo.vuelo values (@fsale,@fllegada,@aesale,@aellega,@avion)
end

----------------------Vista-----------------------------------------
create view resumen
as
select c.nombres as NOMBRES, e.id_vuelo AS CODIGO_VUELO,e.cod AS NO_TICKET,a1.nombre AS AEROPUERTO_SALIDA,a2.nombre AS AEROPUERTO_LLEGADA,v.fsale AS FECHA_SALIDA,v.fllega AS FECHA_LLEGADA
from embarque as e
join cliente as c
on c.cui=e.cui
join vuelo as v
on v.cod=e.id_vuelo
join aeropuerto as a1
on a1.cod=v.aesale
join aeropuerto as a2
on a2.cod=v.aellega

