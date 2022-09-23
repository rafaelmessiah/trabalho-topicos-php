<?php 
    echo "<h1> Página de Avião</h1> <br> <a href='./?p=cadAviao'>Cadastrar Avião</a> ";
    // Inclui o arquivo de controle
    require_once("./controler/aviaoController.php");
    //Chama a função de listar clientes
    $arrayAviao = listarAviao();
    //Cria uma variável para concatenar os retornos
    $listaAviao = "<br><br><table>";
    //Percorre o Array com os clientes
    foreach($arrayAviao as $aviao){
        //Concatena em string o resultado do Array
        print_r($listaAviao .='<tr>'
        .'<td><a href="?p=deletaAviao&del='.$aviao["id_aviao"].'"> Deletar </a></td>'
        .'<td><a href="?p=alteraAviao&alt='.$aviao["id_aviao"].'"> Alterar </a></td>'
        ."<td>Modelo: ".$aviao["modelo"]."</td>"
        ."<td>Quantidade de turbinas: ".$aviao["qdte_turbinas"]."</td>"
        ."<td>Capacidade de passageiros: ".$aviao["capac_passageiros"]."</td>"
        ."<td>Capacidade de carga: ".$aviao["capc_carga"]."</td>"
        ."</tr>");
    }
?>

