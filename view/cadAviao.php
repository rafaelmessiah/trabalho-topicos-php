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
        echo '<a href="./?p=aviao"><button>Voltar</button></a>';
    }
?>
<br>
<!-- O action envia por POST o forma para o controlador -->
<div>
    <form method="post">
        <label for="fname">Modelo:</label>
        <input type="text" name="modelo" required><br>

        <label>Quantidade de turbinas:</label>
        <input type="text" name="qdte_turbinas" required><br>

        <label>Capacidade de passageiros:</label>
        <input type="text" name="capac_passageiros" required><br>

        <label>Capacidade de carga:</label>
        <input type="text" name="capc_carga" required><br>

        <input type="submit" value="Salvar"><br>
    </form>
</div>