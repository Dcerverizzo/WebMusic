﻿/* criar um banco de dados chamado projeto musica */

/*Criando tabela pessoa*/
create sequence seq_pessoa;
create table pessoa(
    id_pessoa integer not null default nextval('seq_pessoa'),
    nome varchar not null,
    endereco varchar not null,
    bairro varchar not null,
    id_cidade integer not null,
    telefone01 varchar(11) not null,
    email varchar not null,
    constraint pk_pessoa primary key (id_pessoa)

);


/*criando a tabela cidade*/
create sequence seq_cidade;
create table cidade(
    id_cidade integer not null default nextval('seq_cidade'),
    uf char(2) not null,
    nome varchar not null,
    cep char(8) not null,
    constraint pk_cidade primary key (id_cidade)
);





/*Criando a tabela musico*/
create sequence seq_musico;
create table pessoa_musico(
    id_pessoa_musico integer not null,
    sexo char(1) not null,
    cpf char(11) not null,
    rg varchar(20) not null,
    banda_musico integer not null,
    constraint pk_pessoa_musico primary key (id_pessoa_musico),
    constraint fk_pessoa_musico_pessoa foreign key (id_pessoa_musico) references pessoa(id_pessoa),
    constraint fk_banda_musico foreign key (banda_musico) references banda(id_banda)
);



/*Criando a tabela banda*/
create sequence seq_banda;
create table banda(
     id_banda integer not null default nextval('seq_banda'),
     nome varchar not null,
     musico varchar not null,
     intour boolean not null,
     constraint pk_banda primary key (id_banda));



/*Criando a tabela album*/
create sequence seq_album;
create table album(
    id_album integer not null default nextval('seq_cidade'),
    nome varchar not null,
    estilo varchar not null,
   id_album_banda integer not null,
    constraint pk_album primary key (id_album),
    constraint fk_album_banda foreign key (id_album_banda) references banda(id_banda)
);







select * from pessoa
select * from banda
select * from pessoa_musico
select * from album
select * from cidade





