<?php
// Conexão com Banco
function conectaBD(){
    return new PDO("mysql:host=db-mysql; dbname=meio_transporte", "root", "root");
}
