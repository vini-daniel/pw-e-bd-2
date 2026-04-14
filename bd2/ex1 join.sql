CREATE TABLE Jogadores(

id_aluno INT PRIMARY KEY,
nick_name varchar(50)
);
 
 CREATE TABLE Skins (
 
id_skin int PRIMARY KEY,
nome_skin varchar(50),
id_dono int
);

select*from Jogadores;
 
insert into Jogadores  
values(1,'Capitão'), (2,'América'), (3,'Homem');

insert into Skins
values (10,'De ferro',1),(11,'homem aranha',2);

select Jogadores.nick_name,Skins.nome_skin
from Jogadores 
left join Skins on Jogadores.id_aluno=Skins.id_dono;