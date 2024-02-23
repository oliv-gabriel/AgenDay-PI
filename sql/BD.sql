create database if not exists agenday;
create table if not exists agenday.proprietario(
    id_proprietario integer auto_increment primary key,
    nome_proprietario varchar(40) NOT NULL,
    email_proprietario varchar(50),
    contato_proprietario int(15) NOT NULL,
    data_nascimento date,
    arquivo_proprietario varchar(255)
);
CREATE TABLE IF NOT EXISTS agenday.estabelecimento(
    id_estabelecimento integer auto_increment primary key,
    nome_estabelecimento varchar(40) NOT NULL,
    email_estabelecimento varchar(50) NOT NULL,
    contato_estabelecimento int(15),
    senha_estabelecimento varchar(50) NOT NULL,
    arquivo_servicos varchar(255)
);
CREATE TABLE IF NOT EXISTS agenday.endereco(
    id_endereco integer auto_increment primary key,
    cnpj int(20),
    endereco varchar(50),
    numero int(6),
    cep int(7),
    complemento varchar(50),
    cidade varchar(15),
    estado varchar(15)
);
CREATE TABLE IF NOT EXISTS agenday.servicos(
    id_servicos integer auto_increment primary key,
    nome_servico varchar(30),
    duracao_servico time,
    preco_servico float(10, 2),
    descricacao_servico varchar(100)
);
CREATE TABLE IF NOT EXISTS agenday.clientes(
    id_cliente integer auto_increment primary key,
    nome_cliente varchar(40) NOT NULL,
    email_cliete varchar(50) NOT NULL,
    contato_cliente int(15) NOT NULL,
    arquivo_cliente varchar(255)
);
CREATE TABLE if NOT EXISTS agenday.funcionarios(
    id_funcionario integer auto_increment primary key,
    nome_funcionario varchar(40),
    servico_funcionario varchar(30),
    contato_funcionario int(15) not null,
    arquivo_funcionario varchar(255)
);