<!DOCTYPE html>
<?php 
    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";
    $title = "Votação";
    $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : "2";
    $voto = isset($_POST['voto']) ? $_POST['voto'] : "";
    $procurar = isset($_POST['procurar']) ? $_POST['procurar'] : "";
    $nomecandidato = "";
	if (isset($_POST['nomecandidato'])){
		$nomecandidato = $_POST['nomecandidato'];
	}
?>
<html lang="pt-br">
<head>
<body style="background-color:lightgray;">
    <meta charset="UTF-8">
    <title> <?php echo $title; ?> </title>
    <script>
        function excluirRegistro(url){
            if (confirm("Confirma Exclusão?"))
                location.href = url;
        }
    </script>
</head>
<body>
    <center>
        <hr>
        <img src="https://c.tenor.com/PtCTILwjEmUAAAAM/be-patient-with-democracy-be-patient.gif">
        <hr>
    <h2>Abaixo selecione como deseja vizualizar os candidatos e observe a lista de opções.</h2>
<form method="post">
    <input type="radio" name="tipo" id="tipo" value="1" <?php if ($tipo == 1) { echo "checked"; }?>>Numero<br>  
    <input type="radio" name="tipo" id="tipo" value="2" <?php if ($tipo == 2) { echo "checked"; }?>>Nome<br>
    <input type="radio" name="tipo" id="tipo" value="3" <?php if ($tipo == 3) { echo "checked"; }?>>Equipe<br>
    <input type="text" name="procurar" id="procurar" value="<?php echo $procurar; ?>">
    <input type="submit" value="Consultar">
    <hr>
</form>
<br>
<?php
    $sql = "";
    if ($tipo == 1){
        $sql = "SELECT * FROM candidato WHERE id = '$procurar' ORDER BY id";
    }elseif ($tipo == 2){    
        $sql = "SELECT * FROM candidato WHERE nome LIKE '$procurar%' ORDER BY nome";
    }else {
        $sql = "SELECT * FROM candidato WHERE equipe LIKE '$procurar%' ORDER BY nome";
    }

    $pdo = Conexao::getInstance();
    $consulta = $pdo->query($sql);
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <tr><td><?php echo "Nome do Candidato: "?> <?php echo $linha['id'];?><br></td>
            <td><?php echo "Número do Candidato: "?><?php echo $linha['nome'];?><br></td>
            <td><?php echo "Equipe do Candidato: "?><?php echo $linha['equipe']?><br></td>
            <td><a href='inicio.php?acao=editar&codigo=<?php echo $linha['id'];?>'><img class="icon" src="img/edit.png" alt=""></a></td>
            <td><a href="javascript:excluirRegistro('acao.php?acao=excluir&codigo=<?php echo $linha['id'];?>')"><img class="icon" src="img/delete.png" alt=""></a></td>
            <hr>
        </tr>
    <?php } ?> 

<h3>PS: Caso tenha se Candidatado por engano clique no icone vermelho de exclusão abaixo das suas informações e caso deseje alterar alguma informação clique em no icone com lapis de alteração</h3>
<hr>
<h2>Caso tenha se candidatado recentemente escreva seu nome</h2>
    <form method="post">
        <input type="text" name="nomecandidato">
        <input type="submit" value="Enviar">
    </form>
<hr>
    <h2>Tendo Observado a Lista escolha uma das opções de canditados.</h2>
<form method="post">
    <input type="radio" name="voto" id="voto" value="1" <?php if ($voto == 1) { echo "checked"; }?>>Julia<br>  
    <input type="radio" name="voto" id="voto" value="2" <?php if ($voto == 2) { echo "checked"; }?>>Lucia<br>
    <input type="radio" name="voto" id="voto" value="3" <?php if ($voto == 3) { echo "checked"; }?>>Maria<br>
    <input type="radio" name="voto" id="voto" value="3" <?php if ($voto == 3) { echo "checked"; }?>><?php echo $nomecandidato; ?><br>
    <input type="submit" value="Votar" checked>
    
</form>
<hr>
    <h3> Caso ainda deseje se candidatar volte ao início através deste botão:<h3>
    <button>
    <a href="inicio.php">Voltar</a>
    </button>
    <hr>
</center>
</body>
</html>