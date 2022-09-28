<?php
require_once("./model/aviao.php");
require_once("./config/validations.php");
require_once("./controler/aviaoController.php");

$errors = [];

$id_aviao = null;
$modelo = null;
$qdte_turbinas = null;
$capac_passageiros = null;
$capc_carga = null;
$fonte_energia = null;

if(isset($_GET["alt"])){
    //Chama a função de alterar o Array e envia o ID, a função retorna um Array
    try{
        $arrayAviao = buscarAviao((int)$_GET["alt"]);

        $id_aviao = $arrayAviao["id_aviao"] ?? null;
        $modelo = $arrayAviao['modelo'] ?? null;
        $qdte_turbinas = $arrayAviao['qdte_turbinas'] ?? null;
        $capac_passageiros = $arrayAviao['capac_passageiros'] ?? null;
        $capc_carga = $arrayAviao['capc_carga'] ?? null;
        $fonte_energia = $arrayAviao['fonte_energia'] ?? null;
    }
    catch(Exception $e){
        echo "Erro :". $e->getMessage();
        echo "<br> cod".$e->getCode();
    }
}

//Se houver Post tenta fazer o cadastro, se não nao faz nada
if (isset($_POST["modelo"])) {

    $id_aviao = $_POST['id_aviao'] ?? null;
    $modelo = $_POST['modelo'] ?? null;
    $qdte_turbinas = $_POST['qdte_turbinas'] ?? null;
    $capac_passageiros = $_POST['capac_passageiros'] ?? null;
    $capc_carga = $_POST['capc_carga'] ?? null;
    $fonte_energia = $_POST['fonte_energia'] ?? null;

    $errors = validate($_POST, [
        'modelo' => ['required'],
        'qdte_turbinas' => ['required', 'integer', 'positive'],
        'capac_passageiros' => ['required', 'integer', 'positive'],
        'capc_carga' => ['required', 'float', 'positive'],
        'fonte_energia' => 'required',
    ]);

    if (count($errors) == 0) {

        $arrayAviao = array(
            "modelo" => $_POST["modelo"],
            "qdte_turbinas" => $_POST["qdte_turbinas"],
            "capac_passageiros" => $_POST["capac_passageiros"],
            "capc_carga" => $_POST["capc_carga"],
            "fonte_energia" => $_POST["fonte_energia"],
        );

        if($id_aviao){
            $arrayAviao["id_aviao"] = $id_aviao;
        }

        //Chama a função de cadastro de aviao e envia o Array
        echo salvarAviao($arrayAviao);
    }
}
?>

<a href="./?p=aviao"><button>Voltar</button></a>

<br>
<!-- O action envia por POST o forma para o controlador -->
<div>
    <form method="post">
        <input type="hidden" name="id_aviao" value="<?= $id_aviao ?>">

        <label for="fname">Modelo:</label>
        <input type="text" name="modelo" value="<?= $modelo ?>"><br>
        <?= showErrorMessage($errors, 'modelo'); ?>

        <label>Quantidade de turbinas:</label>
        <input type="text" name="qdte_turbinas" value="<?= $qdte_turbinas ?>"><br>
        <?= showErrorMessage($errors, 'qdte_turbinas'); ?>

        <label>Capacidade de passageiros:</label>
        <input type="text" name="capac_passageiros" value="<?= $capac_passageiros ?>"><br>
        <?= showErrorMessage($errors, 'capac_passageiros'); ?>

        <label>Capacidade de carga:</label>
        <input type="text" name="capc_carga" value="<?= $capc_carga ?>"><br>
        <?= showErrorMessage($errors, 'capc_carga'); ?>

        <label>Fonte de Energia:</label>
        <input type="text" name="fonte_energia" value="<?= $fonte_energia ?>"><br>
        <?= showErrorMessage($errors, 'fonte_energia'); ?>

        <input type="submit" value="Salvar"><br>
    </form>
</div>