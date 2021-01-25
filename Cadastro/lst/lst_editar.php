<?php
//$acao = isset($_GET["acao"]) ? $_GET["acao"] : NULL;
$clientes = queryData("cliente");

$pg = isset($_GET['pg']) ? $_GET['pg'] : 0;
$pesq = isset($_POST['pesq']) ? $_POST['pesq'] : NULL;
$campo = isset($_POST['campo']) ? $_POST['campo'] : NULL;


if ($pesq) {
    $sql = "SELECT * FROM `cliente` WHERE `$campo` like%$pesq%";
} else {
    $sql = "SELECT * FROM `cliente`";
}
$clientes = queryData("cliente");
$cliente = selecionar($sql);
$total = allrows($sql);
$lpp = 5;                               //Linhas por paginas
$paginas = ceil($total / $lpp - 1);       //Numero de paginas
$total_paginas = ceil($total / $lpp);   //Numero de paginas
$inicio = $pg * $lpp;                   //Pega o inicio da pagina
?>

<div class="base-home">
    <h1 class="titulo"><span class="cor">Lista de</span> contatos</h1>
    <div class="base-lista">
        <span class="qtde"><b><?php echo $pesq ?></b> clientes cadastrados</span>
        <div class="tabela">	
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th width="25%" align="left">Nome</th>
                        <th width="25%" align="left">Email</th>
                        <th width="10%" align="left">Telefone</th>
                        <th width="10%" align="left">Cidade</th>
                        <th width="20%" colspan="2" align="center">Alterar</th>
                    </tr>
                </thead>

                <?php
                if ($clientes) {
                    echo $pg + 1;
                    //Se a acao enviada for Editar                

                    $i = 0;

                    $clientes = selecionar($sql . " LIMIT $inicio, $lpp"); //Faz a busca no banco de dados colocando um limite de apenas 5 resultados por vez

                    foreach ($clientes as $cliente) {
                        ?>
                        <tbody>
                            <tr class="cor1">
                                <td><?php echo $cliente["cliente"] ?></td>
                                <td><?php echo $cliente["email"] ?></td>
                                <td><?php echo $cliente["fone"] ?></td>
                                <td><?php echo $cliente["cidade"] ?></td>

                                <td align="center">
                                    <a href="<?php echo 'index.php?link=2&$acao=Editar&id=' . $cliente['id_cliente'] ?>" class="btn">Editar</a>
                                </td>
                                <?php
                            }
                        } else {
                            echo "Nenhum valor encontrado! Isso pode acontecer por que a conexão com o banco de dados falhou"
                            . " ou simplesmente por que não existe nenhum dado cadastrado !";
                        }
                        ?>
                    </tr>
            </table>

        </div>	

        <ul class="paginacao">
            <?php echo paginacao("index.php?link=4", $paginas, $total_paginas, $pg); //Imprime as opçoes para mudar mudar as pagina   ?>
        </ul>
    </div>	
</div>	
