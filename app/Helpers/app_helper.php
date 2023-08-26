<?php

use PhpParser\Node\Stmt\TryCatch;

function checkError($field, $erros)
{
  if (!empty($erros) && key_exists($field, $erros)) {
    return '<div class="alert alert-danger p-1 mt-1">' . $erros[$field] . '</div>';
  }
  return '';
}

/**
 * Esta função é responsável por encriptar um ID para tornar a aplicação mais segura, pois quando usada nas rotinas de ediçõa e exclusão
 * o ID ficará embaralhado. A cada renderização da página o número é alterado.
 *
 * @param [type] $value
 * @return void
 */
function encrypt($value)
{
  $enc = \Config\Services::encrypter();
  return bin2hex($enc->encrypt($value));
}

function decrypt($value)
{
  try {
    $enc = \Config\Services::encrypter();
    return $enc->decrypt(hex2bin($value));
  } catch (\Exception $e) {
    return false;
  }
}
