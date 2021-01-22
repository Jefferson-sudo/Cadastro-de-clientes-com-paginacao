<?php
require ("config/config.php");
require ("config/crud.php");
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Cadastro de clientes</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>

    <body>
        <!--Mostra o cabecalho-->
        <?php include 'cabecalho.php'; ?>
        <!--Mostra o Menu-->   
        <?php include 'menu.php'; ?>
        <!--Pega o link-->
        <?php
        @$link = $_GET["link"];
        $pag[1] = "home.php";
        $pag[2] = "frm/frm_cliente.php";
        $pag[3] = "lst/lst_cliente.php";
        $pag[4] = "lst/lst_editar_excluir.php";

        if (!empty($link)) {
            if (file_exists($pag[$link])) {
                include $pag[$link];
            } else { //Se nao tiver link
                include'erro404.php';
            }
        } else {
            include'home.php';
        }
        ?>
        <!--Mostra o rodape-->
        <?php include'rodape.php' ?>	</div>		
</div>		
</body>
</html>