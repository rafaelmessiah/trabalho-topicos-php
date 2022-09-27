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
    }
?>
<form method="post">
<!-- Preenche o value dos campos dos formulários com os dados -->
<input type="hidden" name="id_carro" value="<?= isset($arrayCarro)? $arrayCarro['id_carro'] : "" ?>">
<table>
    <tr>
        <td><label>Renavam:</label></td>
        <td>
            <input type="text" name="renavam" value="<?= isset($arrayCarro)? $arrayCarro["renavam"]: "" ?>">
        </td>
    </tr>
    <tr>
        <td><label>Cor:</label></td>
        <td>
            <input type="text" name="cor" value="<?= isset($arrayCarro)? $arrayCarro["cor"]: "" ?>">
        </td>
    </tr>
    <tr>
        <td><label>Ano do modelo:</label></td>
        <td>
            <input type="text" name="ano_modelo" value="<?= isset($arrayCarro)? $arrayCarro["ano_modelo"]: "" ?>">
        </td>
    </tr>
    <tr>
        <td><label>Tipo de motor:</label></td>
        <td>
            <input type="text" name="tipo_motor" value="<?= isset($arrayCarro)? $arrayCarro["tipo_motor"]: "" ?>">
        </td>
    </tr>
    <tr>
        <td><label>Cilindrada:</label></td>
        <td>
            <input type="text" name="cilindrada" value="<?= isset($arrayCarro)? $arrayCarro["cilindrada"]: "" ?>">
        </td>
    </tr>
    <tr>
        <td><label>Marca:</label></td>
        <td>
            <input type="text" name="marca" value="<?= isset($arrayCarro)? $arrayCarro["marca"]: "" ?>">
        </td>
    </tr>
    <tr>
        <td><label>Modelo:</label></td>
        <td>
            <input type="text" name="modelo" value="<?= isset($arrayCarro)? $arrayCarro["modelo"]: "" ?>">
        </td>
    </tr>

    <tr>
        <td colspan="2"><input type="submit" value="Salvar"></td>
    </tr>
</table>
</form>
<br>
<!-- Cria um botão para voltar para a home -->
<a href="./?p=home">Voltar</a>