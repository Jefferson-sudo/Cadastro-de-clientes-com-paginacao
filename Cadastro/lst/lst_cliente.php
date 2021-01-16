<?php
$clientes = queryData("cliente");
$pesq   = isset($_POST['pesq'])? $_POST['pesq']:NULL;
$campo = isset($_POST['campo'])? $_POST['campo']:NULL;
if($pesq){
    $sql = "SELECT * FROM `cliente` WHERE `$campo` like%$pesq%";
}else{
    $sql = "SELECT * FROM `cliente`";
}

$lista = selecionar($sql);
print_r($lista);
?>

<div class="base-home">
    <h1 class="titulo"><span class="cor">Lista de</span> contatos</h1>
    <div class="base-lista">
        <span class="qtde"><b>18</b> clientes cadastrados</span>
        <form action="inde.php?link=3"mthod="post">
           Pesquisa:<input type="text" name="pesq" placeholder="Valor" with="50" >
           
           Campos: <select name="campo">
                <option value="cliente">Nome </option>
                <option value="email" selected>Email</option>
                <option value="cpf">CPF </option>
            </select>
            <input type="submit" value="buscar">
        </form> 
        </br>
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
                    foreach ($clientes as $cliente) {
                        ?>
                        <tbody>
                            <tr class="cor1">
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
                    } else {
                        echo "Nenhum valor encontrado! Isso pode acontecer por que a conexão com o banco de dados falhou"
                        . " ou simplesmente por que não existe nenhum dado cadastrado !";
                    }
                    ?>
            </table>

        </div>	

        <ul class="paginacao">
            <li><a href="#" class="ant">Anterior</a></li>
            <li class="ativo">1</li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">...</a></li>
            <li><a href="#" class="prox">Próximo</a></li>
        </ul>
    </div>	
</div>	
