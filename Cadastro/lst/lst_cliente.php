<?php
$clientes = queryData("cliente");
?>

<div class="base-home">
    <h1 class="titulo"><span class="cor">Lista de</span> contatos</h1>
    <div class="base-lista">
        <span class="qtde"><b>18</b> clientes cadastrados</span>
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
                                    <a href="index.php?link=2" class="btn">Editar</a>
                                </td>
                                <td align="center">
                                    <a href="index.php?link=2" class="btn excluir">excluir</a>
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
