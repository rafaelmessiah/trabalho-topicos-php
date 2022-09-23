<?php
// Cria um objeto PDO com a string de conexão do banco de dados
function conectaBD(){
    return new PDO("mysql:host=localhost; dbname=meio_transporte", "root","");
}
// Cria uma função de cadastro de cliente no BD que recebe um Array
function cadastrar($arrayAviao){
    // Chama a função que cria um objeto PDO
    $pdo = conectaBD();
    // Prepara a query retirando possíveis injections
    $sql = $pdo ->prepare("INSERT INTO aviao VALUES(null, ?, ?, ?, ?, ?)");
    // Executa a query preparada
    $sql -> execute(array_values($arrayAviao));
    // Retorna uma string
    return "Aviao Cadastrado com Sucesso!<br>";

}
//Cria uma função para alterar o cliente que recebe um Array
function alterar($aviao){
    // Chama a função que cria um objeto PDO
    $pdo = conectaBD();
    // Executa um Update na talbela clientes
    $pdo -> exec('UPDATE aviao SET 
        modelo,="'.$aviao['modelo'].'",
        qdte_turbinas="'.$aviao['qdte_turbinas'].'",
        capac_passageiros="'.$aviao['capac_passageiros'].'",
        capc_carga="'.$aviao['capc_carga']

        .'" WHERE id_aviao="'.$aviao['id_aviao'].'"');

    return "Aviao Alterado com Sucesso!<br>";
}
// Cria uma função de listar Array
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
// Cria uma função de busca de cliente que recebe um id
function buscar($id){
    // Chama a função que cria um objeto PDO
    $pdo = conectaBD();
    // Prepara a query para ser executada
    $sql = $pdo -> prepare("SELECT * FROM aviao WHERE id_aviao = :id");
    // Executa a query
    $sql -> execute(array('id' => $id));
    // Recebe um Array com o cliente selecionado
    $aviao = $sql->fetch();
    // Retorna um Array com o cliente
    return $aviao;
}
//Cria uma função para deletar no BD
function deletar($id){
    
    // Chama a função que cria um objeto PDO
    $pdo = conectaBD();
    // Executa a query para deletar
    $pdo ->exec("DELETE FROM aviao WHERE id_aviao=$id");
    // Retorna um texto
    return "Aviao $id foi deletado com sucesso!<br>";
}

?>



