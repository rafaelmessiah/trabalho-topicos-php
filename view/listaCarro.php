<?php
echo "<h1> Página de Carro</h1> <br> <a href='./?p=cadCarro'>Cadastro de Carro</a> ";
// Inclui o arquivo de controle
require_once("./controler/carroController.php");
//Chama a função de listar
$arrayTrens = _listarCarro();
//Cria uma variável para concatenar os retornos
$listaCarro = "<br><br><table>";
//Percorre o Array
foreach($arrayTrens as $carro){
    //Concatena em string o resultado do Array
    $listaCarro .='<tr>'
        .'<td><a href="?p=deletaCarro&del='.$carro["id_carro"].'"> Deletar </a></td>'
        .'<td><a href="?p=alteraCarro&alt='.$carro["id_carro"].'"> Alterar </a></td>'
        ."<td>Renavam: ".$carro["renavam"]."</td>"
        ."<td>Cor: ".$carro["cor"]."</td>"
        ."<td>Ano do modelo: ".$carro["ano_modelo"]."</td>"
        ."<td>Tipo de motor: ".$carro["tipo_motor"]."</td>"
        ."<td>Cilindrada: ".$carro["cilindrada"]."</td>"
        ."<td>Marca: ".$carro["marca"]."</td>"
        ."<td>Modelo: ".$carro["modelo"]."</td>"
        ."</tr>";
}

//Retorna o Array completo e fecha a tabela
echo "$listaCarro </table>";
?>