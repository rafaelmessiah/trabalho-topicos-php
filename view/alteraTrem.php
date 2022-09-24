<br><br>
<?php
    // Inclui o arquivo de controle
    require_once("./controler/tremController.php");
    
    if(isset($_GET["alt"])){
        //Chama a função de alterar o Array e envia o ID, a função retorna um Array
        try{
            $arrayTrem = buscarTrem((int)$_GET["alt"]);
        }
        catch(Exception $e){
            echo "Erro :". $e->getMessage();
            echo "<br> cod".$e->getCode();
        }
    }

    //Se o formulário foi enviado preenche um Array com os novos dados
    if(isset($_POST["id_trem"])){
        $arrayTrem = array (
            "id_trem" => $_POST["id_trem"],
            "modelo" => $_POST["modelo"],
            "cor" => $_POST["cor"],
            "capacidade_passageiro" => $_POST["capacidade_passageiro"],
            "qtde_vagoes" => $_POST["qtde_vagoes"],
            "fonte_energia" => $_POST["fonte_energia"],
            "fabricante" => $_POST["fabricante"],
        );
        //Chama a função para alterar o cliente e envia o Array alterado, a função retona uma string
        echo alterarTrem($arrayTrem);
    }
?>
<form method="post">
<!-- Preenche o value dos campos dos formulários com os dados -->
<input type="hidden" name="id_trem" value="<?= isset($arrayTrem)? $arrayTrem['id_trem'] : "" ?>">
<table>
    <tr>
        <td><label>Modelo:</label></td>
        <td>
            <input type="text" name="modelo" value="<?= isset($arrayTrem)? $arrayTrem["modelo"]: "" ?>">
        </td>
    </tr>
    <tr>
        <td><label>Cor:</label></td>
        <td>
            <input type="text" name="cor" value="<?= isset($arrayTrem)? $arrayTrem["cor"]: "" ?>">
        </td>
    </tr>
    <tr>
        <td><label>Capacidade de passageiros:</label></td>
        <td>
            <input type="text" name="capacidade_passageiro" value="<?= isset($arrayTrem)? $arrayTrem["capacidade_passageiro"]: "" ?>">
        </td>
    </tr>
    <tr>
        <td><label>Quantidade de Vagões:</label></td>
        <td>
            <input type="text" name="qtde_vagoes" value="<?= isset($arrayTrem)? $arrayTrem["qtde_vagoes"]: "" ?>">
        </td>
    </tr>
    <tr>
        <td><label>Fonte de Energia:</label></td>
        <td>
            <input type="text" name="fonte_energia" value="<?= isset($arrayTrem)? $arrayTrem["fonte_energia"]: "" ?>">
        </td>
    </tr>
    <tr>
        <td><label>Fabricante:</label></td>
        <td>
            <input type="text" name="fabricante" value="<?= isset($arrayTrem)? $arrayTrem["fabricante"]: "" ?>">
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