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
<p><a href="add-liga.php">Adicionar Ligas</a></p>
<p><a href="geren-liga.php">Gerenciar Ligas</a></p>
<p><a href="add-moments.php">Adicionar Melhores Momentos</a></p>
<p><a href="geren-moments.php">Gerenciar Melhores Momentos</a></p>
<p><a href="index.php">Página Inicial</a></p>
<p><a href="geren-next-jogo.php">Gerenciar Próximos Jogos</a></p>
</div>

    <?php
         if(isset($_POST["enviar"])){

            $foto_comp = $_POST["foto_comp"];
            $nome_comp = $_POST["nome_comp"];
            $hora_jogo = $_POST["hora_jogo"];
            $foto_tim_1 = $_POST["foto_tim_1"];
            $inic_tim_1 = $_POST["inic_tim_1"];
            $foto_tim_2 = $_POST["foto_tim_2"];
            $inic_tim_2 = $_POST["inic_tim_2"];
            $placar = $_POST["placar"];

            $stmt = $con->prepare('INSERT INTO `nextjogos`(`foto_liga`, `nome_liga`, `horario`, `foto_primeiro_time`, `inic_primeiro_time`, `foto_segundo_time`, `inic_segundo_time`, `data_jogo`) VALUES (:foto_liga, :nome_liga ,:horario ,:foto_primeiro_time ,:inic_primeiro_time ,:foto_segundo_time ,:inic_segundo_time, :data_jogo)');
            $stmt->execute(array(
                ':foto_liga' => $foto_comp,
                ':nome_liga' => $nome_comp,
                ':horario' => $hora_jogo,
                ':foto_primeiro_time' => $foto_tim_1,
                ':inic_primeiro_time' => $inic_tim_1,
                ':foto_segundo_time' => $foto_tim_2,
                ':inic_segundo_time' => $inic_tim_2,
                ':data_jogo' => $placar
              ));
   
            echo "<div class='certo'>Cadastrado com Sucesso</div>"; 
         }
    ?>

    <form action="" class="sgsdrgn" method="post">
        <div id="dados_top">
            <input type="text" class="sdvsdv" placeholder="Foto da Liga" name="foto_comp">
            <input type="text" class="aefserf" placeholder="Nome da Liga" name="nome_comp">
            <input type="text" class="srgdth" placeholder="Horário da Partida" name="hora_jogo">
        </div>

        <div class="dados_times">
            <div id="dbrgjbrig">
                <input type="text" class="sdvsdvs" placeholder="Foto do Primeiro Time" name="foto_tim_1">
                <input type="text" class="sdvdsdvs" placeholder="Inicial do Primeiro Time" name="inic_tim_1">
            </div>

            <div class="wefsrgt">
                <input type="text" class="sdvdsdvss" placeholder="Data do Jogo" name="placar">
            </div>

            <div id="sgdrgdtrg">
                <input type="text" class="sdvsdvdds" placeholder="Foto do Segundo Time" name="foto_tim_2">
                <input type="text" class="sdvsdss" placeholder="Inicial do Segundo Time" name="inic_tim_2">
            </div>
        </div>

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