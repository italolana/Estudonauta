<?php
require_once 'incluides/Connect.php';
require_once 'incluides/funcoes.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detalhes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div id="corpo">
    <?php
    include_once('topo.php');
    $c = isset($_GET['cod']) ? $_GET['cod'] : 999;
    $busca = $mysqli->query("select * from jogos where cod = '$c'");

    ?>
    <h1>Detalhes do jogo</h1>
    <table style="width: 100%;">
        <?php
        if (!$busca) {
            echo 'A busca falhou';
        } else {
            if ($busca->num_rows == 1) {
                $reg = $busca->fetch_object();
                $t = thumb($reg->capa);
                echo "<tr><td rowspan='3'> <img src='$t' style='height: 400px;'>";
                echo "<td><h2 style='padding: 15px;'>$reg->nome</h2>";
                echo "<p style='padding: 15px;'>Nota: $reg->nota/10.0</p>";
                echo "<tr><td style='padding: 15px;'>$reg->descricao";
                echo '<tr><td style="padding: 15px;">Adm';
            } else {
                echo "<tr><td>Nenhum registro encontrado";
            }
        }

        ?>
    </table>
    <a href="Modelo.php"><img src="icones/icoback.png"></a>


</div>


<?php
include_once("rodape.php");
?>

</body>
</html>