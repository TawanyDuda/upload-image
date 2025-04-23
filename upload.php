<?php
//superglobals
// $_GET, $_post, $_FILES

$imagem = $_FILES["imagem"];

$diretorioDestino = "upload/";

$caminhoTemporario = $imagem["tmp_name"];
$caminhoDestino = $diretorioDestino . $imagem["name"];

var_dump($caminhoDestino);

$salvou = move_uploaded_file($caminhoTemporario,$caminhoDestino);

if($salvou){
    echo "Arquivo salvo em $caminhoDestino";
} else{
    echo "Erro ao salvar arquivo!";
}