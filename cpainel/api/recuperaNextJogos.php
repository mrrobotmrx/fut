<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');
include("../conect/conect.php");

try {
	if(!$con){
		echo "Não foi possivel conectar com Banco de Dados!";
	}		
		$query = $con->prepare('SELECT * FROM `nextjogos` ORDER BY id Desc');
	
		$query->execute();
		$out = "[";
		while($result = $query->fetch()){
			if ($out != "[") {
				$out .= ",";
			}
			$out .= '{"id": "'.$result["id"].'",';
			$out .= '"foto_liga": "'.$result["foto_liga"].'",';
            $out .= '"nome_liga": "'.$result["nome_liga"].'",';
            $out .= '"horario": "'.$result["horario"].'",';
            $out .= '"foto_primeiro_time": "'.$result["foto_primeiro_time"].'",';
            $out .= '"inic_primeiro_time": "'.$result["inic_primeiro_time"].'",';
            $out .= '"foto_segundo_time": "'.$result["foto_segundo_time"].'",';
			$out .= '"data_jogo": "'.$result["data_jogo"].'",';
			$out .= '"inic_segundo_time": "'.$result["inic_segundo_time"].'"}';
		}
		$out .= "]";
		echo $out;
} catch (Exception $e) {
	echo "Erro: ". $e->getMessage();
};
