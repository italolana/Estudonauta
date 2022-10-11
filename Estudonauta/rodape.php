<?php
echo "
<footer>
<p id='fot'>
Acessado por " . $_SERVER['REMOTE_ADDR'] . " em " . date('d/m/y') . "

</p>
<p>
Desenvolvido por Estudonauta &copy; 2022
</p>
</footer>

";


$mysqli->close();
?>