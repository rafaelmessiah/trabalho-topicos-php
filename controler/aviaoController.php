<?php
    // Inclui o arquivo do model
    require_once("./model/aviao.php");
    
    // Cria uma função para buscar o cliente que será alterado 
    function buscarAviao($id){
        //Busca no Banco d dados o Cliente para ser alterado
        return _buscarAviao($id);
  
    }

    // Cria uma função para alterar o cliente 
    function alterarAviao($cliente){
        // Altera o cliente no Banco de dados
        return _alterarAviao($aviao);
    }

    // Recebe os dados por POST e adiciona em um Array
    if (isset($_POST["modelo"])){
        $arrayAviao = array (
            "modelo" => $_POST["cor"],
            "qdte_turbinas" => $_POST["ano_modelo"],
            "capac_passageiros" => $_POST["tipo_motor"],
            "capc_carga" => $_POST["cilindrada"],
            "comercial" => $_POST["marca"],
        );
        //Chama a função de cadastro de cliente e envia o Array
        echo _cadastrarAviao($arrayAviao);
        //retorna um botão de voltar pra Home
        echo '<a href="../index.php">Voltar<a/>';
    }else{
        header("Location: ./?p=home");
    }

    // Cria uma função de deletar cliente
    function deletarAviao($id){
        //chama a função de deletar do BD
       return _deletarAviao($id);
    }

    // Inclui o arquivo do model
    // Cria uma função de listagem
    function listarAviao(){
        // Chama a função de listar clientes do BD e armazena o retorno em um Array
        return $arrayAvioes = _listarAviao ();
    }
?>