<?php 

    echo "<h1> Página de Trem</h1> <br> <a href='./?p=cadTrem'><button>Cadastro de Trem</button></a> ";
    // Inclui o arquivo de controle
    require_once("./controler/tremController.php");
    //Chama a função de listar clientes
    $arrayTrens = _listarTrem();
    //Cria uma variável para concatenar os retornos
    $listaTrem = "<br><br>
    <table>
    <tr>
        <th></th>
        <th></th>
        <th>Modelo</th>
        <th>Capac. de Passageiros</th>
        <th>Qtde. de Vagões</th>
        <th>Fonte de Energia</th>
        <th>Fabricante</th>
    </tr>";
    //Percorre o Array com os clientes
    foreach($arrayTrens as $trem){
        //Concatena em string o resultado do Array
        $listaTrem .=
        "<tr>"
            .'<td><a href="?p=deletaTrem&del='.$trem["id_trem"].'"> Deletar </a></td>'
            .'<td><a href="?p=alteraTrem&alt='.$trem["id_trem"].'"> Alterar </a></td>'
            ."<td>".$trem["modelo"]."</td>"
            ."<td>".$trem["capacidade_passageiro"]."</td>"
            ."<td>".$trem["qtde_vagoes"]."</td>"
            ."<td>".$trem["fonte_energia"]."</td>"
            ."<td>".$trem["fabricante"]."</td>"
        ."</tr>";
    }
    
    //Retorna o Array completo e fecha a tabela
    echo "$listaTrem </table>";   
?>

