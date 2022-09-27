
<?php 
    require_once("./model/trem.php");

    //Se houver Post tenta fazer o cadastro, se não nao faz nada
    if (isset($_POST["modelo"])){
        $arrayTrem = array (
            "modelo" => $_POST["modelo"],
            "cor" => $_POST["cor"],
            "capacidade_passageiro" => $_POST["capacidade_passageiro"],
            "qtde_vagoes" => $_POST["qtde_vagoes"],
            "fonte_energia" => $_POST["fonte_energia"],
            "fabricante" => $_POST["fabricante"],
        );
        //Chama a função de cadastro de trem e envia o Array
        echo _cadastrarTrem($arrayTrem);
        //retorna um botão de voltar pra Home
        echo '<a href="./?p=trem">Voltar<a/>';
    }
?>

<br><br>
<!-- O action envia por POST o forma para o controlador -->
<form method="post">
    <label>Modelo:</label>
    <input type="text" name="modelo" required><br>

    <label>Cor:</label>
    <input type="text" name="cor" required><br>
    
    <label>Capacidade de passageiros:</label>
    <input type="text" name="capacidade_passageiro" required><br>
    
    <label>Quantidade de Vagões:</label>
    <input type="text" name="qtde_vagoes" required><br>
    
    <label>Fonte de Energia:</label>
    <input type="text" name="fonte_energia" required><br>

    <label>Fabricante:</label>
    <input type="text" name="fabricante" required><br>
    
    <input type="submit" value="Salvar"><br>
</form>