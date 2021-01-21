<?php
$pg       = isset($_GET['pg'])? $_GET['pg']: 0;
$pesq     = isset($_POST['pesq']) ? $_POST['pesq'] : NULL;
$campo    = isset($_POST['campo']) ? $_POST['campo'] : NULL;

$clientes = queryData("cliente");


if ($pesq) {
    $sql = "SELECT * FROM `cliente` WHERE `$campo` like%$pesq%";
} else {
    $sql = "SELECT * FROM `cliente`";
}

$cliente = selecionar($sql);
$total = allrows($sql);

$lpp = 5;                               //Linhas por paginas
$paginas = ceil($total / $lpp-1);         //Numero de paginas
$total_paginas = ceil($total / $lpp);         //Numero de paginas
$inicio = $pg * $lpp;                   //Pega o inicio da pagina


//Trabalhando as paginas

if($pg == 0){
    $mais = $pg +1;
    $imprimePaginacao = ""
            ."<li><a href='index.php?link=3&pg=$mais' class='prox'>Próximo </a></li>"
            . "<li class='ativo'><a href='index.php?link=3&pg=1''>2</a></li>"
            . "<li class='ativo'><a href='index.php?link=3&pg=2''>3</a></li>"
            . "<li class='ativo'><a href='index.php?link=3&pg=3''>4</a></li>"
            . "<li class='ativo'><a href='index.php?link=3&pg=4''>5</a></li>"
            . "<li class='ativo'><a href='index.php?link=3&pg=5''>6</a></li>"
            . "<li class='ativo'><a href='index.php?link=3&pg=6''>7</a></li>"
            . "<li class='ativo'><a href='index.php?link=3&pg=7''>8</a></li>"
            ."<li><a href='index.php?link=3&pg=$paginas'> Ultimo</a></li>";
}else if($pg == $paginas){
    $menos = $pg -1;
    $imprimePaginacao = ""
            . "<li><a href='index.php?link=3&pg=$menos' class='ant'>Anterior</a></li>"
            . "<li class='ativo'><a href='index.php?link=3&pg=0''>1</a></li>"
            . "<li class='ativo'><a href='index.php?link=3&pg=1''>2</a></li>"
            . "<li class='ativo'><a href='index.php?link=3&pg=2''>3</a></li>"
            . "<li class='ativo'><a href='index.php?link=3&pg=3''>4</a></li>"
            . "<li class='ativo'><a href='index.php?link=3&pg=4''>5</a></li>"
            . "<li class='ativo'><a href='index.php?link=3&pg=5''>6</a></li>"
            . "<li class='ativo'><a href='index.php?link=3&pg=6''>7</a></li>"
            . "<li><a href='index.php?link=3&pg=0'>Primeira</a></li>";
}else if($pg != 0 && $pg != $paginas){
    $mais = $pg +1;
    $menos = $pg -1;
        
    $imprimePaginacao = ""
            . "<li><a href='index.php?link=3&pg=$menos' class='ant'>Anterior</a></li>"
            . "<li class='ativo'><a href='index.php?link=3&pg=0''>1</a></li>"
            . "<li class='ativo'><a href='index.php?link=3&pg=1''>2</a></li>"
            . "<li class='ativo'><a href='index.php?link=3&pg=2''>3</a></li>"
            . "<li class='ativo'><a href='index.php?link=3&pg=3''>4</a></li>"
            . "<li class='ativo'><a href='index.php?link=3&pg=4''>5</a></li>"
            . "<li class='ativo'><a href='index.php?link=3&pg=5''>6</a></li>"
            . "<li class='ativo'><a href='index.php?link=3&pg=6''>7</a></li>"
            . "<li class='ativo'><a href='index.php?link=3&pg=7''>8</a></li>"
            ."<li><a href='index.php?link=3&pg=$mais' class='prox'>Próximo </a></li>";
    
}
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
            
            $clientes = selecionar($sql ." LIMIT $inicio, $lpp");
            if($clientes){
            echo $pg + 1;
            foreach ($clientes as $cliente) {
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
                echo"";
            }
                ?>
        </table>

    </div>
   
    <ul class="paginacao">
    <?php echo $imprimePaginacao; ?>
    </ul>
    </div>
</div>