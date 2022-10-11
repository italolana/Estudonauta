<pre><?php
$bd = 'bd_games';
$host = 'localhost';
$user = 'root';
$senha = '';


$mysqli = new mysqli($host, $user, $senha, $bd);

if ($mysqli->errno) {
    echo "Erro: $mysqli->errno";
    die();
}

