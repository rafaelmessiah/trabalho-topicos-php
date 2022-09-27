<?php
require_once("./config/conn.php");

/**
 * Cadastra um Avião
 * Recebe: Array com os dados
 * Retorna: Mensagem de Sucesso
 */
function cadastrar($arrayAviao){
    try{
        // Chama a função que cria um objeto PDO
        $pdo = conectaBD();
        // Prepara a query retirando possíveis injections
        $sql = $pdo ->prepare("INSERT INTO aviao VALUES(null, ?, ?, ?, ?, ?)");
        // Executa a query preparada
        $sql -> execute(array_values($arrayAviao));
        // Retorna uma string
        return "Avião Cadastrado com Sucesso!<br>";
    }catch(Exception $e){
        echo "Erro :". $e->getMessage();
        echo "<br> cod".$e->getCode();
    }
}

/**
 * Altera os dados de um Avião existente
 * Recebe: Array com os dados
 * Retorna: Mensagem de Sucesso
 */
function alterar($aviao){
    try{
        // Chama a função que cria um objeto PDO
        $pdo = conectaBD();
        // Executa um Update na tabela aviao
        $pdo -> exec('UPDATE aviao SET 
            modelo="'.$aviao['modelo'].'",
            qdte_turbinas="'.$aviao['qdte_turbinas'].'",
            capac_passageiros="'.$aviao['capac_passageiros'].'",
            capc_carga="'.$aviao['capc_carga'].'",
            fonte_energia="'.$aviao['fonte_energia']
        
            .'" WHERE id_aviao="'.$aviao['id_aviao'].'"');
        
        return "Avião Alterado com Sucesso!<br>";
    }catch(Exception $e){
        echo "Erro :". $e->getMessage();
        echo "<br> cod".$e->getCode();
    }
}

/**
 * Retorna uma lista de Avião cadastrados
 * Retorna: Arrays de Avião
 */
function listar (){
    try{
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
    }catch(Exception $e){
        echo "Erro :". $e->getMessage();
        echo "<br> cod".$e->getCode();
    }
}

/**
 * Busca um Avião através do seu id
 * Recebe: id do Avião
 * Retorna: Dados do Avião em um Array
 */
function buscar($id){
    try{
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
    }catch(Exception $e){
        echo "Erro :". $e->getMessage();
        echo "<br> cod".$e->getCode();
    }
}

/**
 * Deleta um Avião através do seu id
 * Recebe: id do Avião
 * Retorna: Mensagem de Sucesso
 */
function deletar($id){
    try{
        // Chama a função que cria um objeto PDO
        $pdo = conectaBD();
        // Executa a query para deletar
        $pdo ->exec("DELETE FROM aviao WHERE id_aviao=$id");
        // Retorna um texto
        return "Aviao $id foi deletado com sucesso!<br>";
    }catch(Exception $e){
        echo "Erro :". $e->getMessage();
        echo "<br> cod".$e->getCode();
    }
}

?>



