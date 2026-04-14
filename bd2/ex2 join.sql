DROP TABLE IF EXISTS jogadores;
create table Jogadores (

id_jogador INT PRIMARY KEY,
nome_usuario varchar(50)
);
DROP TABLE IF EXISTS jogos;
CREATE TABLE Jogos (
id_jogo INT PRIMARY KEY,
titulo varchar(50),
preço DECIMAL(10,2)
);
DROP TABLE IF EXISTS Compras;
CREATE TABLE Compras (
id_compra INT primary key,
id_jogador_fk int,
id_jogo_fk int
);
 
insert into Jogadores
values(1,'demo'), (2,'lidor'), (3,'viuva');

insert into Jogos
values  (10,'negra',150.00), (20,'he',80.00),(30,'roi',120.00);

insert into Compras
values (101,1,10),(102,2,20),(103,2,30);