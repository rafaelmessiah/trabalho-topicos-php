<?php
// Arquivo model
require_once("./model/carro.php");

//Chama a função de Busca da model
function buscarCarro($id)
{
    return _buscarCarro($id);

}

// Chama a função para alterar
function salvarCarro($cliente)
{
    if(!empty($cliente['id_carro'])) return _alterarCarro($cliente);

    return _cadastrarCarro($cliente);
}