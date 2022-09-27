<?php 
    echo "<h1>Página de Avião</h1> <br> <a href='./?p=cadAviao'><button>Cadastrar Avião</button></a> ";
    // Inclui o arquivo de controle
    require_once("./controler/aviaoController.php");
    //Chama a função de listar Avião
    $arrayAviao = listarAviao();
    //Cria uma variável para concatenar os retornos
    $listaAviao = "<br><br>
    <table>
    <tr>
        <th></th>
        <th></th>
        <th>Modelo</th>
        <th>Quantidade de turbinas</th>
        <th>Capacidade de passageiros</th>
        <th>Capacidade de carga</th>
    </tr>
    ";
    //Percorre o Array com os Aviões
    foreach($arrayAviao as $aviao){
        //Concatena em string o resultado do Array
        $listaAviao .=
        "<tr>"
            .'<td><a href="?p=deletaAviao&del='.$aviao["id_aviao"].'"> Deletar </a></td>'
            .'<td><a href="?p=alteraAviao&alt='.$aviao["id_aviao"].'"> Alterar </a></td>'
            ."<td>".$aviao["modelo"]."</td>"
            ."<td>".$aviao["qdte_turbinas"]."</td>"
            ."<td>".$aviao["capac_passageiros"]."</td>"
            ."<td>".$aviao["capc_carga"]."</td>"
        ."</tr>";
    }
    echo "$listaAviao </table>";
?>

