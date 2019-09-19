create sequence sq_usuarios
start with 1
increment by 1
minvalue 1
maxvalue 9999999
nocache
nocycle;

create sequence sq_ativos
start with 1
increment by 1
minvalue 1
maxvalue 999999
nocache
nocycle;

create sequence sq_usuario_ativo
start with 1
increment by 1
minvalue 1
maxvalue 999999
nocache
nocycle;
---------------------------------------------------------------------
create table t_usuarios(
id int not null primary KEY,
nome varchar2(100) not null,
usuario varchar2(100) not null,
email varchar2(100) not null,
senha varchar2(100) not null,
logar int not null,
ativo int not null)

create table t_ativos(
    id int not null primary key,
    nome varchar(100) not null,
    modelo varchar2(100) not null,
    nota varchar2(100) not null,
    descricao varchar2(100) not null
)

create table t_usuario_ativo(
    id int not null primary key,
    id_usuario int not null,
    id_ativo int not null
)
alter table t_usuario_ativo add FOREIGN key (id_usuario) references t_usuarios(id);
alter table t_usuario_ativo add FOREIGN key (id_ativo) references t_ativos(id);

alter table t_usuario_ativo add data_atribuicao date null;
alter table t_usuario_ativo add data_retirada date null;
alter table t_usuario_ativo add ativo int default 1

--------------------------------------------------------------------------------------

create or replace TRIGGER tr_usuarios
before insert on t_usuarios
for each ROW
BEGIN
    :new.id := sq_usuarios.nextval;
end;

create or replace trigger tr_ativos
before insert on t_ativos
for each ROW
begin
    :new.id := sq_ativos.nextval;
end;

create or replace trigger tr_usuario_ativo
before insert on t_usuario_ativo
for each ROW
begin
    :new.id := sq_usuario_ativo.nextval;
end;
--------------------------------------------------------------------------------------




