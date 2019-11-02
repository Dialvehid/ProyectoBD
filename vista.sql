----------------------Vista-----------------------------------------
create view  Reporte
as
select 
				concat(cli.nombres,
				       cli.apellidos)as Nombre_Cliente, 
				vuel.cod			 as Codigo_vuelo, 
				re.nasientos		 as Asiento, 
				ae.nombre			 as Origen,
				ae.pais				 as Destino,
				vuel.aellega		 as Salida,
				vuel.aesale			 as Llegada

				from 

			   dbo.cliente as cli
	inner join dbo.vuelo as vuel
on			   cli.id = vuel.avion
	inner join dbo.resevas as re
on             re.nasientos = vuel.cod
	inner join dbo.aeropuerto as ae
on			   ae.cod = vuel.cod
