create or replace TRIGGER tr_usuarios
before insert on t_usuarios
for each ROW
BEGIN
:new.id := sq_usuarios.nextval;
end;