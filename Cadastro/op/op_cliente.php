<?php

require ("../config/config.php");
require ("../config/crud.php");


$txt_cliente = $_POST["txt_cliente"];
$txt_email = $_POST["txt_email"];
$txt_cidade = $_POST["txt_cidade"];
$txt_endereco = $_POST["txt_endereco"];
$txt_fone = $_POST["txt_fone"];
$txt_bairro = $_POST["txt_bairro"];
$txt_cep = $_POST["txt_cep"];
$txt_cpf = $_POST["txt_cpf"];

$dados = array(
    "`cliente`" => $txt_cliente,
    "`endereco`" => $txt_endereco,
    "`bairro`" => $txt_bairro,
    "`cidade`" => $txt_cidade,
    "`cep`" => $txt_cep,
    "`fone`" => $txt_fone,
    "`email`" => $txt_email
);

$inserir = insertData("cliente", $dados);
header("location:".URL_BASE."index.php?link=3");
