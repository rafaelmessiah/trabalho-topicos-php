<?php

function load_page()
{
    //Se o GET não existir atribui o valor "home" para a variável de controle
    isset($_GET["p"]) ? $page = $_GET["p"] : $page = "home";

    switch ($page) {
        case "home":
            require_once("./view/home.php");
            break;

        //Carros
        case "carro":
            require_once("./view/listaCarro.php");
            break;
        case "cadCarro":
        case "alteraCarro":
            require_once("./view/cadCarro.php");
            break;
        case "deletaCarro":
            require_once("./view/deletaCarro.php");
            break;

        //Aviões
        case "aviao":
            require_once("./view/listaAviao.php");
            break;
        case "deletaAviao":
            require_once("./view/deletaAviao.php");
            break;
        case "cadAviao":
        case "alteraAviao":
            require_once("./view/cadAviao.php");
            break;

        //Trens
        case "trem":
            require_once("./view/listaTrem.php");
            break;
        case "cadTrem":
        case "alteraTrem":
            require_once("./view/cadTrem.php");
            break;
        case "deletaTrem":
            require_once("./view/deletaTrem.php");
            break;

        //Se não for nenhum dos casos carrega a home.
        default:
            require_once("./view/ERRO.php");
            break;
    }
}

?>