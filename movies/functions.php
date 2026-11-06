<?php

include '../config.php';
include DBAPI;

$movies = null;
$movie = null;


/**
 * Listagem de Filmes
 */
function index() {

    global $movies;

    $movies = find_all('filmes');
}


/**
 * Visualização de um Filme
 */
function view($id = null) {

    global $movie;

    $movie = find('filmes', $id);
}


/**
 * Faz o upload da foto e retorna o nome do arquivo salvo
 */
function upload_foto() {

    if (!empty($_FILES['foto']['name']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {

        $permitidas = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

        $ext = strtolower(
            pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION)
        );

        if (!in_array($ext, $permitidas)) {
            return null;
        }

        $filename = uniqid('f_') . '.' . $ext;

        $destino = __DIR__ . '/uploads/' . $filename;

        move_uploaded_file($_FILES['foto']['tmp_name'], $destino);

        return $filename;
    }

    return null;
}


/**
 * Cadastro de Filmes
 */
function add() {

    if (!empty($_POST['movie'])) {

        $today = date_create(
            'now',
            new DateTimeZone('America/Sao_Paulo')
        );

        $movie = $_POST['movie'];

        $movie['DataCad'] = $today->format("Y-m-d H:i:s");

        $foto = upload_foto();

        $movie['Foto'] = $foto ?? '';

        save('filmes', $movie);

        header('Location: index.php');
        exit;
    }
}


/**
 * Atualização/Edição de Filme
 */
function edit() {

    if (isset($_GET['id'])) {

        $id = $_GET['id'];

        if (isset($_POST['movie'])) {

            $movie = $_POST['movie'];

            $foto = upload_foto();

            // só troca a foto se um novo arquivo foi enviado
            if ($foto) {
                $movie['Foto'] = $foto;
            } else {
                unset($movie['Foto']);
            }

            update('filmes', $id, $movie);

            header('Location: index.php');
            exit;

        } else {

            global $movie;

            $movie = find('filmes', $id);
        }

    } else {

        header('Location: index.php');
        exit;
    }
}

/**
 *  Exclusão de um Filme
 */
function delete($id = null) {

    global $movie;
    remove('filmes', $id);

    header('location: index.php');
}

?>