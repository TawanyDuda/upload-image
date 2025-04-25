<?php
//superglobals
// $_GET, $_post, $_FILES, $_SERVER

// valida o tipo e extensão de requisição
if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    return header('Location: index.php');
}

// validar o conteudo do formulario
if(!isset($_FILES['imagem'] )){
    return header('Location: index.php');
}

$imagem = $_FILES["imagem"];
$diretorioDestino = "upload/";
$upload = "/upload";

$tamanhoMaximo = 16000000;
$tiposPermitidos = ['image/jpeg', 'image/png','image/webp'];
$extensoesPermitidas = ['jpeg','jpg','png','webp'];

//ERRO
if(!in_array($imagem['type'], $tiposPermitidos)){
    die('Tipo de arquivo inválido!');
}

$arquivoExtensao = pathinfo($imagem['name'], PATHINFO_EXTENSION);
if(!in_array($arquivoExtensao, $extensoesPermitidas)){
    die('Extensão do arquivo inválida!');
}

//Validação de tamanho da imagem
if ($imagem['size'] > $tamanhoMaximo){
    die('Tamanho superior a 16MB, portanto inválido!');
}

// Função que valida se o arquivo UPLOAD existes
if (!file_exists($upload)){
    var_dump($upload);
    mkdir($upload,0700);
    die('Primeira a ser criada!');
}

$caminhoTemporario = $imagem["tmp_name"];
$nomeUnico = uniqid().'_'. $image["name"];
$caminhoDestino = $diretorioDestino . $nomeUnico;


$salvou = move_uploaded_file($caminhoTemporario,$caminhoDestino);

if($salvou){

    echo "Arquivo salvo em $caminhoDestino";
} else{
    echo "Erro ao salvar arquivo!";
}