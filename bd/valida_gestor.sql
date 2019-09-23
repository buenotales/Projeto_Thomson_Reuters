CREATE OR REPLACE FUNCTION valida_gestor (us IN varchar2, se IN varchar2)
   RETURN number IS total number;
BEGIN

   SELECT u.id into total FROM t_usuarios u, t_grupo_usuario_padrao gu, t_grupos g
   where u.usuario = us and u.senha = se and u.id = gu.id_usuario
         and g.id = gu.id_grupo and g.tipo = 0 and gu.cargo = 'Gestor' and rownum = 1;

   if total is null or total = 0 then
     total := 0;
   end if;

   RETURN total;

END;
