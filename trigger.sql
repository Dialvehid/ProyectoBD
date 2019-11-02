create trigger TR_ingreso
on embarque
after insert
as
begin
  update aviones
  set ndisponibles= ndisponibles-1
  where cod=(select v.avion
    from vuelo as v
   where v.cod=inserted.id_vuelo)

if inserted.fecha=(select v.fsale
                    from vuelo as v
                    where v.cod=inseted.id_vuelo)
    update embarque
    set costo_f=costo-(costo*0.2)
    where embarque.cod=inserted.cod
else
    update embarque
    set costo_f=costo
    where embarque.cod=inserted.cod
end;