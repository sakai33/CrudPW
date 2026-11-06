<?php

include '../config.php';
include DBAPI;

$users = null;
$user = null;


/**
 * Listagem de Usuários
 */
function index() {

    global $users;

    $users = find_all('usuarios');
}


/**
 * Visualização de um Usuário
 */
function view($id = null) {

    global $user;

    $user = find('usuarios', $id);
}

/**
 * Cadastro de Usuários
 */
function add() {

    if (!empty($_POST['user'])) {

        $database = open_database();

        $nome = trim($_POST['user']['nome']);
        $usuario = trim($_POST['user']['user']);
        $senha = $_POST['user']['password'];

        // Criptografar senha
        $senha = password_hash($senha, PASSWORD_DEFAULT);

        // Preparar consulta
        $sql = "INSERT INTO usuarios (nome, user, password)
                VALUES (?, ?, ?)";

        $stmt = $database->prepare($sql);

        $stmt->bind_param(
            "sss",
            $nome,
            $usuario,
            $senha
        );

        if ($stmt->execute()) {

            $_SESSION['message'] = "Usuário cadastrado com sucesso!";
            $_SESSION['type'] = "success";

        } else {

            $_SESSION['message'] = "Erro ao cadastrar usuário.";
            $_SESSION['type'] = "danger";

        }

        $stmt->close();
        close_database($database);

        header('Location: index.php');
        exit;
    }
}

/**
 * Atualização/Edição de Usuário
 */
function edit() {

    if (isset($_GET['id'])) {

        $id = $_GET['id'];

        if (isset($_POST['user'])) {

            $user = $_POST['user'];

            update('usuarios', $id, $user);

            header('Location: index.php');
            exit;

        } else {

            global $user;

            $user = find('usuarios', $id);
        }

    } else {

        header('Location: index.php');
        exit;
    }
}


/**
 * Exclusão de um Usuário
 */
function delete($id = null) {

    if ($id) {

        $database = open_database();

        $sql = "DELETE FROM usuarios WHERE id = ?";

        $stmt = $database->prepare($sql);

        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {

            $_SESSION['message'] = "Usuário removido com sucesso!";
            $_SESSION['type'] = "success";

        } else {

            $_SESSION['message'] = "Erro ao remover usuário.";
            $_SESSION['type'] = "danger";

        }

        $stmt->close();
        close_database($database);

    }

    header('Location: index.php');
    exit;
}

?>