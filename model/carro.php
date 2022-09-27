<?php
// Cria um objeto PDO com a string de conexão do banco de dados
function conectaBD()
{
    return new PDO("mysql:host=db-mysql; dbname=meio_transporte", "root", "root");
}

// Cria uma função de cadastro no BD do que recebe em um Array
function _cadastrarCarro($arrayCarro)
{
    $pdo = conectaBD();
    $sql = $pdo->prepare("INSERT INTO carro VALUES(null, ?, ?, ?, ?, ?, ?, ?)");
    $sql->execute(array_values($arrayCarro));

    return "Carro Cadastrado com Sucesso!<br>";

}

// Cria uma função para alterar o que recebe em um Array
function _alterarCarro($carro)
{
    $pdo = conectaBD();
    $pdo->exec('UPDATE carro SET 
        renavam,="' . $carro['renavam'] . '",
        cor="' . $carro['cor'] . '",
        ano_modelo="' . $carro['ano_modelo'] . '",
        tipo_motor="' . $carro['tipo_motor'] . '",
        cilindrada="' . $carro['cilindrada'] . '",
        marca="' . $carro['marca'] . '",
        modelo="' . $carro['modelo']

        . '" WHERE id_carro="' . $carro['id_carro'] . '"');

    return "Carro Alterado com Sucesso!<br>";
}

// Cria uma função de listar Array
function _listarCarro()
{
    // Chama a função que cria um objeto PDO
    $pdo = conectaBD();
    // Prepara a query para ser executada
    $sql = $pdo->prepare("SELECT * FROM carro");
    // Executa a query
    $sql->execute();
    // Armazena o retorno em um Array
    $carros = $sql->fetchAll();
    // Retorna o Array preenchido
    return $carros;

}

// Cria uma função de busca recebendo um id
function _buscarCarro($id)
{
    $pdo = conectaBD();
    $sql = $pdo->prepare("SELECT * FROM carro WHERE id_carro = :id");
    $sql->execute(array('id' => $id));
    return $sql->fetch();
}

//Cria uma função para deletar no BD
function _deletarCarro($id)
{
    $pdo = conectaBD();
    $pdo->exec("DELETE FROM carro WHERE id_carro=$id");

    return "Carro $id foi deletado com sucesso!<br>";
}



