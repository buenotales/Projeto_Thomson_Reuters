create or replace TRIGGER tr_usuario_ativo
before insert on t_usuario_ativo
for each ROW
BEGIN
:new.id := sq_usuario_ativo.nextval;
end;
/