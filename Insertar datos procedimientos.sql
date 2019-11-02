--------------------------------insertar datos------------------------------

create proc Insertar_aeropuerto
@cod int,
@nombre nvarchar(30),
@pais nvarchar(30)
as
begin
insert into dbo.aeropuerto values (@cod,@nombre,@pais)
end


create proc Insertar_aviones
@cod int,
@nplaza int
as
begin 
insert into dbo.aviones values(@cod,@nplaza)
end

create proc Insertar_cliente
@id bigint,
@cui bigint,
@nombres nvarchar(50),
@apellidos nvarchar(50),
@direccion nvarchar(100),
@tjtC nvarchar(20),
@tel int
as
begin
insert into dbo.cliente values(@id,@cui,@nombres,@apellidos,@direccion,@tjtC,@tel) 
end

create proc Insertar_embarque
@cod int,
@cui int,
@reserva bigint
as
begin
insert into dbo.embarque values(@cod,@cui,@reserva)
end


create proc Insertar_reservas
@cod bigint,
@nasientos int
as
begin
insert into dbo.resevas values (@cod,@nasientos)
end


create proc Insertar_vuelo
@cod int,
@fsale date,
@fllegada date,
@aesale int,
@aellega int,
@avion int,
@embar int
as
begin
insert into dbo.vuelo values (@cod,@fsale,@fllegada,@aesale,@aellega,@avion,@embar)
end


