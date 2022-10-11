<?php
require_once('incluides/Connect.php');
require_once('incluides/funcoes.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Listagem de Jogos</title>

</head>
<body>

<div id="corpo">
    <?php
    include_once('topo.php');
    $ordem = isset($_GET['o'])? $_GET['o'] : "nome";
    $chave = isset($_GET['c'])? $_GET['c'] : "";
    ?>
    <h1>Escolha seu jogo</h1>
    <form method="get" id="busca" action="Modelo.php" style="text-align: right">Ordenar: <a href="Modelo.php?o=n&c=<?php echo $chave;?>">Nome</a>|<a href="Modelo.php?o=p&c=<?php echo $chave;?>">Produtora</a>|<a href="Modelo.php?o=n1&c=<?php echo $chave;?>">Nota alta</a>|<a href="Modelo.php?o=n2&c=<?php echo $chave;?>">Nota baixa</a> Buscar: <input type="text" name="c" size="10" maxlength="40"><input type="submit" value="Ok">
    </form>
    <table class="Listagem">
        <?php
        $q = "SELECT j.cod,j.nome,g.genero,p.produtora,j.capa FROM jogos j join generos g on j.genero =g.cod join produtoras p on j.produtora = p.cod ";

        if(!empty($chave)){
            $q .= "WHERE j.nome like '%$chave%' OR
            p.produtora like '%$chave%' OR
            g.genero like '%$chave%' ";

        }
        switch ($ordem) {
            case "p":
                $q .= "ORDER BY p.produtora";
                break;
            case "n1":
                $q .= "ORDER BY j.nota DESC";
                break;
            case "n2":
                $q.="ORDER BY j.nota ";
                break;
            default:
                $q .="ORDER BY j.nome";
        }
        $busca = $mysqli->query($q);

        if (!$busca) {
            echo "<tr><td>A busca falhou!" . $mysqli->error;
        } else {
            if ($busca->num_rows == 0) {
                echo "<tr><td>Nenhum registro encontrado!";

            } else {
                while ($reg = $busca->fetch_object()) {
                    $t = thumb($reg->capa);
                    echo "<tr><td><img class='mini' src='$t'/><td>";
                    echo "<a href='detalhes.php?cod=$reg->cod'>$reg->nome</a>";
                    echo "[$reg->genero]";
                    echo "</br>$reg->produtora";
                    echo "<td>Adm";
                }
            }
        }

        ?>
    </table>
</div>

<?php
include_once("rodape.php");
?>
</body>
</html>


