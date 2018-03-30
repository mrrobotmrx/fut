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
<p><a href="index.php">Página Inicial</a></p>
<p><a href="geren-jogo.php">Gerenciar Jogos</a></p>
<p><a href="add-liga.php">Adicionar Ligas</a></p>
<p><a href="geren-liga.php">Gerenciar Ligas</a></p>
<p><a href="add-moments.php">Adicionar Melhores Momentos</a></p>
<p><a href="geren-moments.php">Gerenciar Melhores Momentos</a></p>
<p><a href="add-next-jogo.php">Adicionar Próximos Jogos</a></p>
<p><a href="geren-next-jogo.php">Gerenciar Próximos Jogos</a></p>
</div>

    <?php
         if(isset($_POST["enviar"])){

            $foto_comp = $_POST["foto_comp"];
            $nome_comp = $_POST["nome_comp"];
            $hora_jogo = $_POST["hora_jogo"];
            $foto_tim_1 = $_POST["foto_tim_1"];
            $inic_tim_1 = $_POST["inic_tim_1"];
            $gols_tim_1 = $_POST["gols_tim_1"];
            $placar = $_POST["placar"];
            $modo_jog = $_POST["modo_jog"];
            $foto_tim_2 = $_POST["foto_tim_2"];
            $inic_tim_2 = $_POST["inic_tim_2"];
            $gols_tim_2 = $_POST["gols_tim_2"];
            $liga = $_POST["liga"];
            $modo = $_POST["modo"];
            $fale_jogos = $_POST["fale_jogos"];
            $link = $_POST["link"];
            $confronto = $_POST["confronto"];

            $stmt = $con->prepare('INSERT INTO `jogos`(`foto_liga`, `nome_liga`, `horario`, `foto_primeiro_time`, `inic_primeiro_time`, `quem_fez_gols_1`, `placar`, `modo_jogo`, `foto_segundo_time`, `inic_segundo_time`, `quem_fez_gols_2`, `campeonato`, `como`, `fale_jogos`, `links`, `confronto`) VALUES (:foto_liga, :nome_liga ,:horario ,:foto_primeiro_time ,:inic_primeiro_time ,:quem_fez_gols_1 ,:placar ,:modo_jogo ,:foto_segundo_time ,:inic_segundo_time ,:quem_fez_gols_2 ,:campeonato, :como, :fale_jogos, :link, :confronto)');
            $stmt->execute(array(
                ':foto_liga' => $foto_comp,
                ':nome_liga' => $nome_comp,
                ':horario' => $hora_jogo,
                ':foto_primeiro_time' => $foto_tim_1,
                ':inic_primeiro_time' => $inic_tim_1,
                ':quem_fez_gols_1' => $gols_tim_1,
                ':placar' => $placar,
                ':modo_jogo' => $modo_jog,
                ':foto_segundo_time' => $foto_tim_2,
                ':inic_segundo_time' => $inic_tim_2,
                ':quem_fez_gols_2' => $gols_tim_2,
                ':campeonato' => $liga,
                ':como' => $modo,
                ':fale_jogos' => $fale_jogos,
                ':link' => $link,
                ':confronto' => $confronto
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
                <textarea name="gols_tim_1" id="time1gols" placeholder="Quem fez Gol ?"></textarea>
            </div>

            <div class="wefsrgt">
                <input type="text" class="sdvdsdvss" placeholder="Placar" name="placar">
                <input type="text" class="sdvdsdsvs" placeholder="Modo do Jogo" name="modo_jog">
            </div>

            <div id="sgdrgdtrg">
                <input type="text" class="sdvsdvdds" placeholder="Foto do Segundo Time" name="foto_tim_2">
                <input type="text" class="sdvsdss" placeholder="Inicial do Segundo Time" name="inic_tim_2">
                <textarea name="gols_tim_2" id="time2gols" placeholder="Quem fez Gol ?"></textarea>
            </div>
        </div>

        <div class="sgfsrgr">
        <div class="aefaef">
            <select name="liga" id="sdgdsg">

            <?php
            $query = $con->prepare('SELECT * FROM `ligas` ORDER BY id DESC');

            $query->execute();

		    while($result = $query->fetch()){ 

            ?>
                <option value="<?php echo $result['id']; ?>"><?php echo $result["nome_liga"]; ?></option>

            <?php
                }
            ?>
            </select>
        </div>

        <div class="aefaef">
            <select name="modo" id="sdgdsg">
                <option value="1">Ao Vivo</option>
                <option value="2">Encerrado</option>
            </select>
        </div>

        </div>

        <div class="escr">
            <textarea name="fale_jogos" id="falemais" placeholder="Diga Alguma Coisa Sobre o Jogo."></textarea>
        </div>

        <div class="dados_b_l">
            <input type="text" placeholder="Url Jogo" name="link" class="dhfyjfy">
            <input type="text" placeholder="Confronto" name="confronto" class="dhfyjfy">
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