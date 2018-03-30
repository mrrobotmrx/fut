<?php 
 header('Access-Control-Allow-Origin: *'); 
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
<p><a href="index.php">Página Inicial</a></p>
<p><a href="geren-moments.php">Gerenciar Melhores Momentos</a></p>
<p><a href="add-next-jogo.php">Adicionar Próximos Jogos</a></p>
<p><a href="geren-next-jogo.php">Gerenciar Próximos Jogos</a></p>
</div>

    <?php
         if(isset($_POST["enviar"])){

            $foto_moment = $_POST["foto_moments"];
            $titulo_moment = $_POST["titulo_moments"];
            $text_moment = $_POST["moments_text"];
            $video_moment = $_POST["url_video"];                

            $stmt = $con->prepare('INSERT INTO `moments`( `foto_moment`, `titulo_moment`, `text_moment`, `video_moment`) VALUES (:foto_moment, :titulo_moment, :text_moment, :video_moment)');
            $stmt->execute(array(
                ':foto_moment' => $foto_moment,
                ':titulo_moment' => $titulo_moment,
                ':text_moment' => $text_moment,
                ':video_moment' => $video_moment
              ));
   
            echo "<div class='certo'>Cadastrado com Sucesso</div>"; 
         }
    ?>

    <form action="#" class="sgsdrgn" method="post">
        <div id="dados_top">
            <input type="text" class="ssss" placeholder="Foto de Capa" name="foto_moments">
            <input type="text" class="ssss" placeholder="Título" name="titulo_moments">
            <input type="text" class="ssss" placeholder="Vídeo" name="url_video">
            <textarea name="moments_text" id="cgfftghrff" placeholder="Texto"></textarea>
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