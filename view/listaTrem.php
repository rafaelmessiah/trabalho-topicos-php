<?php 

    echo "<h1> Página de Trem</h1> <br> <a href='./?p=cadTrem'>Cadastro de Trem</a> ";
    // Inclui o arquivo de controle
    require_once("./controler/tremController.php");
    //Chama a função de listar clientes
    $arrayTrens = _listarTrem();
    //Cria uma variável para concatenar os retornos
    $listaTrem = "<br><br><table>";
    //Percorre o Array com os clientes
    foreach($arrayTrens as $trem){
        //Concatena em string o resultado do Array
        $listaTrem .='<tr>'
        .'<td><a href="?p=deletaTrem&del='.$trem["id_trem"].'"> Deletar </a></td>'
        .'<td><a href="?p=alteraTrem&alt='.$trem["id_trem"].'"> Alterar </a></td>'
        ."<td>Modelo: ".$trem["modelo"]."</td>"
        ."<td>Capac. de Passageiros: ".$trem["capacidade_passageiro"]."</td>"
        ."<td>Qtde. de Vagões: ".$trem["qtde_vagoes"]."</td>"
        ."<td>Fonte de Energia: ".$trem["fonte_energia"]."</td>"
        ."<td>Fabricante: ".$trem["fabricante"]."</td>"
        ."</tr>";
    }
    
    //Retorna o Array completo e fecha a tabela
    echo "$listaTrem </table>";
    
?>

