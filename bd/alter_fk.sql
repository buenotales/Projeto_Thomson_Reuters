
Declare
  ex_jaexiste exception;
  PRAGMA EXCEPTION_INIT( ex_jaexiste , -02275); -- FK já existe.
BEGIN
Begin
  Execute Immediate 'alter table t_usuario_ativo'
                  ||' add FOREIGN key (id_usuario)'
                  ||'  references t_usuarios(id)';
Exception When ex_jaexiste Then
  null;
End;
Begin
  Execute Immediate 'alter table t_usuario_ativo'
                  ||' add FOREIGN key (id_ativo)'
                  ||'  references t_ativos(id)';
Exception When ex_jaexiste Then
  null;
End;
END;
/