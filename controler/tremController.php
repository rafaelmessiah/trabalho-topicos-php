<?php
    // Inclui o arquivo do model
    require_once("./model/trem.php");
    
    // Cria uma função para buscar o trem que será alterado 
    function buscarTrem($id){
        //Busca no Banco d dados o Trem para ser alterado
        return _buscarTrem($id);
  
    }

    // Cria uma função para alterar o trem 
    function alterarTrem($trem){
        // Altera o trem no Banco de dados
        return _alterarTrem($trem);
    }

    // Recebe os dados por POST e adiciona em um Array
    if (isset($_POST["modelo"])){
        $arrayTrem = array (
            "modelo" => $_POST["modelo"],
            "cor" => $_POST["cor"],
            "capacidade_passageiro" => $_POST["capacidade_passageiro"],
            "qtde_vagoes" => $_POST["qtde_vagoes"],
            "fonte_energia" => $_POST["fonte_energia"],
            "fabricante" => $_POST["fabricante"],
        );
        //Chama a função de cadastro de trem e envia o Array
        echo _cadastrarTrem($arrayTrem);
        //retorna um botão de voltar pra Home
        echo '<a href="../index.php">Voltar<a/>';
    }else{
        header("Location: ./?p=home");
    }

    // Cria uma função de deletar trem
    function deletarTrem($id){
        //chama a função de deletar do BD
       return _deletarTrem($id);
    }

    // Inclui o arquivo do model
    // Cria uma função de listagem
    function listarTrem(){
        // Chama a função de listar trems do BD e armazena o retorno em um Array
        return $arrayTrems = _listarTrem ();
    }
?>