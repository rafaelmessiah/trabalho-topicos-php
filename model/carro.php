<?php
// Cria um objeto PDO com a string de conexão do banco de dados
function conectaBD(){
    return new PDO("mysql:host=localhost; dbname=meio_transporte", "root","");
}
// Cria uma função de cadastro de cliente no BD que recebe um Array
function _cadastrarCarro($arrayCarro){
    // Chama a função que cria um objeto PDO
    $pdo = conectaBD();
    // Prepara a query retirando possíveis injections
    $sql = $pdo ->prepare("INSERT INTO carro VALUES(null, ?, ?, ?, ?, ?, ?, ?)");
    // Executa a query preparada
    $sql -> execute(array_values($arrayCarro));
    // Retorna uma string
    return "Carro Cadastrado com Sucesso!<br>";

}
// Cria uma função para alterar o cliente que recebe um Array
function _alterarCarro($carro){
    // Chama a função que cria um objeto PDO
    $pdo = conectaBD();
    // Executa um Update na talbela clientes
    $pdo -> exec('UPDATE carro SET 
        renavam,="'.$carro['renavam'].'",
        cor="'.$carro['cor'].'",
        ano_modelo="'.$carro['ano_modelo'].'",
        tipo_motor="'.$carro['tipo_motor'].'",
        cilindrada="'.$carro['cilindrada'].'",
        marca="'.$carro['marca'].'",
        modelo="'.$carro['modelo']

        .'" WHERE id_carro="'.$carro['id_carro'].'"');

    return "Carro Alterado com Sucesso!<br>";
}
// Cria uma função de listar Array
function _listarCarro (){
    // Chama a função que cria um objeto PDO
    $pdo = conectaBD();
    // Prepara a query para ser executada
    $sql = $pdo -> prepare("SELECT * FROM carro");
    // Executa a query
    $sql -> execute();
    // Armazena o retorno em um Array
    $carros = $sql -> fetchAll();
    // Retorna o Array preenchido
    return $carros;
    
}
// Cria uma função de busca de cliente que recebe um id
function _buscarCarro($id){
    // Chama a função que cria um objeto PDO
    $pdo = conectaBD();
    // Prepara a query para ser executada
    $sql = $pdo -> prepare("SELECT * FROM carro WHERE id_carro = :id");
    // Executa a query
    $sql -> execute(array('id' => $id));
    // Recebe um Array com o cliente selecionado
    $carro = $sql->fetch();
    // Retorna um Array com o cliente
    return $carro;
}
//Cria uma função para deletar no BD
function _deletarCarro($id){
    
    // Chama a função que cria um objeto PDO
    $pdo = conectaBD();
    // Executa a query para deletar
    $pdo ->exec("DELETE FROM carro WHERE id_carro=$id");
    // Retorna um texto
    return "Carro $id foi deletado com sucesso!<br>";
}

?>



