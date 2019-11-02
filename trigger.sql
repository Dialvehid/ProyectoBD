create trigger TR_ingreso
on embarque
after insert
as
begin
  update aviones
  set ndisponibles= ndisponibles-1
  where cod=inserted.cod

  
end;