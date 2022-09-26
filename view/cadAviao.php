<?php 
    require_once("./model/aviao.php");

    //Se houver Post tenta fazer o cadastro, se não nao faz nada
    if (isset($_POST["modelo"])){
        $arrayAviao = array (
            "modelo" => $_POST["modelo"],
            "qdte_turbinas" => $_POST["qdte_turbinas"],
            "capac_passageiros" => $_POST["capac_passageiros"],
            "capc_carga" => $_POST["capc_carga"],
        );
        //Chama a função de cadastro de aviao e envia o Array
        echo cadastrar($arrayAviao);
        //retorna um botão de voltar pra Home
        echo '<a href="../index.php">Voltar<a/>';
    }
?>
<br><br>
<!-- O action envia por POST o forma para o controlador -->
<form method="post">
    <label>Modelo:</label>
    <input type="text" name="modelo" ><br>

    <label>Quantidade de turbinas:</label>
    <input type="text" name="qdte_turbinas" ><br>

    <label>Capacidade de passageiros:</label>
    <input type="text" name="capac_passageiros"><br>

    <label>Capacidade de carga:</label>
    <input type="text" name="capc_carga"><br>

    <input type="submit" value="Salvar"><br>
</form>