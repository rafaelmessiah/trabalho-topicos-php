<?php

function load_page() {
    //Se o GET não existir atribui o valor "home" para a variável de controle
    isset($_GET["p"])? $page = $_GET["p"]: $page = "home";

    switch($page){
        case "home":
            require_once("./view/home.php");
        break;
        case "carro":
            require_once("./view/listaCarro.php");
        break;
        case "aviao":
            require_once("./view/listaAviao.php");
        break;
        case "deletaAviao":
            require_once("./view/deletaAviao.php");
        break;
        case "alteraAviao":
            require_once("./view/alteraAviao.php");
        break;
        case "cadAviao":
            require_once("./view/cadAviao.php");
        break;
        case "trem":
            require_once("./view/listaTrem.php");
        break;
        //Se não for nenhum dos casos carrega a home.
        default:
            require_once("./view/ERRO.php");
        break;
    }
}

?>