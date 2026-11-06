<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once('config.php');
require_once(DBAPI);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $usuario = trim($_POST['usuario'] ?? '');
    $senha = $_POST['senha'] ?? '';

    if (empty($usuario) || empty($senha)) {
        $_SESSION['message'] = "Preencha todos os campos.";
        $_SESSION['type'] = "danger";

        header('Location: index.php');
        exit;
    }

    $database = open_database();

    $sql = "SELECT * FROM usuarios WHERE user = ? LIMIT 1";

    $stmt = $database->prepare($sql);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();

    $resultado = $stmt->get_result();
    $dados = $resultado->fetch_assoc();

    $loginValido = false;

    if ($dados) {

        // Verifica se a senha já está criptografada
        $informacoesSenha = password_get_info($dados['password']);

        if ($informacoesSenha['algo'] !== null) {

            // Senha criptografada
            $loginValido = password_verify($senha, $dados['password']);

        } else {

            // Senha antiga em texto puro
            $loginValido = hash_equals($dados['password'], $senha);

            // Converte a senha antiga para hash
            if ($loginValido) {

                $novaSenha = password_hash($senha, PASSWORD_DEFAULT);

                $sqlUpdate = "UPDATE usuarios SET password = ? WHERE id = ?";

                $stmtUpdate = $database->prepare($sqlUpdate);
                $stmtUpdate->bind_param("si", $novaSenha, $dados['id']);
                $stmtUpdate->execute();
                $stmtUpdate->close();
            }
        }
    }

    if ($loginValido) {

        session_regenerate_id(true);

        $_SESSION['usuario_id'] = $dados['id'];
        $_SESSION['usuario_nome'] = $dados['nome'];
        $_SESSION['usuario_login'] = $dados['user'];

        $_SESSION['message'] = "Login realizado com sucesso!";
        $_SESSION['type'] = "success";

        $stmt->close();
        close_database($database);

        header('Location: index.php');
        exit;

    } else {

        $_SESSION['message'] = "Usuário ou senha incorretos.";
        $_SESSION['type'] = "danger";

        $stmt->close();
        close_database($database);

        header('Location: index.php');
        exit;
    }
}

header('Location: index.php');
exit;

?>