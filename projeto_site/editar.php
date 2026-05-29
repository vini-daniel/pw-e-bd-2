<?php
$host='localhost';
$dbname='projeto_site';
$usuario='root';
$senha='';
$contato=null;

try{
    $conexao= new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_GET['id']) && is_numeric($_GET['id'])){
        $id=$_GET['id'];

        $sql="SELECT * FROM contatos WHERE ID = :id";
        $stmt= $conexao->prepare($sql);
        $stmt->bindParam(':id',$id, PDO::PARAM_INT);
        $stmt-> execute();

        $contato=$stmt->fetch(PDO::FETCH_ASSOC);

    }
    } catch(PDOException $e) {
        die("Erro na conexão:" .$e->getMessage());

    }

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Contato</title>
</head>
<body>
    <h2>Editar Contato</h2>
    <?php if ($contato): ?>
    <form action="atualizar.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $contato['id'];?>">


    <label>Nome:</label><br>
    <input type="text" name="nome" value="<?php echo htmlspecialchars($contato['nome']); ?>" required><br><br>
    
    <label>E-mail:</label><br>
    <input type="email" name="email" value="<?php echo htmlspecialchars($contato['email']); ?>" required><br><br>

    <label>Mensagem</label><br>
    <textarea name="mensagem" required><?php echo htmlspecialchars($contato['mensagem']); ?></textarea><br><br>
    <button type="submit">Salvar Alterações</button>
</form>
<?php else: ?>
<div style="color: red; border: 1px solid red; padding:10px;">
 <strong>Atenção:</strong> Contato não encontrado ou ID Inválido. Verifique se a URL está correta (ex: editar.php?id=1).
</div>
<?php endif; ?>
<br>
<a href="lista.php">Voltar para a lista</a>
   
</body>
</html>