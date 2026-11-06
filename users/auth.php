<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['usuario_id'])) {

    $_SESSION['message'] = "Você precisa fazer login para acessar esta página.";
    $_SESSION['type'] = "warning";

    header('Location: ../index.php');
    exit;
}

?>