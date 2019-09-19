-- Modelo de scripts para versionamento de incrementais
-- ====================================================
--
-- TABELAS (criação)
Declare
  ex_existe_tabela exception;
  PRAGMA EXCEPTION_INIT( ex_existe_tabela, -00955);
  ex_notnull exception;
  PRAGMA EXCEPTION_INIT( ex_notnull , -01430); -- Coluna já existe
Begin
  --
  --
  Begin
    Execute Immediate 'create table t_usuarios
  (
    id int not null primary KEY,
    nome varchar2(100) not null,
    usuario varchar2(100) not null,
    email varchar2(100) not null,
    senha varchar2(100) not null,
    logar int not null,
    ativo int not null
  ) tablespace &&SFW_<PRODUTO>_DATA_4K';
  Exception When ex_existe_tabela Then
    null;
  End;
  --
  Execute Immediate 'comment on table t_usuarios is ''Armazena os usuarios a serem manipulados pela aplicação''';
  Execute Immediate 'comment on column t_usuarios.id is ''Identificação do Registro (PRIMARY KEY)''';
  Execute Immediate 'comment on column t_usuarios.nome is ''Nome do usuario cadastrado''';
  Execute Immediate 'comment on column t_usuarios.usuario is ''Usuario de acesso do registro''';
  Execute Immediate 'comment on column t_usuarios.email is ''E-mail do usuario''';
  Execute Immediate 'comment on column t_usuarios.senha is ''Senha de acesso do registro''';
  Execute Immediate 'comment on column t_usuarios.logar is ''Campo onde sera especificado se o usuario pode logar no sistema ou nao, 0 para nao e 1 para sim''';
  Execute Immediate 'comment on column t_usuarios.ativo is ''Campo onde sera especificado se o usuario esta ativo ou nao, se foi apagado ou nao''';
  --
  --
  Begin
    Execute Immediate 'create table t_ativos
  (
    id int not null primary key,
    nome varchar(100) not null,
    modelo varchar2(100) not null,
    nota varchar2(100) not null,
    descricao varchar2(100) not null
  ) tablespace &&SFW_<PRODUTO>_DATA_4K';
  Exception When ex_existe_tabela Then
    null;
  End;
  --
  Execute Immediate 'comment on table t_ativos is ''Armazena os equipamentos, ativos usados pelos usuarios''';
  Execute Immediate 'comment on column t_ativos.id is ''Identificação do Registro (PRIMARY KEY)''';
  Execute Immediate 'comment on column t_ativos.nome is ''Nome do ativo cadastrado''';
  Execute Immediate 'comment on column t_ativos.modelo is ''Modelo do ativo cadastrado''';
  Execute Immediate 'comment on column t_ativos.nota is ''Nota Fical do ativo cadastrado''';
  Execute Immediate 'comment on column t_ativos.descricao is ''Descricao do ativo cadastrado''';
  --
  --
  Begin
    Execute Immediate 'create table t_usuario_ativo
  (
    id int not null primary key,
    id_usuario int not null,
    id_ativo int not null
  ) tablespace &&SFW_<PRODUTO>_DATA_4K';
  Exception When ex_existe_tabela Then
    null;
  End;
  --
  Execute Immediate 'comment on table t_usuario_ativo is ''Atrela os equipamentos aos usuarios''';
  Execute Immediate 'comment on column t_usuario_ativo.id is ''Identificação do Registro (PRIMARY KEY)''';
  Execute Immediate 'comment on column t_usuario_ativo.id_usuario is ''Id referente a tabela usuarios''';
  Execute Immediate 'comment on column t_usuario_ativo.id_ativo is ''Id referente a tabela ativos''';
  --
  --
  Begin
    Execute Immediate 'alter table t_usuario_ativo add data_atribuicao date null';
  Exception When ex_notnull Then
    null;
  End;
  --
  Execute Immediate 'comment on column t_usuario_ativo.data_atribuicao is ''Indica a data de atribuicao do ativo ao usuario''';
  --
  --
  Begin
    Execute Immediate 'alter table t_usuario_ativo add data_retirada date null';
  Exception When ex_notnull Then
    null;
  End;
  --
  Execute Immediate 'comment on column t_usuario_ativo.data_retirada is ''Indica a data de devolucao do ativo ao usuario''';
  --
  --
  Begin
    Execute Immediate 'alter table t_usuario_ativo add ativo int default 1';
  Exception When ex_notnull Then
    null;
  End;
  --
  Execute Immediate 'comment on column t_usuario_ativo.ativo is ''Indica se o usuario esta habilitado para usar o sistema''';
  --
  --
End;
/