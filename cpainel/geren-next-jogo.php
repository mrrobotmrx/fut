<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Futebol HD - ADM - Adicionar Jogos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
</head>
<body>
<div class="geren">
<p><a href="add-jogo.php">Adicionar Jogos</a></p>
<p><a href="geren-jogo.php">Gerenciar Jogos</a></p>
<p><a href="add-liga.php">Adicionar Ligas</a></p>
<p><a href="geren-liga.php">Gerenciar Ligas</a></p>
<p><a href="add-moments.php">Adicionar Melhores Momentos</a></p>
<p><a href="geren-moments.php">Gerenciar Melhores Momentos</a></p>
<p><a href="add-next-jogo.php">Adicionar Próximos Jogos</a></p>
<p><a href="index.php">Página Inicial</a></p>
</div>

<?php 
include("conect/conect.php");

try {
	if(!$con){
		echo "Não foi possivel conectar com Banco de Dados!";
    }	
    
    
    if(isset($_GET["id"])){
        $id = $_GET["id"];
    
        $stmt = $con->prepare('DELETE FROM nextjogos WHERE id = :id');
        $stmt->bindParam(':id', $id); 
        $stmt->execute();
    
        echo "<div style='margin-top:10px;' class='certo'>Postagem Excluido com Sucesso</div>"; 
    }


		$query = $con->prepare('SELECT * FROM `nextjogos`');
	
        $query->execute();

        while($result = $query->fetch()){
        
?>
        

    <div id="srfbdth">
        <div class="dados">
        <p><?php echo $result["inic_primeiro_time"]; ?> x <?php echo $result["inic_segundo_time"]; ?> </p>
        </div>
        <div class="opicoes">
            <span class="leftbuttom"> <a href="atual-next-jogo.php?id=<?php echo $result["id"]; ?>">Atualizar / Editar</a> </span>
            <span class="rightbuttom"> <a href="?id=<?php echo $result["id"]; ?>">Excluir</a> </span>
        </div>
    </div>

    <?php 
        }} catch (Exception $e) {
            echo "Erro: ". $e->getMessage();
        };
    ?>

</body>
</html>