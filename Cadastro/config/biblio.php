<?php

//Funcao responsavel pela paginacao do sistema
function paginacao($url, $paginas, $total_paginas, $pg) {
    //Trabalhando as paginas
    //Verificar se a pagina e menor igual a 0. Se for ultimo o vai ser 0. Se nao, ultimo vai ser o numero de  paginas
    if ($paginas <= 0) {
        $ultimo = $total_paginas;
    } else {
        $ultimo = $paginas;
    }

    //Verifica se a pagina esta vazio
    if ($paginas <= 0) {
        $imprimePaginacao = "Página 1 de 1";
    } else if ($pg == 0 | $paginas < 0) {//Se estiver na primeira pagina e pagina nao for menor que 0
        $mais = $pg + 1;
        $imprimePaginacao = "<li><a href='$url&pg=$mais' class='prox'>Próxima</a></li>";
        //Imprimir opcoes de paginas
        for ($i = 0; $i <= $paginas; $i++) {
            $aux = $i + 1;
            if ($pg == $i) {//Testa se a o pg e igual a I para saber se voce esta tentando acessar a mesma pagina onde voce esta 
                $imprimePaginacao.="<li><a>$aux</a></li>";
            } else {
                $imprimePaginacao .= "<li class='ativo'><a href='$url&pg=$i'>$aux</a></li>";
            }
        }
        $imprimePaginacao .="<li><a href='$url&pg=$ultimo' class='ultimo'> Ultimo</a></li>";
    } else if ($pg != 0 && $pg != $paginas) {//Se nao estiver na ultima e nem na primeira pagina
        $mais = $pg + 1;
        $menos = $pg - 1;
        $imprimePaginacao = ""
                . "<li><a href='index.php?link=3&pg=$menos' class='ant'></a></li>"
                . "<li class='ativo'><a href='$url&pg=0'>Primeira</a></li>";
        //Imprimir opcoes de paginas
        for ($i = 0; $i <= $paginas; $i++) {
            $aux = $i + 1;
            if ($pg == $i) {//Testa se a o pg e igual a I para saber se voce esta tentando acessar a mesma pagina onde voce esta
                $imprimePaginacao.="<li><a>$aux</a></li>";
            } else {
                $imprimePaginacao .= "<li class='ativo'><a href='$url&pg=$i'>$aux</a></li>";
            }
        }
        $imprimePaginacao .= ""
                . "<li class='ativo'><a href='$url&pg=$ultimo' class='ultimo'> Ultimo</a></li>"
                . "<li><a href='$url&pg=$mais' class='prox'></a></li>";
    } else if ($pg == $paginas) {//Se estiver na ultima pagina
        $menos = $pg - 1;
        $imprimePaginacao = ""
                . "<li><a href='$url&pg=$menos' class='ant'>Anterior</a></li>";
        //Imprimir opcoes de paginas
        for ($i = 0; $i <= $paginas; $i++) {
            $aux = $i + 1;
            if ($pg == $i) {//Testa se a o pg e igual a I para saber se voce esta tentando acessar a mesma pagina onde voce esta
                $imprimePaginacao.="<li><a>$aux</a></li>";
            } else {
                $imprimePaginacao .= "<li class='ativo'><a href='$url&pg=$i'>$aux</a></li>";
            }
        }
        $imprimePaginacao.=""
                . "<li><a href='$url&pg=0'>Primeira</a></li>";
    }
    return $imprimePaginacao; //Retorna a paginacao
}
 