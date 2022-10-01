<?php
require_once("./model/carro.php");
require_once("./config/validations.php");
require_once("./controler/carroController.php");

$errors = [];

$id_carro = null;
$renavam = null;
$cor = null;
$ano_modelo = null;
$tipo_motor = null;
$cilindrada = null;
$marca = null;
$modelo = null;

// Editar página
if(isset($_GET["alt"])){

    //Chama a função de alterar o Array e envia o ID, a função retorna um Array
    try{
        $arrayCarro = buscarCarro((int)$_GET["alt"]);

        $id_carro = $arrayCarro["id_carro"] ?? null;
        $renavam = $arrayCarro["renavam"] ?? null;
        $cor = $arrayCarro["cor"] ?? null;
        $ano_modelo = $arrayCarro["ano_modelo"] ?? null;
        $tipo_motor = $arrayCarro["tipo_motor"] ?? null;
        $cilindrada = $arrayCarro["cilindrada"] ?? null;
        $marca = $arrayCarro["marca"] ?? null;
        $modelo = $arrayCarro["modelo"] ?? null;
    }
    catch(Exception $e){
        echo "Erro :". $e->getMessage();
        echo "<br> cod".$e->getCode();
    }
}

// Posts (Cadastrar ou Atualizar)
if (isset($_POST["renavam"])) {

    $id_carro = $_POST["id_carro"] ?? null;
    $renavam = $_POST["renavam"] ?? null;
    $cor = $_POST["cor"] ?? null;
    $ano_modelo = $_POST["ano_modelo"] ?? null;
    $tipo_motor = $_POST["tipo_motor"] ?? null;
    $cilindrada = $_POST["cilindrada"] ?? null;
    $marca = $_POST["marca"] ?? null;
    $modelo = $_POST["modelo"] ?? null;

    $errors = validate($_POST, [
        'renavam' => ['required', 'integer', 'renavam'],
        'cor' => ['required', 'values[vermelho,azul,amarelo]'],
        'ano_modelo' => ['required', 'year'],
        'tipo_motor' => ['required'],
        'cilindrada' => ['required'],
        'marca' => ['required'],
        'modelo' => ['required'],
    ]);

    if(count($errors) == 0) {
        $arrayCarro = array(
            "renavam" => $renavam,
            "cor" => $cor,
            "ano_modelo" => $ano_modelo,
            "tipo_motor" => $tipo_motor,
            "cilindrada" => $cilindrada,
            "marca" => $marca,
            "modelo" => $modelo,
        );

        if($id_carro){
            $arrayCarro["id_carro"] = $id_carro;
        }

        //Chama a função de cadastro de carro e envia o Array
        echo salvarCarro($arrayCarro);
    }
}
?>

<a href="./?p=carro"><button>Voltar</button></a>

<br>
<!-- O action envia por POST o forma para o controlador -->
<div>
    <form method="post">
        <input type="hidden" name="id_carro" value="<?= $id_carro ?>">

        <label>Renavam:</label>
        <input type="text" name="renavam" value="<?= $renavam ?>"><br>
        <?= showErrorMessage($errors, 'renavam'); ?>

        <label>Cor:</label>
        <input type="text" name="cor" value="<?= $cor ?>"><br>
        <?= showErrorMessage($errors, 'cor'); ?>

        <label>Ano do modelo:</label>
        <input type="text" name="ano_modelo" value="<?= $ano_modelo ?>"><br>
        <?= showErrorMessage($errors, 'ano_modelo'); ?>

        <label>Tipo de motor:</label>
        <input type="text" name="tipo_motor" value="<?= $tipo_motor ?>"><br>
        <?= showErrorMessage($errors, 'tipo_motor'); ?>

        <label>Cilindrada:</label>
        <input type="text" name="cilindrada" value="<?= $cilindrada ?>"><br>
        <?= showErrorMessage($errors, 'cilindrada'); ?>

        <label>Marca:</label>
        <input type="text" name="marca" value="<?= $marca ?>"><br>
        <?= showErrorMessage($errors, 'marca'); ?>

        <label>Modelo:</label>
        <input type="text" name="modelo" value="<?= $modelo ?>"><br>
        <?= showErrorMessage($errors, 'modelo'); ?>

        <input type="submit" value="Salvar"><br>
    </form>
</div>