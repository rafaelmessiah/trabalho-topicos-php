<br><br>
<?php
    // Inclui o arquivo de controle
    require_once("./controler/aviaoController.php");
    if(isset($_GET["alt"])){
        //Chama a função de alterar o Array e envia o ID, a função retorna um Array
        try{
        $arrayAviao = alterarAviao((int)$_GET["alt"]);
        
        throw new Exception('dentro do.', 45);
    }catch(Exception $e){
        echo "Erro :". $e->getMessage();
        echo "<br> cod".$e->getCode();
    }
    }
    //Se o formulário foi enviado preenche um Array com os novos dados
    if(isset($_POST["id_aviao"])){
        $arrayAviao = array (
            "id" => $_POST["id_aviao"],
            "modelo" => $_POST["modelo"],
            "qdte_turbinas" => $_POST["qdte_turbinas"],
            "capac_passageiros" => $_POST["capac_passageiros"],
            "capc_carga" => $_POST["capc_carga"],
        );
        //Chama a função para alterar o cliente e envia o Array alterado, a função retona uma string
        echo alterarAviao($arrayAviao);
    }
?>
<form method="post">
<!-- Preenche o value dos campos dos formulários com os dados -->
<input type="hidden" name="id" value="<?= isset($arrayAviao)? $arrayAviao['id_aviao'] : "" ?>">
<table>
    <tr>
        <td><label>Modelo:</label></td>
        <td>
            <input type="text" name="modelo" value="<?= isset($arrayAviao)? $arrayAviao["modelo"]: "" ?>">
        </td>
    </tr>
    <tr>
        <td><label>Quantidade de turbinas:</label></td>
        <td>
            <input type="text" name="qdte_turbinas" value="<?= isset($arrayAviao)? $arrayAviao["qdte_turbinas"]: "" ?>">
        </td>
    </tr>
    <tr>
        <td><label>Capacidade de passageiros:</label></td>
        <td>
            <input type="text" name="capac_passageiros" value="<?= isset($arrayAviao)? $arrayAviao["capac_passageiros"]: "" ?>">
        </td>
    </tr>
    <tr>
        <td><label>Capacidade de carga:</label></td>
        <td>
            <input type="text" name="capc_carga" value="<?= isset($arrayAviao)? $arrayAviao["capc_carga"]: "" ?>">
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