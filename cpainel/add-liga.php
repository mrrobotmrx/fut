<?php 
 
 include("conect/conect.php");
try{

?>
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
<p><a href="index.php">Página Inicial</a></p>
<p><a href="geren-liga.php">Gerenciar Ligas</a></p>
<p><a href="add-moments.php">Adicionar Melhores Momentos</a></p>
<p><a href="geren-moments.php">Gerenciar Melhores Momentos</a></p>
<p><a href="add-next-jogo.php">Adicionar Próximos Jogos</a></p>
<p><a href="geren-next-jogo.php">Gerenciar Próximos Jogos</a></p>
</div>

    <?php
         if(isset($_POST["enviar"])){

            $foto_liga = $_POST["foto_liga"];
            $nome_liga = $_POST["nome_liga"];

            $stmt = $con->prepare('INSERT INTO `ligas`(`foto_liga`, `nome_liga`) VALUES (:foto_liga, :nome_liga)');
            $stmt->execute(array(
                ':foto_liga' => $foto_liga,
                ':nome_liga' => $nome_liga
              ));
   
            echo "<div class='certo'>Cadastrado com Sucesso</div>"; 
         }
    ?>

    <form action="#" class="sgsdrgn" method="post">
        <div id="dados_top">
            <input type="text" class="sdvsdv" placeholder="Foto da Liga" name="foto_liga">
            <input type="text" class="aefserf" placeholder="Nome da Liga" name="nome_liga">
        </div>

        <br>

        <div class="enviar">
            <button name="enviar">Enviar</button>
        </div>
    </form>

    <?php

            } catch (Exception $e) {
                echo "Erro: ". $e->getMessage();
            };
        ?>

</body>
</html>