create or replace TRIGGER tr_ativos
before insert on t_ativos
for each ROW
BEGIN
:new.id := sq_ativos.nextval;
end; 