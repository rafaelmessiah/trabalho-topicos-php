<br><br>
<?php
    // Inclui o arquivo de controle
    require_once("./controler/carroController.php");
    
    if(isset($_GET["alt"])){
        //Chama a função de alterar o Array e envia o ID, a função retorna um Array
        try{
            $arrayCarro = buscarCarro((int)$_GET["alt"]);
        }
        catch(Exception $e){
            echo "Erro :". $e->getMessage();
            echo "<br> cod".$e->getCode();
        }
    }

    //Se o formulário foi enviado preenche um Array com os novos dados
    if(isset($_POST["id_carro"])){
        $arrayCarro = array (
            "id_carro" => $_POST["id_carro"],
            "renavam" => $_POST["renavam"],
            "cor" => $_POST["cor"],
            "ano_modelo" => $_POST["ano_modelo"],
            "tipo_motor" => $_POST["tipo_motor"],
            "cilindrada" => $_POST["cilindrada"],
            "marca" => $_POST["marca"],
            "modelo" => $_POST["modelo"],
        );
        //Chama a função para alterar e envia o Array alterado, a função retona uma string
        echo alterarCarro($arrayCarro);
        echo '<a href="./?p=carro"><button>Voltar</button></a>';
    }
?>
<br>
<div>
<form method="post">
    <!-- Preenche o value dos campos dos formulários com os dados -->
    <input type="hidden" name="id_carro" value="<?= isset($arrayCarro)? $arrayCarro['id_carro'] : "" ?>">

    <label>Renavam:</label>
    <input type="text" name="renavam" value="<?= isset($arrayCarro)? $arrayCarro["renavam"]: "" ?>"><br>

    <label>Cor:</label>
    <input type="text" name="cor" value="<?= isset($arrayCarro)? $arrayCarro["cor"]: "" ?>"><br>

    <label>Ano do modelo:</label>
    <input type="text" name="ano_modelo" value="<?= isset($arrayCarro)? $arrayCarro["ano_modelo"]: "" ?>"><br>

    <label>Tipo de motor:</label>
    <input type="text" name="tipo_motor" value="<?= isset($arrayCarro)? $arrayCarro["tipo_motor"]: "" ?>"><br>

    <label>Cilindrada:</label>
    <input type="text" name="cilindrada" value="<?= isset($arrayCarro)? $arrayCarro["cilindrada"]: "" ?>"><br>

    <label>Marca:</label>
    <input type="text" name="marca" value="<?= isset($arrayCarro)? $arrayCarro["marca"]: "" ?>"><br>

    <label>Modelo:</label>
    <input type="text" name="modelo" value="<?= isset($arrayCarro)? $arrayCarro["modelo"]: "" ?>"><br>

    <input type="submit" value="Salvar">
</form>
</div>