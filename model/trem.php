<?php
// Cria um objeto PDO com a string de conexão do banco de dados
function conectaBD(){
    return new PDO("mysql:host=localhost; dbname=meio_transporte", "root","");
}
// Cria uma função de cadastro de cliente no BD que recebe um Array
function _cadastrarTrem($arrayTrem){
    // Chama a função que cria um objeto PDO
    $pdo = conectaBD();
    // Prepara a query retirando possíveis injections
    $sql = $pdo ->prepare("INSERT INTO trem VALUES(null, ?, ?, ?, ?, ?, ?)");
    // Executa a query preparada
    $sql -> execute(array_values($arrayTrem));
    // Retorna uma string
    return "Trem Cadastrado com Sucesso!<br>";

}
// Cria uma função para alterar o cliente que recebe um Array
function _alterarTrem($trem){
    // Chama a função que cria um objeto PDO
    $pdo = conectaBD();
    // Executa um Update na talbela clientes
    $pdo -> exec('UPDATE trem SET 
        modelo,="'.$trem['modelo'].'",
        cor="'.$trem['cor'].'",
        capacidade_passageiro="'.$trem['capacidade_passageiro'].'",
        qtde_vagoes="'.$trem['qtde_vagoes'].'",
        fonte_energia="'.$trem['fonte_energia'].'",
        fabricante="'.$trem['fabricante']

        .'" WHERE id_trem="'.$trem['id'].'"');

    return "Trem Alterado com Sucesso!<br>";
}
// Cria uma função de listar Array
function _listarTrem (){
    // Chama a função que cria um objeto PDO
    $pdo = conectaBD();
    // Prepara a query para ser executada
    $sql = $pdo -> prepare("SELECT * FROM trem");
    // Executa a query
    $sql -> execute();
    // Armazena o retorno em um Array
    $trens = $sql -> fetchAll();
    // Retorna o Array preenchido
    return $trens;
    
}
// Cria uma função de busca de cliente que recebe um id
function _buscarTrem($id){
    // Chama a função que cria um objeto PDO
    $pdo = conectaBD();
    // Prepara a query para ser executada
    $sql = $pdo -> prepare("SELECT * FROM trem WHERE id_trem = :id");
    // Executa a query
    $sql -> execute(array('id' => $id));
    // Recebe um Array com o cliente selecionado
    $trem = $sql->fetch();
    // Retorna um Array com o cliente
    return $trem;
}
//Cria uma função para deletar no BD
function _deletarTrem($id){
    
    // Chama a função que cria um objeto PDO
    $pdo = conectaBD();
    // Executa a query para deletar
    $pdo ->exec("DELETE FROM trem WHERE id_trem=$id");
    // Retorna um texto
    return "Trem $id foi deletado com sucesso!<br>";
}

?>



