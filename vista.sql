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
