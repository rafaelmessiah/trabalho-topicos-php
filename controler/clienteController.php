<?php
    // Inclui o arquivo do model
    require_once("./model/cliente.php");
    // Cria uma função para buscar o cliente que será alterado 
    function alterarClientes($id){
        //Busca no Banco de dados o Cliente para ser alterado
        return buscaCliente ($id);
  
    }

    // Cria uma função para alterar o cliente 
    function alterarCli($cliente){
        // Altera o cliente no Banco de dados
        return alteraCliente($cliente);
    }
?>


<?php
    // Inclui o arquivo do model
    require_once("../model/cliente.php");
    // Recebe os dados por POST e adiciona em um Array
    if (isset($_POST["nome"])){
        $arrayCliente = array (
            "nome" => $_POST["nome"],
            "sobrenome" => $_POST["sobrenome"],
            "ddd" => $_POST["ddd"],
            "telefone" => $_POST["telefone"],
        );
        //Chama a função de cadastro de cliente e envia o Array
        echo cadCliente($arrayCliente);
        //retorna um botão de voltar pra Home
        echo '<a href="../index.php">Voltar<a/>';
    }else{
       reader("Location:../index.php");
    }
?>


<?php
    // Inclui o arquivo do model
    require_once("./model/cliente.php");
    // Cria uma função de deletar cliente
    function deletaCli($id){
        //chama a função de deletar do BD
       return deletaCliente($id);
    }
?>

<?php
    // Inclui o arquivo do model
    require_once("./model/cliente.php");
  // Cria uma função de listagem
  function listarCliente(){
      // Chama a função de listar clientes do BD e armazena o retorno em um Array
      return $arrayClientes = listaClientes ();
  }
?>