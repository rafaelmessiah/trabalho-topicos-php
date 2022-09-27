<?php
// Conexão com Banco
function conectaBD(){
    return new PDO("mysql:host=db-mysql; dbname=meio_transporte", "root","root");
}

/**
 * Cadastra um Trem
 * Recebe: Array com os dados
 * Retorna: Mensagem de Sucesso
 */
function _cadastrarTrem($arrayTrem){
    // Faz conexão com banco
    $pdo = conectaBD();
    // Prepara a query retirando possíveis injections
    $sql = $pdo ->prepare("INSERT INTO trem VALUES(null, ?, ?, ?, ?, ?, ?)");
    // Executa a query preparada
    $sql -> execute(array_values($arrayTrem));
    // Retorna uma string
    return "Trem Cadastrado com Sucesso!<br>";

}

/**
 * Altera os dados de um Trem existente
 * Recebe: Array com os dados
 * Retorna: Mensagem de Sucesso
 */
function _alterarTrem($trem){
    // Chama a função que cria um objeto PDO
    $pdo = conectaBD();
    // Executa um Update na talbela clientes
    $pdo -> exec('UPDATE trem SET 
        modelo="'.$trem['modelo'].'",
        cor="'.$trem['cor'].'",
        capacidade_passageiro="'.$trem['capacidade_passageiro'].'",
        qtde_vagoes="'.$trem['qtde_vagoes'].'",
        fonte_energia="'.$trem['fonte_energia'].'",
        fabricante="'.$trem['fabricante']

        .'" WHERE id_trem="'.$trem['id_trem'].'"');

    return "Trem Alterado com Sucesso!<br>";
}

/**
 * Retorna uma lista de Trens cadastrados
 * Retorna: Arrays de Trems
 */
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

/**
 * Busca um Trem através do seu id
 * Recebe: id do trem
 * Retorna: Dados do Trem em um Array
 */
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

/**
 * Deleta um Trem através do seu id
 * Recebe: id do trem
 * Retorna: Mensagem de Sucesso
 */
function _deletarTrem($id){
    
    // Chama a função que cria um objeto PDO
    $pdo = conectaBD();
    // Executa a query para deletar
    $pdo ->exec("DELETE FROM trem WHERE id_trem=$id");
    // Retorna um texto
    return "Trem $id foi deletado com sucesso!<br>";
}

?>



