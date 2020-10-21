use master
go
drop database ESTACIONAMENTO_INF3CM 
go
create database ESTACIONAMENTO_INF3CM 
go
use ESTACIONAMENTO_INF3CM 
go
 create table tb_endereco (
id_endereco  int identity primary key not null,
bairro varchar(50) not null,
cidade varchar(50) not null,
UF char (2) not null,
numero int not null,
complemento varchar(50) null,
rua varchar(100) not null
);
go
create table tb_telefone (
id_telefone int identity primary key not null,
numero varchar(11) not null,

);
go
create table tb_cliente_estacionamento(
id_cli2 int identity primary key not null,
razao_social varchar(255) not null,
nome_fantasia varchar(255) not null,
cnpj varchar(18) not null,
id_endereco int not null,
constraint fk_cli2_endereco foreign key(id_endereco)
references tb_endereco (id_endereco),
id_telefone int not null, 
constraint fk_cli2_telefone foreign key (id_telefone)
references tb_telefone (id_telefone),
);
go
create table tb_vaga(
id_vaga int identity primary key not null,
valor decimal not null,
id_cli2 int not null,
constraint fk_cli2_vaga foreign key(id_cli2)
references tb_cliente_estacionamento (id_cli2)
);
go
create table tb_nivel_acesso(
id_nivel_acesso int identity primary key not null,
descricao varchar(100) not null
);
-- Niveis de acesso pré-definidos
INSERT INTO tb_nivel_acesso (valor, descricao) VALUES (1, 'Administrador');
INSERT INTO tb_nivel_acesso (valor, descricao) VALUES (2, 'Acesso completo');
INSERT INTO tb_nivel_acesso (valor, descricao) VALUES (3, 'Controle Entrada e Saída');
INSERT INTO tb_nivel_acesso (valor, descricao) VALUES (1, 'Suporte');
go
create table tb_login(
id_login  int identity primary key not null,
senha varchar(32) not null,
usuario varchar(255) not null,
id_nivel_acesso int not null,
constraint fk_login_nivel_acesso foreign key(id_nivel_acesso)
references tb_nivel_acesso (id_nivel_acesso)
); 
go
create table tb_cargo(
id_cargo int identity primary key not null,
descricao varchar(100) not null
);
go
create table tb_responsavel(
id_responsavel int identity primary key not null,
nome varchar(255) not null,
email varchar(100) not null,
id_login int not null,
constraint fk_login_responsavel foreign key(id_login)
references tb_login (id_login),
id_cli2 int not null,
constraint fk_cli2_responsavel foreign key(id_cli2)
references tb_cliente_estacionamento (id_cli2),
id_telefone int not null, 
constraint fk_responsavel_telefone foreign key (id_telefone)
references tb_telefone (id_telefone),
id_cargo int not null,
constraint fk_cargo_responsavel foreign key(id_cargo)
references tb_cargo (id_cargo)
);
go
create table tb_cliente_estacionar(
id_cli1 int identity primary key  not null,
email varchar(100) not null,
nome varchar(255) not null,
cpf varchar(11) not null,
id_login int not null,
constraint fk_login_cliente_estaciona foreign key(id_login)
references tb_login (id_login),
id_telefone int not null, 
constraint fk_cli_telefone foreign key (id_telefone)
references tb_telefone (id_telefone)
);
go
create table tb_reserva(
id_reserva int identity primary key not null,
id_cli1 int not null, 
constraint fk_cli_estacionar foreign key (id_cli1)
references tb_cliente_estacionar (id_cli1),
id_cli2 int not null, 
constraint fk_cli_estacionamento foreign key (id_cli2)
references tb_cliente_estacionamento (id_cli2)
);
go
create table tb_forma_de_pagamento(
id_forma_pagamento int identity primary key not null,
nome_forma_pagamento varchar(255) not null
);
go
create table tb_pagamento(
id_pagamento int identity primary key not null,
valor decimal not null,
id_forma_pagamento int not null,
constraint  fk_forma_pagamento foreign key(id_forma_pagamento)
references tb_forma_de_pagamento (id_forma_pagamento),
id_reserva int  not null,
constraint fk_reserva foreign key(id_reserva)
references tb_reserva (id_reserva)
);
go
create table tb_marca(
id_marca int identity primary key not null,
nome varchar(255) not null
);
go
create table tb_modelo(
id_modelo int identity primary key not null,
nome_modelo varchar(255) not null,
id_marca int not null,
constraint fk_marca foreign key(id_marca)
references tb_marca (id_marca)
);
go
create table tb_veiculo(
id_carro int identity primary key not null,
id_cli1 int not null, 
constraint fk_cli_veiculo foreign key (id_cli1)
references tb_cliente_estacionar (id_cli1),
id_modelo int not null,
constraint fk_modelo_veiculo foreign key(id_modelo)
references tb_modelo (id_modelo),
placa char(7) not null,
cor varchar(100) not null
);
go
create table tb_entrada_controle_saida(
id_controle int identity primary key not null,
horario_data_saida datetime not null,
horario_data_entrada datetime not null,
id_vaga int not null,
constraint fk_vaga_entrada foreign key(id_vaga)
references tb_vaga (id_vaga),
id_carro int not null,
constraint fk_carro_entrada foreign key(id_carro)
references tb_veiculo (id_carro),
id_reserva int not null,
constraint fk_reserva_entrada foreign key(id_reserva)
references tb_reserva (id_reserva)
);
go
create table tb_cupons (
id_cupom int identity primary key not null,
valor int not null, -- reserva e estacionamento
id_reserva int not null,
constraint fk_reserva_cupom foreign key(id_reserva)
references tb_reserva (id_reserva),
id_controle int not null,
constraint fk_cupons_entrada foreign key(id_controle)
references tb_entrada_controle_saida (id_controle)
);
go
create table tb_avaliacao (
id_avaliacao int identity primary key not null,
valor tinyint not null, -- reserva e estacionamento
id_reserva int not null,
constraint fk_reserva_avaliacao foreign key(id_reserva)
references tb_reserva (id_reserva),
id_controle int not null,
constraint fk_avaliacao_entrada foreign key(id_controle)
references tb_entrada_controle_saida (id_controle)
);
create table tb_contato (
id_contato int primary key not null, 
email_contato varchar(40),
 msg_contato varchar (255),
 id_responsavel int not null,
constraint fk_contato_respon foreign key(id_responsavel)
references tb_responsavel (id_responsavel)

);