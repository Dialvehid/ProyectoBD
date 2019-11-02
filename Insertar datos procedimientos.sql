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


