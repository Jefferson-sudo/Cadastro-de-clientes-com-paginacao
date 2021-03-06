<?php

function openConection() {//Abrir conexao
    $conection = @mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die(mysqli_connect_error());
    mysqli_set_charset($conection, CHARSET);
    return $conection;
}

//Fechar conexao
function closeConection($conection) {
    @mysqli_close($conection) or die(mysqli_error($conection));
}

//Funcoa para executar o sql
function runsql($sql) {
    $conection = openConection();

    $qry = @mysqli_query($conection, $sql) or die(mysqli_erro($conection));

    closeConection($conection);
    return $qry;
}

//Funcoa para fazer busca SELECT
function queryData($tabela, $condicao = NULL, $campos = "*") {
    $sql = "SELECT {$campos} FROM {$tabela} {$condicao}";

    $qry = runsql($sql);

    if (!mysqli_num_rows($qry)) {
        return FALSE;
    } else {
        while ($linha = @mysqli_fetch_array($qry)) {
            $dados[] = $linha;
        }
        return $dados;
    }
}
function selecionar($comandosql) {
    $sql = $comandosql;
    $qry = runsql($sql);

    if (!mysqli_num_rows($qry)) {
        return false;
    } else {
        while ($linha = @mysqli_fetch_array($qry)) {
            $dados[] = $linha;
        }
        return $dados;
    }
}
//Funcao para insercao de dados
function insertData($tabela, array $dados, $id = false) {
    openConection();
    //Pega as chaves do array. $Campos vai receber as colunas ta tabela
    $campos  = "`". implode("`,`", array_keys($dados))."`"; //Implode: junta elementos de uma matriz em uma string e etorna uma string contendo os elementos da matriz na mesma ordem com uma ligação (no caso a virgula), entre cada elemento.
    //Pega os valores do array. $Valores vai receber os valores que vão ser inseridos em cada coluna
    $valores = "'" . implode("','", $dados) . "'"; 
    $sql     = "INSERT INTO `$tabela`({$campos}) VALUES ({$valores})";
   
    $qry = runsql($sql);
    return $qry;
}

//Atualizar dados
function updateData($tabela, array $dados, $condicao) {
    openConection();


    foreach ($dados as $chave => $valor) {//Varrer os dados
        $campos[] = "{$chave}` = '{$valor}' ";
    }
    $campos =  implode(",`", $campos);
    $sql    = "UPDATE `$tabela` SET `{$campos} WHERE `$tabela`.`{$condicao}  ";
    $qry    = runsql($sql);

    return $qry;
}

//Deletar dados
function deleteData($tabela, $condicao) {
    openConection();
    $sql = "DELETE  FROM  `$tabela` WHERE `$condicao";
    $qry = runsql($sql);
    return $qry;
}

function allrows($sql){
    $qry = runsql($sql);
    return mysqli_num_rows($qry);
}