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
<br><br>
<form method="post">
<!-- Preenche o value dos campos dos formulários com os dados -->
<input type="hidden" name="id_trem" value="<?= isset($arrayTrem)? $arrayTrem['id_trem'] : "" ?>">

    <label>Modelo:</label>        
    <input type="text" name="modelo" value="<?= isset($arrayTrem)? $arrayTrem["modelo"]: "" ?>"><br>

    <label>Cor:</label>
    <input type="text" name="cor" value="<?= isset($arrayTrem)? $arrayTrem["cor"]: "" ?>"><br>
        
    <label>Capacidade de passageiros:</label>
    <input type="text" name="capacidade_passageiro" value="<?= isset($arrayTrem)? $arrayTrem["capacidade_passageiro"]: "" ?>"><br>
        
    <label>Quantidade de Vagões:</label>
    <input type="text" name="qtde_vagoes" value="<?= isset($arrayTrem)? $arrayTrem["qtde_vagoes"]: "" ?>"><br>
        
    <label>Fonte de Energia:</label>
    <input type="text" name="fonte_energia" value="<?= isset($arrayTrem)? $arrayTrem["fonte_energia"]: "" ?>"><br>
    
    <label>Fabricante:</label>
    <input type="text" name="fabricante" value="<?= isset($arrayTrem)? $arrayTrem["fabricante"]: "" ?>"><br>
    
    <input type="submit" value="Salvar">
    
</form>
<br>
<a href="./?p=trem">Voltar</a>