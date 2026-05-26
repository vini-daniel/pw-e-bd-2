<?php
 $host='localhost'; 
 $dbname='projeto_site';
 $usuario='root';
 $senha='';

 try {
    $conexao=new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $usuario,$senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      if(isset($_POST['id'], $_POST['nome'], $_POST['email'], $_POST['mensagem'])) {

    $id= $_POST['id'];
    $nome =$_POST['nome'];
    $email = $_POST['email'];
    $mensagem= $_POST['mensagem'];
  
    $sql= "UPDATE contatos SET NOME = :nome, EMAIL=:email, MENSAGEM= :mensagem WHERE ID= :id";
    $stmt= $conexao->prepare($sql);

    $stmt->bindParam(':nome', $nome);
    $stmt->bnindParam(':email', $email);
    $stmt->bindParam(':mensagem', $mensagem);
    $stmt->bindParam(':id', $id, PDO:: PARAM_INT);
    
    $stmt->execute();

    header('Location: listar.php');
    exit();
    } 
    else{
      echo"Acesso inválido ou dados incompletos.";

   }
 
  } catch (PDOException $e) {
   die("Erro ao atualizar: " . $e->getMessage());
  }
 ?>
