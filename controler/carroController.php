<?php
    // Inclui o arquivo do model
    require_once("./model/carro.php");
    
    // Cria uma função para buscar o cliente que será alterado 
    function buscarCarro($id){
        //Busca no Banco d dados o Cliente para ser alterado
        return _buscarCarro($id);
  
    }

    // Cria uma função para alterar o cliente 
    function alterarCarro($cliente){
        // Altera o cliente no Banco de dados
        return _alteraCarro($cliente);
    }

    // Recebe os dados por POST e adiciona em um Array
    if (isset($_POST["nome"])){
        $arrayCliente = array (
            "nome" => $_POST["nome"],
            "sobrenome" => $_POST["sobrenome"],
            "ddd" => $_POST["ddd"],
            "telefone" => $_POST["telefone"],
        );
        //Chama a função de cadastro de cliente e envia o Array
        echo _cadastr($arrayCliente);
        //retorna um botão de voltar pra Home
        echo '<a href="../index.php">Voltar<a/>';
    }else{
       reader("Location:../index.php");
    }

    // Cria uma função de deletar cliente
    function deletaCarro($id){
        //chama a função de deletar do BD
       return _deletaCliente($id);
    }

    // Inclui o arquivo do model
    // Cria uma função de listagem
    function _listarCliente(){
        // Chama a função de listar clientes do BD e armazena o retorno em um Array
        return $arrayClientes = listaClientes ();
    }
?>