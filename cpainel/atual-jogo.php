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
<p><a href="add-jogo.php">Adicionar Jogos</a></p>
<p><a href="geren-jogo.php">Gerenciar Jogos</a></p>
<p><a href="add-liga.php">Adicionar Ligas</a></p>
<p><a href="geren-liga.php">Gerenciar Ligas</a></p>
<p><a href="add-moments.php">Adicionar Melhores Momentos</a></p>
<p><a href="geren-moments.php">Gerenciar Melhores Momentos</a></p>
<p><a href="add-next-jogo.php">Adicionar Próximos Jogos</a></p>
<p><a href="geren-next-jogo.php">Gerenciar Próximos Jogos</a></p>
</div>

    <?php
         if(isset($_POST["Atualizar"])){

                $id = $_GET["id"];

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

            $stmt = $con->prepare('UPDATE `jogos` SET `foto_liga`=:foto_liga,`nome_liga`=:nome_liga,
            `horario`=:horario,`foto_primeiro_time`=:foto_primeiro_time,`inic_primeiro_time`=:inic_primeiro_time,
            `quem_fez_gols_1`=:quem_fez_gols_1,`placar`=:placar,`modo_jogo`=:modo_jogo,`foto_segundo_time`=:foto_segundo_time,
            `inic_segundo_time`=:inic_segundo_time,`quem_fez_gols_2`=:quem_fez_gols_2,`campeonato`=:campeonato,`como`=:como,
            `fale_jogos`=:fale_jogos,`links`=:link,`confronto`=:confronto WHERE id = '.$_GET["id"]);
           
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
   
            echo "<div class='certo'>Atualizado com Sucesso</div>"; 
         }

         if(isset($_GET["id"])){
            $id = $_GET["id"];
        
            $stmt = $con->prepare('SELECT * FROM jogos WHERE id = :id');
            $stmt->bindParam(':id', $id); 
            $stmt->execute();}

            while($result = $stmt->fetch()){
        

    ?>

    <form action="" class="sgsdrgn" method="post">
        <div id="dados_top">
            <input type="text" class="sdvsdv" placeholder="Foto da Liga" value="<?php echo $result["foto_liga"];?>" name="foto_comp">
            <input type="text" class="aefserf" value="<?php echo $result["nome_liga"];?>" placeholder="Nome da Liga" name="nome_comp">
            <input type="text" class="srgdth" placeholder="Horário da Partida" value="<?php echo $result["horario"];?>" name="hora_jogo">
        </div>

        <div class="dados_times">
            <div id="dbrgjbrig">
                <input type="text" value="<?php echo $result["foto_primeiro_time"];?>" class="sdvsdvs" placeholder="Foto do Primeiro Time" name="foto_tim_1">
                <input type="text" value="<?php echo $result["inic_primeiro_time"];?>" class="sdvdsdvs" placeholder="Inicial do Primeiro Time" name="inic_tim_1">
                <textarea name="gols_tim_1" id="time1gols" placeholder="Quem fez Gol ?">
                <?php echo $result["quem_fez_gols_1"];?>
                </textarea>
            </div>

            <div class="wefsrgt">
                <input type="text" value="<?php echo $result["placar"];?>" class="sdvdsdvss" placeholder="Placar" name="placar">
                <input type="text" value="<?php echo $result["modo_jogo"];?>" class="sdvdsdsvs" placeholder="Modo do Jogo" name="modo_jog">
            </div>

            <div id="sgdrgdtrg">
                <input type="text" value="<?php echo $result["foto_segundo_time"];?>" class="sdvsdvdds" placeholder="Foto do Segundo Time" name="foto_tim_2">
                <input type="text" value="<?php echo $result["inic_segundo_time"];?>" class="sdvsdss" placeholder="Inicial do Segundo Time" name="inic_tim_2">
                <textarea name="gols_tim_2" id="time2gols" placeholder="Quem fez Gol ?">
                <?php echo $result["quem_fez_gols_2"];?>
                </textarea>
            </div>
        </div>

        <div class="sgfsrgr">
        <div class="aefaef">
            <select name="liga" id="sdgdsg">

            <option value="<?php echo $result["campeonato"];?>">Pelo <?php echo $result["campeonato"];?></option>
            <?php
            $query = $con->prepare('SELECT * FROM `ligas`');

            $query->execute();

		    while($resultss = $query->fetch()){ 

            ?>
                <option value="<?php echo $resultss['id']; ?>"><?php echo $resultss["nome_liga"]; ?></option>

            <?php
                }
            ?>
            </select>
        </div>

        <div class="aefaef">
            <select name="modo" id="sdgdsg">
                <option value="<?php echo $result["como"];?>">Está <?php echo $result["como"];?></option>
                <option value="1">Ao Vivo</option>
                <option value="2">Encerrado</option>
            </select>
        </div>

        </div>

        <div class="escr">
            <textarea name="fale_jogos" id="falemais" placeholder="Diga Alguma Coisa Sobre o Jogo."><?php echo $result["fale_jogos"];?></textarea>
        </div>

        <div class="dados_b_l">
            <input type="text" value="<?php echo $result["links"];?>" placeholder="Url Jogo" name="link" class="dhfyjfy">
            <input type="text" value="<?php echo $result["confronto"];?>" placeholder="Confronto" name="confronto" class="dhfyjfy">
        </div>

        <div class="enviar">
            <button name="Atualizar">Atualizar</button>
        </div>
    </form>

    <?php

            }} catch (Exception $e) {
                echo "Erro: ". $e->getMessage();
            };
        ?>

</body>
</html>