<br><br>
<?php
    // Inclui o arquivo de controle
    require_once("./controler/aviaoController.php");
    if (isset($_GET["del"])){
        //Chama a função de deletar e envia o ID, a função retorna uma string
        echo deletarAviao ($_GET["del"]);
    }

?>
<br>
<a href="./?p=aviao">Voltar</a>