<?php

$host = 'localhost';
$dbname = 'projeto_site';
$usuario = 'root';
$senha = '';

try {
    $conexao = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());}

    //SELECT
    $sql = "SELECT id, nome, email, mensagem FROM contatos";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    
    //Guardando o resultado
    $mensagens = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
 <head>
    <meta charset="UTF-8">
    <title>Painel de Mensagens</title>
  <style>

    body { 
    font-family: Arial, sans-serif; 
    padding: 20px; 
    }
    
    table {
     width: 100%; 
     border-collapse: collapse; 
     margin-top: 20px; 
     }
     
    th, td {
     border: 1px solid #ccc; 
     padding: 10px; 
     text-align: left; 
     }
     
    th { 
     background-color: #333; 
     color: white; 
     }
     
    tr:nth-child(even) { 
     background-color: #f9f9f9; 
     }
  </style>

</head>
<body>
    <h2>Mensagens Interceptadas (Banco de Dados)</h2>
    <table>
   <tr>
    <th>ID</th>
    <th>Nome/Sobrevivente</th>
    <th>E-mail de Contato</th>
    <th>Conteúdo da Mensagem</th>
   </tr>
   
   <?php foreach ($mensagens as $linha): ?>
   <tr>
    <td><?php echo $linha['id']; ?></td>
    <td><?php echo $linha['nome']; ?></td>
    <td><?php echo $linha['email']; ?></td>
    <td><?php echo $linha['mensagem']; ?></td>

    <td>
      <a href="editar.php?id=<?php echo $linha['id']; ?>" class="btn-editar">Editar</a>

      <a href="deletar.php?id=<?php echo $linha['id']; ?>" class="btn-excluir" onclick="return confirm('Tem certeza que deseja excluir este sobrevivente/mensagem?');">Excluir</a>
    </td>
   </tr>
   <?php endforeach; ?>

   </table>
   
   <br>
   <a href="index.html">Voltar para o Formulário</a>

<footer>Vinicius Daniel Bezerra Pinheiro - Camargo Aranha - 2026</footer>
</body>
</html>