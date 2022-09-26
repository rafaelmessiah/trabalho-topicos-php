<?php
    // Inclui o arquivo do model
    require_once("./model/aviao.php");
    
    //Cria uma função para buscar o avião que será alterado 
    function buscarAviao($id){
        return buscar($id);
    }

    //Cria uma função para alterar o avião 
    function alterarAviao($aviao){
        return alterar($aviao);
    }

    //Chama a função de Cadastro da model
    function cadastrarTrem($aviao){
        return cadastrar($aviao);
    }

    //Cria uma função de deletar avião
    function deletarAviao($id){
       return deletar($id);
    }

    //Cria uma função de listagem
    function listarAviao(){
        return $arrayAvioes = listar();
    }
?>