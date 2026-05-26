<?php
$host='localhost';
$dbname='projeto_site';
$usuario='root';
$senha='';

try {
    $conexao =new PDO ("mysql:host=$host;dbname=$dbname;charset=utf8", $usuario, $senha);
    $conexao-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch(PDOexcpeption $e) {
    die("Erro ao conectar com o banco de dados:" . $e-> getMessage());

}

if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $nome_recebido= $_POST['nome'];
    $email_recebido=$_POST['email'];
    $mensagem_recebida=$_POST['mensagem'];

    $sql="INSERT INTO contatos(nome,email,mensagem) VALUES (:nome, :email, :mensagem)";
    $stmt=$conexao ->prepare($sql);

    $stmt-> bindParam(':nome', $nome_recebido);
    $stmt-> bindParam(':email',$email_recebido);
    $stmt -> bindParam(':mensagem', $mensagem_recebida);

    if ($stmt->execute()) {
        echo "<h1>sucesso!</h1>";
        echo "<p>Dados salvos no banco de dados.</p>";
        echo "<a href='index.html'>Voltar</a>";

    } else {
        echo "erro ao tentar salvar os dados.";
    }
}

?>