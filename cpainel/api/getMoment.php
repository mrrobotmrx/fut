<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');
include("../conect/conect.php");

$a = $_GET["id"];

// Verificamos se a ação é de busca
 
	// Verificamos no banco de dados produtos equivalente a palavra digitada
    $sql = $con->prepare("SELECT * FROM `moments` WHERE id = ".$a." ORDER BY id");
    $sql->execute();
 
	// Descobrimos o total de registros encontrado
    $numRegistros = $sql->rowCount();
	// Se houver pelo menos um registro, exibe-o
	if ($numRegistros != 0) {
        // Exibe os produtos e seus respectivos preços
        
        $out = "[";
		while($result = $sql->fetch()){
			if ($out != "[") {
				$out .= ",";
			}
			$out .= '{"id": "'.$result["id"].'",';
            $out .= '"foto_moment": "'.$result["foto_moment"].'",';
			$out .= '"titulo_moment": "'.$result["titulo_moment"].'",';
			$out .= '"text_moment": "'.$result["text_moment"].'",';
            $out .= '"video_moment": "'.$result["video_moment"].'"}';
		}
		$out .= "]";
		echo $out;
	} else {
	
}