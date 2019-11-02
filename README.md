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
CREATE trigger TR_ingreso
ON embarque
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
```
