CREATE OR REPLACE FUNCTION valida_adm (us IN varchar2, se IN varchar2)
   RETURN number IS total number;
BEGIN

   SELECT 1 into total FROM t_usuarios u, t_grupo_usuario gu, t_grupos g
   where u.usuario = us and u.senha = se and u.id = gu.id_usuario
         and g.id = gu.id_grupo and g.tipo = 1 and rownum = 1;

   if total is null or total = '' then
     total := 0;
   end if;

   RETURN total;

END;
/
