# Aeropuerto
Proyecto final de Base de Datos 1

#### Integrantes del Grupo
 0900-15-549 Cristian Gerardo Hernandez Barrios
 
 0900-17-262 Diego Alejando Velasquez Hidalgo
 
 0900-17-1073 Denis Eduardo Bances Luna
 
 0900-09-8261 Rudy Orlando Subuyuj Medrano

### Tecnologías Utilizadas
El proyecto fue utilizado con PHP como back-end, Bootstrap como Front-end y SqlServer como base de datos.

### ¿Como visualizar el proyecto?
Para correr el proyecto se requiere de un servidor local (Apache) preferiblemente, se puede optar por descargar XAMPP y únicamente correr el servicio de APACHE, para luego ir al directorio del proyecto llamado aeropuerto en htdocs, y funcionará, ya que la base de datos se encuentra alojada en un hosting de base de datos. https://freeasphosting.net/cp/databases.aspx

### Trigger
El triger utilizado fue el siguiente 
```sql
CREATE TRIGGER TR_ingreso
ON embarque
AFTER INSERT
AS
BEGIN
SET NOCOUNT ON
  UPDATE aviones
  SET ndisponibles= ndisponibles-1
  WHERE cod=(select v.avion
    FROM vuelo as v
   WHERE v.cod=(select id_vuelo from inserted))

IF (SELECT fechac
  FROM INSERTED)=(SELECT v.fsale
                    FROM vuelo AS v
                    WHERE v.cod=(select id_vuelo FROM INSERTED))
    UPDATE embarque
    SET costo_f=costo-(costo*0.2)
    WHERE embarque.cod=(select cod FROM inserted)
ELSE
    UPDATE embarque
    SET costo_f=costo
    WHERE embarque.cod=(SELECT cod FROM INSERTED)
END;
```

### Procedimientos
El procedimiento #1 utilizado es el siguiente
```sql
CREATE PROC Insertar_aeropuerto
@nombre nvarchar(30),
@pais nvarchar(30)
AS
BEGIN
INSERT into dbo.aeropuerto VALUES (@nombre,@pais)
END
```
--
El segundo procedimiento es:
```sql
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
```

--
El tercer procedimiento es:
```sql

create proc Insertar_reservas
@nasientos int
as
begin
insert into dbo.resevas values (@nasientos)
end
```

--
El cuarto procedimiento es:
```sql
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
```

-- El quinto procedimiento es:
```sql
create proc Insertar_embarque
@cui bigint,
@reserva bigint,
@avion int,
@costo decimal(5,2),
@fecha date
as
begin
insert into dbo.embarque values(@cui,@reserva,@avion,0,@costo,@fecha)
end
```

--- El sexto procedimiento es:
```sql
alter proc Insertar_aviones
@nplaza int
as
begin 
insert into dbo.aviones values(@nplaza,@nplaza)
end
```

### Vistas 
La vista utilizada es:
```sql
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
```
