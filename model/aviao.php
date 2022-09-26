<?php
// Conexão com Banco
function conectaBD(){
    return new PDO("mysql:host=localhost; dbname=meio_transporte", "root","");
}

/**
 * Cadastra um Avião
 * Recebe: Array com os dados
 * Retorna: Mensagem de Sucesso
 */
function cadastrar($arrayAviao){
    print_r($arrayAviao);
    // Chama a função que cria um objeto PDO
    $pdo = conectaBD();
    // Prepara a query retirando possíveis injections
    $sql = $pdo ->prepare("INSERT INTO aviao VALUES(null, ?, ?, ?, ?)");
    // Executa a query preparada
    $sql -> execute(array_values($arrayAviao));
    print_r($sql);die;
    // Retorna uma string
    return "Avião Cadastrado com Sucesso!<br>";

}

/**
 * Altera os dados de um Avião existente
 * Recebe: Array com os dados
 * Retorna: Mensagem de Sucesso
 */
function alterar($aviao){
    // Chama a função que cria um objeto PDO
    $pdo = conectaBD();
    // Executa um Update na tabela aviao
    $pdo -> exec('UPDATE aviao SET 
        modelo,="'.$aviao['modelo'].'",
        qdte_turbinas="'.$aviao['qdte_turbinas'].'",
        capac_passageiros="'.$aviao['capac_passageiros'].'",
        capc_carga="'.$aviao['capc_carga']

        .'" WHERE id_aviao="'.$aviao['id_aviao'].'"');

    return "Avião Alterado com Sucesso!<br>";
}

/**
 * Retorna uma lista de Avião cadastrados
 * Retorna: Arrays de Avião
 */
function listar (){
    // Chama a função que cria um objeto PDO
    $pdo = conectaBD();
    // Prepara a query para ser executada
    $sql = $pdo -> prepare("SELECT * FROM aviao");
    // Executa a query
    $sql -> execute();
    // Armazena o retorno em um Array
    $avioes = $sql -> fetchAll();
    // Retorna o Array preenchido
    return $avioes;
    
}

/**
 * Busca um Avião através do seu id
 * Recebe: id do Avião
 * Retorna: Dados do Avião em um Array
 */
function buscar($id){
    // Chama a função que cria um objeto PDO
    $pdo = conectaBD();
    // Prepara a query para ser executada
    $sql = $pdo -> prepare("SELECT * FROM aviao WHERE id_aviao = :id");
    // Executa a query
    $sql -> execute(array('id' => $id));
    // Recebe um Array com o avião selecionado
    $aviao = $sql->fetch();
    // Retorna um Array com o avião
    return $aviao;
}

/**
 * Deleta um Avião através do seu id
 * Recebe: id do Avião
 * Retorna: Mensagem de Sucesso
 */
function deletar($id){
    
    // Chama a função que cria um objeto PDO
    $pdo = conectaBD();
    // Executa a query para deletar
    $pdo ->exec("DELETE FROM aviao WHERE id_aviao=$id");
    // Retorna um texto
    return "Aviao $id foi deletado com sucesso!<br>";
}

?>



