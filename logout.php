<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Apaga todas as informações da sessão
$_SESSION = [];

// Destrói a sessão
session_destroy();

// Retorna para o Dashboard
header('Location: index.php');
exit;

?>