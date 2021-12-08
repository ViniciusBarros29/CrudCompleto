<!DOCTYPE html>
<?php
include_once "acao.php";
$acao = isset($_GET['acao']) ? $_GET['acao'] : "";
$dados;
if ($acao == 'editar'){
    $codigo = isset($_GET['codigo']) ? $_GET['codigo'] : "";
    if ($codigo > 0)
        $dados = buscarDados($codigo);
}
//var_dump($dados);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Candidatos</title>
    <body style="background-color:lightgray;">
    <script>
        function validaPagina(){
    		var objNome = document.getElementById("descricao");
    		if (objNome.value == ""){
    			alert("Informe a descrição");
    			objNome.focus();
    			return false;
    		}
    		return true;
    	} 
    </script>
</head>
<body>
    
    <center> 
        <h1>VOTAÇÃO PARA REPRESENTANTE DE TURMA</h1>
        <BR>
        <img src="https://cecom.ifc.edu.br/wp-content/uploads/sites/17/2015/10/Logo_IFC_vertical.png">
        <br>
        <hr>
        <h2> Caso deseje se candidatar sem uma equipe definida insira seu nome</h2>
    <form action="acao.php" method="post">
    <input readonly  type="text" name="codigo" id="codigo" value="<?php if ($acao == "editar") echo $dados['codigo']; else echo 0; ?>"><br>
    Insira seu nome: <input required=true   type="text" name="descricao" id="descricao" value="<?php if ($acao == "editar") echo $dados['descricao']; ?>"><br>
    <br><button type="submit" name="acao" id="acao" value="salvar" onclick="return validaPagina();">Salvar</button>
</form>
    <hr>
    <h2> Caso não, acesse o link abaixo para realizar o seu voto.
    <h2>
<button>
<a href="candidatos.php">Votar</a>
</br>
    </h3>
    </button>
    <hr>
    <b>
    <h4><i>O meu ideal político é a democracia, para que todo o homem seja respeitado como indivíduo e nenhum venerado.</i></h4>
    <h5>                                                                                                        Albert Einstein</h5>
    <hr>
    </b>
    </center>
</body>
</html>