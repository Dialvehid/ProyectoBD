create trigger TR_ingreso
on embarque
after insert
as
begin
  update aviones
  set ndisponibles= ndisponibles-1
  where cod=(select v.avion
    from vuelo as v
   where v.cod=(selec id_vuelo from inserted))

if (select fecha
  from inserted)=(select v.fsale
                    from vuelo as v
                    where v.cod=(select id_vuelo from inserted))
    update embarque
    set costo_f=costo-(costo*0.2)
    where embarque.cod=(select cod form inserted)
else
    update embarque
    set costo_f=costo
    where embarque.cod=(select cod from inserted)
end;