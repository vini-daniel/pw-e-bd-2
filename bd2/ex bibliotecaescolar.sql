DROP DATABASE IF EXISTS Bibliotecaescolar;
CREATE DATABASE BibliotecaEscolar;
USE BibliotecaEscolar;

CREATE TABLE Livros(

 id_livro INT AUTO_INCREMENT primary key,
 titulo VARCHAR(50) NOT NULL,
 autor VARCHAR(100) NOT NULL,
 ano_publicação INT,
 quantidade_estoque INT
 );
 
INSERT INTO Livros(titulo,autor,ano_publicação,quantidade_estoque)
VALUES('Harry Potter e a pedra filosofal','JK Rowling','1997',7),
      ('Harry Potter e o Enigma do Principe','JK Rowling','2005',6),
      ('Harry Potter e a Ordem da Fenix','JK Rowling','2003',1);
      
SELECT* FROM Livros WHERE ano_publicação >=2000;
SELECT* FROM Livros ORDER BY titulo ASC;

UPDATE Livros
SET quantidade_estoque =6
WHERE id_livro =1;
DELETE FROM Livros
WHERE id_livro=3;
