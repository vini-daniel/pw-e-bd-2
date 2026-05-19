CREATE DATABASE projeto_site;
 USE projeto_site;
 
 CREATE TABLE contatos(
 id INT auto_increment primary key,
 nome varchar(100) not null,
 email varchar(100) not null,
 mensagem text not null
 
 );
 