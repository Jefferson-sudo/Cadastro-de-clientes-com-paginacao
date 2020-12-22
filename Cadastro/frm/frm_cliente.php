<?php
$acao = isset($_GET["acao"]) ? $_GET["acao"] : "Cadastrar";
$id = isset($_GET["id"]) ? $_GET["id"] : NULL;

if ($id) {
    $cliente = queryData("`cliente` WHERE `id_cliente` = $id");
}
$id_cliente  = isset($cliente[0][0]) ? $cliente[0]["id_cliente"] : NULL;
$nome        = isset($cliente[0]["cliente"]) ? $cliente[0]["cliente"] : NULL;
$email       = isset($cliente[0]["email"]) ? $cliente[0]["email"] : NULL;
$endereco    = isset($cliente[0]["endereco"]) ? $cliente[0]["endereco"] : NULL;
$fone        = isset($cliente[0]["fone"]) ? $cliente[0]["fone"] : NULL;
$bairro      = isset($cliente[0]["bairro"]) ? $cliente[0]["bairro"] : NULL;
$cep         = isset($cliente[0]["cep"]) ? $cliente[0]["cep"] : NULL;
$cpf         = isset($cliente[0]["cpf"]) ? $cliente[0]["cpf"] : NULL;
$cidade      = isset($cliente[0]["cidade"])?$cliente[0]["cidade"]: NULL ;


?>

<div class="base-home">
    <h1 class="titulo"><span class="cor">Novo</span> cadastro</h1>
    <div class="base-formulario">	
        <form action="op/op_cliente.php" method="POST">
            <label>Nome</label>
            <input name="txt_cliente" value="<?php echo $nome; ?>" type="text" placeholder="Insira um nome">
            <label>Email</label>
            <input name="txt_email" value="<?php echo $email ; ?>" type="text" placeholder="Insira um email">
            <label>Cidade</label>
            <input name="txt_cidade" value="<?php echo $cidade ; ?>" type="text" placeholder="Insira o nome da sua cidade">	
            <label>Endereço</label>
            <input name="txt_endereco" value="<?php echo $endereco ; ?>" type="text" placeholder="Insira seu endereço">	
            <div class="col">
                <label>Telefone</label>
                <input name="txt_fone" value="<?php echo $fone ; ?>" type="text" placeholder="Insira seu telefone">
            </div>

            <div class="col">
                <label>Bairro</label>
                <input name="txt_bairro" value="<?php echo $bairro ; ?>" type="text" placeholder="Insira seu bairro">
            </div>

            <div class="col">
                <label>CEP</label>
                <input name="txt_cep" value="<?php echo $cep ; ?>" type="text" placeholder="Insira seu CEP">
            </div>	

            <div class="col">
                <label>CPF/CNPJ</label>
                <input name="txt_cpf" value="<?php echo $cpf ; ?>" type="text" placeholder="Insira seu CPF">
            </div>

            <input type="hidden" name="acao" value="<?php echo $acao ?>">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="submit" value="<?php echo $acao ?>" class="btn">
            <input type="reset" name="Reset" id="button" value="Limpar" class="btn limpar">
        </form>
    </div>	
</div>	
