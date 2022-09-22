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
        return _alterarCarro($cliente);
    }

    // Recebe os dados por POST e adiciona em um Array
    if (isset($_POST["renavam"])){
        $arrayCarro = array (
            "renavam" => $_POST["renavam"],
            "cor" => $_POST["cor"],
            "ano_modelo" => $_POST["ano_modelo"],
            "tipo_motor" => $_POST["tipo_motor"],
            "cilindrada" => $_POST["cilindrada"],
            "marca" => $_POST["marca"],
            "modelo" => $_POST["modelo"],
        );
        //Chama a função de cadastro de cliente e envia o Array
        echo _cadastrarCarro($arrayCarro);
        //retorna um botão de voltar pra Home
        echo '<a href="../index.php">Voltar<a/>';
    }else{
       header("Location: ./?p=home");
        echo 'teste';
    }

    // Cria uma função de deletar cliente
    function deletarCarro($id){
        //chama a função de deletar do BD
       return _deletarCarro($id);
    }

    // Inclui o arquivo do model
    // Cria uma função de listagem
    function listarCarro(){
        // Chama a função de listar clientes do BD e armazena o retorno em um Array
        return $arrayClientes = _listarCarro ();
    }
?>