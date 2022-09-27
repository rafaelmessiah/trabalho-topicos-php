
<?php 
    require_once("./model/carro.php");

    //Se houver Post tenta fazer o cadastro, se não nao faz nada
    if (isset($_POST["renavam"])){
        $arrayCarro = array (
            "renavam" => $_POST["renavam"],
            "cor" => $_POST["cor"],
            "ano_modelo" => $_POST["ano_modelo"],
            "tipo_motor" => $_POST["tipo_motor"],
            "cilindrada" => $_POST["cilindrada"],
            "marca" => $_POST["marca"],
            "modelo" => $_POST["modelo"],
        );
        //Chama a função de cadastro de carro e envia o Array
        echo _cadastrarCarro($arrayCarro);
        //retorna um botão de voltar pra Home
        echo '<a href="../index.php">Voltar<a/>';
    }
?>

<br><br>
<!-- O action envia por POST o forma para o controlador -->
<form method="post">
    <label>Renavam:</label>
    <input type="text" name="renavam" ><br>

    <label>Cor:</label>
    <input type="text" name="cor" ><br>
    
    <label>Ano do modelo:</label>
    <input type="text" name="ano_modelo"><br>
    
    <label>Tipo de motor:</label>
    <input type="text" name="tipo_motor"><br>
    
    <label>Cilindrada:</label>
    <input type="text" name="cilindrada"><br>

    <label>Marca:</label>
    <input type="text" name="marca"><br>

    <label>Modelo:</label>
    <input type="text" name="modelo"><br>
    
    <input type="submit" value="Salvar"><br>
</form>