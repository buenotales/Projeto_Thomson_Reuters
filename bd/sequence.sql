declare
  ex_jaexiste exception;
  PRAGMA EXCEPTION_INIT( ex_jaexiste , -00955); -- Objeto já existe
Begin
  Execute Immediate 'create sequence sq_usuarios'
                  ||' start with 1'
                  ||' increment by 1'
                  ||' minvalue 1'
                  ||' maxvalue 9999999'
                  ||' nocache'
                  ||' nocycle';
  Execute Immediate 'create sequence sq_ativos'
                  ||' start with 1'
                  ||' increment by 1'
                  ||' minvalue 1'
                  ||' maxvalue 9999999'
                  ||' nocache'
                  ||' nocycle'; 
  Execute Immediate 'create sequence sq_usuario_ativo'
                  ||' start with 1'
                  ||' increment by 1'
                  ||' minvalue 1'
                  ||' maxvalue 9999999'
                  ||' nocache'
                  ||' nocycle';                   
Exception When ex_jaexiste Then
  null;
End;
/
