<?php
require_once("./model/trem.php");
require_once("./config/validations.php");
require_once("./controler/tremController.php");

$errors = [];

$id_trem = null;
$modelo = null;
$cor = null;
$capacidade_passageiro = null;
$qtde_vagoes = null;
$fonte_energia = null;
$fabricante = null;

if(isset($_GET["alt"])){
    //Chama a função de alterar o Array e envia o ID, a função retorna um Array
    try{
        $arrayTrem = buscarTrem((int)$_GET["alt"]);

        $id_trem = $arrayTrem['id_trem'] ?? null;
        $modelo = $arrayTrem['modelo'] ?? null;
        $cor = $arrayTrem['cor'] ?? null;
        $capacidade_passageiro = $arrayTrem['capacidade_passageiro'] ?? null;
        $qtde_vagoes = $arrayTrem['qtde_vagoes'] ?? null;
        $fonte_energia = $arrayTrem['fonte_energia'] ?? null;
        $fabricante = $arrayTrem['fabricante'] ?? null;
    }
    catch(Exception $e){
        echo "Erro :". $e->getMessage();
        echo "<br> cod".$e->getCode();
    }
}

//Se houver Post tenta fazer o cadastro, se não nao faz nada
if (isset($_POST["modelo"])) {

    $id_trem = $_POST['id_trem'] ?? null;
    $modelo = $_POST['modelo'] ?? null;
    $cor = $_POST['cor'] ?? null;
    $capacidade_passageiro = $_POST['capacidade_passageiro'] ?? null;
    $qtde_vagoes = $_POST['qtde_vagoes'] ?? null;
    $fonte_energia = $_POST['fonte_energia'] ?? null;
    $fabricante = $_POST['fabricante'] ?? null;

    $errors = validate($_POST, [
        'modelo' => ['required'],
        'cor' => ['required', 'values[vermelho,azul,amarelo]'],
        'capacidade_passageiro' => ['required', 'integer', 'positive'],
        'qtde_vagoes' => ['required', 'integer', 'positive'],
        'fonte_energia' => ['required'],
        'fabricante' => ['required'],
    ]);

    if (count($errors) == 0) {
        $arrayTrem = array(
            "modelo" => $_POST["modelo"],
            "cor" => $_POST["cor"],
            "capacidade_passageiro" => $_POST["capacidade_passageiro"],
            "qtde_vagoes" => $_POST["qtde_vagoes"],
            "fonte_energia" => $_POST["fonte_energia"],
            "fabricante" => $_POST["fabricante"],
        );

        if($id_trem){
            $arrayTrem["id_trem"] = $id_trem;
        }

        //Chama a função de cadastro de trem e envia o Array
        echo salvarTrem($arrayTrem);
    }
}
?>

<a href="./?p=trem"><button>Voltar</button><a/>

<br>
<!-- O action envia por POST o forma para o controlador -->
<div>
    <form method="post">
        <input type="hidden" name="id_trem" value="<?= $id_trem ?>">

        <label>Modelo:</label>
        <input type="text" name="modelo" value="<?= $modelo ?>"><br>
        <?= showErrorMessage($errors, 'modelo'); ?>

        <label>Cor:</label>
        <input type="text" name="cor" value="<?= $cor ?>"><br>
        <?= showErrorMessage($errors, 'cor'); ?>

        <label>Capacidade de passageiros:</label>
        <input type="text" name="capacidade_passageiro" value="<?= $capacidade_passageiro ?>"><br>
        <?= showErrorMessage($errors, 'capacidade_passageiro'); ?>

        <label>Quantidade de Vagões:</label>
        <input type="text" name="qtde_vagoes" value="<?= $qtde_vagoes ?>"><br>
        <?= showErrorMessage($errors, 'qtde_vagoes'); ?>

        <label>Fonte de Energia:</label>
        <input type="text" name="fonte_energia" value="<?= $fonte_energia ?>"><br>
        <?= showErrorMessage($errors, 'fonte_energia'); ?>

        <label>Fabricante:</label>
        <input type="text" name="fabricante" value="<?= $fabricante ?>"><br>
        <?= showErrorMessage($errors, 'fabricante'); ?>

        <input type="submit" value="Salvar"><br>
    </form>
</div>