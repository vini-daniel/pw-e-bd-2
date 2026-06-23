create database desafio_facil;
 DROP DATABASE IF exists desafio_facil;
 use desafio_facil;
DROP TABLE IF exists nota_fisica;
CREATE TABLE nota_fisica(
id int auto_increment primary key,
nome varchar(100) not null,
nota decimal(10,2),
curso varchar(100) not null,
idade int,
data_matricula DATE NOT NULL,
status_matricula varchar(100)
);
INSERT INTO nota_fisica(nome,nota,curso)values('Vinicius',10.0,'História',25),('Rodrigo',6.5,'Física',26),('Sophia',0.0,'Artes',30),('Laura',5.0,'Física',45);
update nota_fisica set nota=nota+1.5 where nota < 7.0 AND curso='Física';
delete from nota_fisica where nota=0.0 OR curso = 'Artes';
select nome,idade from alunos order by idade DESC LIMIT 3;
SELECT curso, AVG(nota) FROM alunos GROUP BY curso HAVING AVG(nota) > 7.0;
CREATE TABLE alunos_aprovados AS SELECT *FROM alunos WHERE nota >= 6.0;
UPDATE alunos
set status_matricula =
CASE
    when nota >= 6.0 THEN 'Concluido'
    ELSE 'Retido'
    end;
    DELETE FROM alunos
WHERE nota IS NULL AND curso = (SELECT curso FROM alunos WHERE nome = 'João'
);
-- Vinicius
-- Data: 22/06/2026
-- Matéria: Banco de Dados II
-- Camargo Aranha






      
      



