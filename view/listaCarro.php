<?php
echo "<h1> Página de Carro</h1> <br> <a href='./?p=cadCarro'><button>Cadastro de Carro</button></a> ";
// Inclui o arquivo de controle
require_once("./controler/carroController.php");
//Chama a função de listar
$arrayTrens = _listarCarro();
//Cria uma variável para concatenar os retornos
$listaCarro = "<br><br>
<table>
<tr>
    <th></th>
    <th></th>
    <th>Renavam</th>
    <th>Cor</th>
    <th>Ano do modelo</th>
    <th>Tipo de motor</th>
    <th>Cilindrada</th>
    <th>Marca</th>
    <th>Modelo</th>
</tr>
";

//Percorre o Array
if($arrayTrens) {
    foreach ($arrayTrens as $carro) {
        //Concatena em string o resultado do Array
        $listaCarro .=
            '<tr>'
            . '<td><a href="?p=deletaCarro&del=' . $carro["id_carro"] . '"> Deletar </a></td>'
            . '<td><a href="?p=alteraCarro&alt=' . $carro["id_carro"] . '"> Alterar </a></td>'
            . "<td>" . $carro["renavam"] . "</td>"
            . "<td>" . $carro["cor"] . "</td>"
            . "<td>" . $carro["ano_modelo"] . "</td>"
            . "<td>" . $carro["tipo_motor"] . "</td>"
            . "<td>" . $carro["cilindrada"] . "</td>"
            . "<td>" . $carro["marca"] . "</td>"
            . "<td>" . $carro["modelo"] . "</td>"
            . "</tr>";
    }
}else{
    $listaCarro .= "<tr>
                        <td colspan='9'>Nenhuma informação registrada</td>
                    </tr>";
}

//Retorna o Array completo e fecha a tabela
echo "$listaCarro </table>";
