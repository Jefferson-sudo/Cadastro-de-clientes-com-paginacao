<?php
$pg       = isset($_GET['pg'])? $_GET['pg']: 0;
$pesq     = isset($_POST['pesq']) ? $_POST['pesq'] : NULL;
$campo    = isset($_POST['campo']) ? $_POST['campo'] : NULL;


if ($pesq) {
    $sql = "SELECT * FROM `cliente` WHERE `$campo` like%$pesq%";
} else {
    $sql = "SELECT * FROM `cliente`";
}
$clientes = queryData("cliente");
$cliente = selecionar($sql);
$total = allrows($sql);
$lpp = 5;                               //Linhas por paginas
$paginas = ceil($total / $lpp-1);       //Numero de paginas
$total_paginas = ceil($total / $lpp);   //Numero de paginas
$inicio = $pg * $lpp;                   //Pega o inicio da pagina





?>

<div class="base-home">
    <h1 class="titulo"><span class="cor">Lista de</span> contatos</h1>
    <div class="base-lista">
        <div class="busca-lista">
        <form action="<?php echo URL_BASE . "index.php" ?>"method="get">
            <div class="col">
                <span>Valor</span>
                <input type="text" name="pesq" value="<?php echo $pesq ?>" >
            </div>
            <div class="col">
                <span>Campo</span>
                <select name="campo">
                    <option value="cliente">Nome </option>
                    <option value="email" selected>Email</option>
                </select>
            </div>
            <div class="col">
                <input type="submit" value="buscar" class="btn">
            </div>
        </form> 
        </div>
    <br>
    <span class="busca-lista"><b><?php echo $total ?></b> clientes cadastrados</span>

    <div class="tabela">	
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th width="5%" align="left">ID</th>
                    <th width="25%" align="left">Nome</th>
                    <th width="25%" align="left">Email</th>
                    <th width="10%" align="left">Telefone</th>
                    <th width="10%" align="left">Cidade</th>
                    <th width="20%" colspan="2" align="center">Alterar</th>
                </tr>
            </thead>

            <?php
           
            $i = 0;
            
            $clientes = selecionar($sql ." LIMIT $inicio, $lpp");//Faz a busca no banco de dados colocando um limite de apenas 5 resultados por vez
            
            if($clientes){
                
                echo $pg + 1;//Mostra qual pagina o usuario esta
            
            foreach ($clientes as $cliente) { //Listando os usuarios
                    ?>
                    <tbody>
                        <tr class="cor1">
                            <td><?php echo $cliente["id_cliente"] ?></td>
                            <td><?php echo $cliente["cliente"] ?></td>
                            <td><?php echo $cliente["email"] ?></td>
                            <td><?php echo $cliente["fone"] ?></td>
                            <td><?php echo $cliente["cidade"] ?></td>

                            <td align="center">
                                <a href="<?php echo "index.php?link=2&acao=Editar&id=" . $cliente["id_cliente"] ?>" class="btn">Editar</a>
                            </td>
                            <td align="center">
                                <a href="<?php echo "index.php?link=2&acao=Excluir&id=" . $cliente["id_cliente"] ?>" class="btn excluir">excluir</a>
                            </td>
                        </tr>
                        <?php
                    }
            }else{
                echo"Empty page";//Se a a busca retornar vazio mostra somente uma string vazia ao inves de mostrar erros
            }
                ?>
        </table>

    </div>
   
    <ul class="paginacao">
    <?php echo paginacao("index.php?link=3", $paginas,$total_paginas, $pg); //Imprime as opçoes para mudar mudar as pagina?>
    </ul>
    </div>
</div>