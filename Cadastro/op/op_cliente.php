<?php

require ("../config/config.php");
require ("../config/crud.php");

$id_cliente = isset($_POST["id"]) ? $_POST["id"] : NULL;
$acao = isset($_POST["acao"]) ? $_POST["acao"] : "Cadastrar";


$txt_cliente = $_POST["txt_cliente"];
$txt_email = $_POST["txt_email"];
$txt_cidade = $_POST["txt_cidade"];
$txt_endereco = $_POST["txt_endereco"];
$txt_fone = $_POST["txt_fone"];
$txt_bairro = $_POST["txt_bairro"];
$txt_cep = $_POST["txt_cep"];
$txt_cpf = $_POST["txt_cpf"];

$dados = array(
    "cliente"  => $txt_cliente,
    "endereco" => $txt_endereco,
    "bairro"   => $txt_bairro,
    "cidade"   => $txt_cidade,
    "cep"      => $txt_cep,
    "fone"     => $txt_fone,
    "email"    => $txt_email,
    "cpf"      => $txt_cpf
);


if($acao == "Cadastrar"){
  $qry= insertData("cliente", $dados);
 if($qry){
  $url = URL_BASE. "index.php?link=3";
 }else{
    echo "Erro !";
 }
}

if ($acao == "Editar") {
   $qry = updateData("cliente", $dados, "id_cliente` =" . $id_cliente);
  if($qry){
    $url = URL_BASE. "index.php?link=3";
  }
  else{
    echo "Erro !";
  }
}

if ($acao == "Excluir") {
    $qry = deleteData("cliente", "id_cliente` = " . $id_cliente);
    print_r($qry);
    if($qry){
       $url = URL_BASE. "index.php?link=3";
    }else{
        echo "Erro !";
    }
}

header("location:$url");

