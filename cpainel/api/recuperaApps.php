<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');
include("../conect/conect.php");

try {
	if(!$con){
		echo "Não foi possivel conectar com Banco de Dados!";
	}		
		$query = $con->prepare('SELECT * FROM `apps`');
	
		$query->execute();
		$out = "[";
		while($result = $query->fetch()){
			if ($out != "[") {
				$out .= ",";
			}
            $out .= '{"id": "'.$result["id"].'",';
			$out .= '"foto_app": "'.$result["foto_app"].'",';
			$out .= '"nome_app": "'.$result["nome_app"].'",';
			$out .= '"url_app": "'.$result["url_app"].'"}';
		}
		$out .= "]";
		echo $out;
} catch (Exception $e) {
	echo "Erro: ". $e->getMessage();
};
