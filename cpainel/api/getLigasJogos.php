
<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');
include("../conect/conect.php");

$a = $_GET["id"];
 
	// Verificamos no banco de dados produtos equivalente a palavra digitada
    $sql = $con->prepare("SELECT * FROM `jogos` WHERE campeonato = ".$a."");
    $sql->execute();
 
        
        $out = "[";
		while($result = $sql->fetch()){
			if ($out != "[") {
				$out .= ",";
			}
			$out .= '{"id": "'.$result["id"].'",';
                $out .= '"foto_liga": "'.$result["foto_liga"].'",';
                $out .= '"nome_liga": "'.$result["nome_liga"].'",';
                $out .= '"horario": "'.$result["horario"].'",';
                $out .= '"foto_primeiro_time": "'.$result["foto_primeiro_time"].'",';
                $out .= '"inic_primeiro_time": "'.$result["inic_primeiro_time"].'",';
                $out .= '"quem_fez_gols_1": "'.$result["quem_fez_gols_1"].'",';
                $out .= '"placar": "'.$result["placar"].'",';
                $out .= '"modo_jogo": "'.$result["modo_jogo"].'",';
                $out .= '"foto_segundo_time": "'.$result["foto_segundo_time"].'",';
                $out .= '"inic_segundo_time": "'.$result["inic_segundo_time"].'",';
                $out .= '"quem_fez_gols_2": "'.$result["quem_fez_gols_2"].'",';
                $out .= '"como": "'.$result["como"].'",';
                $out .= '"fale_jogos": "'.$result["fale_jogos"].'",';
                $out .= '"links": "'.$result["links"].'",';
                $out .= '"confronto": "'.$result["confronto"].'"}';
		}
		$out .= "]";
		echo $out;