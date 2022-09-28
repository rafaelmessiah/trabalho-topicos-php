<?php
// Arquivo Model
require_once("./model/trem.php");

//Chama a função de Busca da model
function buscarTrem($id)
{
    return _buscarTrem($id);
}

//Chama a função de Cadastro da model
function cadastrarTrem($trem)
{
    return _cadastrarTrem($trem);
}

//Chama a função de Alterar da model
function alterarTrem($trem)
{
    return _alterarTrem($trem);
}

//Chama a função de Deletar da model
function deletarTrem($id)
{
    return _deletarTrem($id);
}

// Cria uma função de Listagem da model
function listarTrem()
{
    return $arrayTrems = _listarTrem();
}

function salvarTrem($trem)
{
    if(!empty($trem['id_trem'])) return _alterarTrem($trem);

    return _cadastrarTrem($trem);
}