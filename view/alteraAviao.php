<br><br>
<?php
    // Inclui o arquivo de controle
    require_once("./controler/aviaoController.php");
    
    if(isset($_GET["alt"])){
        //Chama a função de alterar o Array e envia o ID, a função retorna um Array
        try{
            $arrayAviao = buscarAviao((int)$_GET["alt"]);
        }
        catch(Exception $e){
            echo "Erro :". $e->getMessage();
            echo "<br> cod".$e->getCode();
        }
    }

    //Se o formulário foi enviado preenche um Array com os novos dados
    if(isset($_POST["id_aviao"])){
        $arrayAviao = array (
            "id_aviao" => $_POST["id_aviao"],
            "modelo" => $_POST["modelo"],
            "qdte_turbinas" => $_POST["qdte_turbinas"],
            "capac_passageiros" => $_POST["capac_passageiros"],
            "capc_carga" => $_POST["capc_carga"],
        );
        //Chama a função para alterar o cliente e envia o Array alterado, a função retona uma string
        echo alterarAviao($arrayAviao);
        //retorna um botão de voltar pra Home
        echo '<a href="./?p=aviao"><button>Voltar</button></a>';
    }
?>
<br>
<div>
<form method="post">
<!-- Preenche o value dos campos dos formulários com os dados -->
<input type="hidden" name="id_aviao" value="<?= isset($arrayAviao)? $arrayAviao['id_aviao'] : "" ?>">

    <label>Modelo:</label>
    <input type="text" name="modelo" value="<?= isset($arrayAviao)? $arrayAviao["modelo"]: "" ?>"><br>

    <label>Quantidade de turbinas:</label>
    <input type="text" name="qdte_turbinas" value="<?= isset($arrayAviao)? $arrayAviao["qdte_turbinas"]: "" ?>"><br>

    <label>Capacidade de passageiros:</label>
    <input type="text" name="capac_passageiros" value="<?= isset($arrayAviao)? $arrayAviao["capac_passageiros"]: "" ?>"><br>

    <label>Capacidade de carga:</label>
    <input type="text" name="capc_carga" value="<?= isset($arrayAviao)? $arrayAviao["capc_carga"]: "" ?>"><br>

    <input type="submit" value="Salvar">
</form>
</div>