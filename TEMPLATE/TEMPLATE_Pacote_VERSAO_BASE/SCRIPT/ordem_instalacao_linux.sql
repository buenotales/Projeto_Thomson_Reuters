SPOOL script_criacao.log
Prompt ##################################################
Prompt #   define.sql
Prompt ##################################################
@"./define.sql"
Prompt ##################################################
Prompt #   connect.sql
Prompt ##################################################
@"./connect.sql"
Prompt ##################################################
Prompt #   alter_session.sql
Prompt ##################################################
@"./alter_session.sql"
Prompt ##################################################
Prompt #   /RF/00_INC/01-create_alter.sql
Prompt ##################################################
@"./RF/00_INC/01-create_alter.sql"
Prompt ##################################################
Prompt #   /RF/00_INC/02-alter_fk.sql
Prompt ##################################################
@"./RF/00_INC/02-alter_fk.sql"
Prompt ##################################################
Prompt #   /RF/00_INC/03-sequence.sql
Prompt ##################################################
@"./RF/00_INC/03-sequence.sql"
Prompt ##################################################
Prompt #   /RF/01_OBJ/06_Trigger/tr_avisos.sql
Prompt ##################################################
@"./RF/01_OBJ/06_Trigger/tr_avisos.sql"
Prompt ##################################################
Prompt #   /RF/01_OBJ/06_Trigger/tr_usuario_ativo.sql
Prompt ##################################################
@"./RF/01_OBJ/06_Trigger/tr_usuario_ativo.sql"
Prompt ##################################################
Prompt #   /RF/01_OBJ/06_Trigger/tr_usuarios.sql
Prompt ##################################################
@"./RF/01_OBJ/06_Trigger/tr_usuarios.sql"
Prompt ##################################################
Prompt #   compila_invalidos.sql
Prompt ##################################################
@"./compila_invalidos.sql"
SPOOL OFF
EXIT
