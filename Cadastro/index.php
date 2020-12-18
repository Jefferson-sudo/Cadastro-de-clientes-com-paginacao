<?php
require ("config/config.php");
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>mjailton</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>

    <body>
        <?php include 'cabecalho.php'; ?>

        <?php include 'menu.php'; ?>

        <?php
        @$link = $_GET["link"];
        $pag[1] = "home.php";
        $pag[2] = "frm/frm_cliente.php";
        $pag[3] = "lst/lst_cliente.php";

        if (!empty($link)) {
            if (file_exists($pag[$link])) {
                include $pag[$link];
            } else {
                include'erro404.php';
            }
        } else {
            include'home.php';
        }
        ?>

        <?php include'rodape.php' ?>	</div>		
</div>		
</body>
</html>