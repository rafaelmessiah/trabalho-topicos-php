<?php

/**
 * Doc
 *
 * validate($arrayValues, [
 *      'param' => [
 *          'required',
 *          'integer',
 *          'positive',
 *          'float',
 *          'values',
 *          'min',
 *          'max',
 *          'year',
 *          'renavam',
 *          '',
 *          '',
 *      ]
 * ]);
 */

function validate($post, $schema = [])
{
    $errors = [];

    foreach($schema as $item => $valid){
        if(!isset($post[$item])) continue;

        $validFn = is_array($valid) ? $valid : [$valid];

        $_err = [];
        $values = null;
        foreach($validFn as $vFn){

            if(str_contains($vFn, '[')){
                $ex = explode('[', $vFn);
                $end = substr(end($ex), 0, -1);

                $vFn = $ex[0];
                $values = explode(',', $end);
                $values = count($values) == 1 ? $values[0] : $values;
            }

            $ref = $vFn;
            $vFn = '__' . $vFn;

            if(!is_callable($vFn)) continue;

            if(!$vFn($post[$item], $values)){
                $_err[] = message($ref, $values);
            }
        }

        if(count($_err) > 0){
            $errors[$item] = $_err;
        }
    }

    return $errors;
}

function message($text, $replace = null)
{
    $messages = [
        'required' => 'Preenchimento obrigatório',
        'integer' => 'O valor deve ser do tipo integer',
        'positive' => 'O valor deve ser positivo',
        'float' => 'O valor deve ser do tipo float',
        'values' => 'O valor digitado não contém na lista (:replace)',
        'max' => 'O campo não pode ter mais de :replace caracteres',
        'min' => 'O campo precisa ter pelo menos :replace caracteres',
        'year' => 'Digite um ano válido',
        'renavam' => 'Digite um RENAVAM válido'
    ];

    $m = $messages[$text];

    if($replace) $m = str_replace(':replace', (is_array($replace) ? implode(',', $replace) : $replace), $m);

    return $m;
}

function showErrorMessage($errors, $ref)
{
    $error = '';

    if(isset($errors[$ref])) {
        $message = $errors[$ref];

        if (!is_array($message)) $message = [$message];

        foreach ($message as $m) {
            $error .= "<span style='color: red;'>$m</span><br>";
        }

        $error .= '<br>';
    }

    return $error;
}

function __required($value)
{
    return !empty($value);
}

function __integer($value)
{
    $nv = (int) $value;

    return (string) $nv == $value;
}

function __positive($value)
{
    $nv = (double) $value;

    return $nv > 0;
}

function __float($value)
{
    $nv = (float) $value;

    return (string) $nv == $value;
}

function __values($value, $params = [])
{
    $value = strtolower($value);
    $params = array_map(function($v){
        return strtolower($v);
    }, $params);

    return in_array($value, $params);
}

function __max($value, $params = 0)
{
    return strlen($value) <= (int) $params;
}

function __min($value, $params = 0)
{
    return strlen($value) > (int) $params;
}

function __year($value)
{
    return (int) $value >= 1900;
}

function __renavam ( $renavam ) {
    $soma = 0;
    // Cria array com as posições da string
    $d = str_split($renavam);
    $x = 0;
    $digito = 0;

    // Calcula os 4 primeiros digitos do renavam fazendo o calculo da primeira posição do array * 5 e vai diminuindo até chegar a 2
    for ($i=5; $i >= 2; $i--) {
        if(!isset($d[$x])) return false;

        $soma += (int) $d[$x] * $i;
        $x++;
    }

    // Faz o calculo de 11
    $valor = $soma % 11;

    // Busca digito verificador
    if ($valor == 11 || $valor == 0 || $valor >= 10) {
        $digito = 0;
    } else {
        $digito = $valor;
    }

    // Verifica digito com a 5 posição do array
    if(!isset($d[4])) return false;

    if ($digito == $d[4]) {
        return 1;
    } else {
        return 0;
    }
}