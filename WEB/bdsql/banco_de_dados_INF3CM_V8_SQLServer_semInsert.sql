--DELETE FROM tb_cliente_estacionamento WHERE id_cli2 = 2  --exemplo de como eliminar um insert de uma tabela





use master
go
drop database ESTACIONAMENTO_INF3CM 
go
create database ESTACIONAMENTO_INF3CM 
go
use ESTACIONAMENTO_INF3CM 
go
 create table tb_endereco (
id_endereco int primary key not null,
bairro varchar(40) not null,
cidade varchar(40) not null,
numero int not null,
complemento varchar(10) null,
rua int not null
);
go
create table tb_telefone (
id_telefone int primary key not null,
numero int not null,
dd int null 
);
go
create table tb_cliente_estacionamento(
id_cli2 int primary key not null,
razao_social varchar(40) not null,
nome_fantasia varchar(40) not null,
cnpj int not null,
id_endereco int not null,
constraint fk_cli2_endereco foreign key(id_endereco)
references tb_endereco (id_endereco),
id_telefone int not null, 
constraint fk_cli2_telefone foreign key (id_telefone)
references tb_telefone (id_telefone),
);
go
create table tb_vaga(
id_vaga int primary key not null,
valor int not null,
id_cli2 int not null,
constraint fk_cli2_vaga foreign key(id_cli2)
references tb_cliente_estacionamento (id_cli2)
);
go
create table tb_login(
id_login int primary key not null,
nivel_acesso varchar(40) not null,
senha varchar(40) not null,
usuario varchar(40) not null
); 
go
create table tb_respons�vel(
id_responsavel int primary key not null,
nome varchar(40) not null,
email varchar(40) not null,
id_login int not null,
constraint fk_login_responsavel foreign key(id_login)
references tb_login (id_login),
id_cli2 int not null,
constraint fk_cli2_responsavel foreign key(id_cli2)
references tb_cliente_estacionamento (id_cli2)
);
go
create table tb_cliente_Estacionar(
id_cli1 int primary key identity not null,
email varchar(40) not null,
nome varchar(40) not null,
cpf int not null,
id_login int not null,
constraint fk_login_cliente_estaciona foreign key(id_login)
references tb_login (id_login),
id_telefone int not null, 
constraint fk_cli_telefone foreign key (id_telefone)
references tb_telefone (id_telefone)
);
go
create table tb_reserva(
id_reserva int primary key not null,
id_cli1 int not null, 
constraint fk_cli_estacionar foreign key (id_cli1)
references tb_cliente_estacionar (id_cli1),
id_cli2 int not null, 
constraint fk_cli_estacionamento foreign key (id_cli2)
references tb_cliente_estacionamento (id_cli2)
);
go
create table tb_forma_de_pagamento(
id_forma_pagamento int primary key not null,
tipo_de_pagamento varchar(25) not null
);
go
create table tb_pagamento(
id_pagamento int primary key not null,
valor int not null,
id_forma_pagamento int not null,
constraint  fk_forma_pagamento foreign key(id_forma_pagamento)
references tb_forma_de_pagamento (id_forma_pagamento),
id_reserva int  not null,
constraint fk_reserva foreign key(id_reserva)
references tb_reserva (id_reserva)
);
go
create table tb_marca(
id_marca int primary key not null,
nome varchar(40) not null
);
go
create table tb_modelo(
id_modelo int primary key not null,
nome_modelo varchar(40) not null,
id_marca int not null,
constraint fk_marca foreign key(id_marca)
references tb_marca (id_marca)
);
go
create table tb_veiculo(
id_carro int primary key not null,
id_cli1 int not null, 
constraint fk_cli_veiculo foreign key (id_cli1)
references tb_cliente_estacionar (id_cli1),
id_modelo int not null,
constraint fk_modelo_veiculo foreign key(id_modelo)
references tb_modelo (id_modelo),
placa varchar(40) not null,
cor varchar(40) not null
);
go
create table tb_entrada_controle_saida(
id_controle int primary key not null,
horario_data_saida varchar(40) not null,
horario_data_entrada varchar(40) not null,
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
id_cupon int primary key not null,
valor int not null, -- reserva e estacionamento
id_reserva int not null,
constraint fk_reserva_cupon foreign key(id_reserva)
references tb_reserva (id_reserva),
id_controle int not null,
constraint fk_cupons_entrada foreign key(id_controle)
references tb_entrada_controle_saida (id_controle)
);
create table tb_avaliacao (
id_avaliacao int primary key not null,
valor varchar(10) not null, -- reserva e estacionamento
id_reserva int not null,
constraint fk_reserva_avaliacao foreign key(id_reserva)
references tb_reserva (id_reserva),
id_controle int not null,
constraint fk_avaliacao_entrada foreign key(id_controle)
references tb_entrada_controle_saida (id_controle)
);