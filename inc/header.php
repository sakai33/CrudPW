<!DOCTYPE html>
<html lang="pt-br">  
    <head>
        <meta charset="utf-8">
        <title>CRUD com Bootstrap</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="<?php echo BASEURL; ?>css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo BASEURL; ?>css/all.min.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
            .btn-light {
                background-color: #bbbbbb;
                border-color: #bbbbbb;
                color: #ffffff;
            }
            .btn-light:hover {
                background-color: #999999;
                border-color: #999999;
                color: #ffffff;
            }

        </style>
     
    </head>
    <body>

        <nav class="navbar container navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?php echo BASEURL; ?>"><i class="fa-solid fa-house-chimney"></i> CRUD</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Clientes
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="<?php echo BASEURL; ?>customers/"><i class="fa-solid fa-users"></i> Gerenciar Clientes</a></li>
                    <li><a class="dropdown-item" href="<?php echo BASEURL; ?>customers/add.php"><i class="fa-solid fa-user-plus"></i> Novo Cliente</a></li>
                </ul>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Filmes
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="<?php echo BASEURL; ?>movies/"><i class="fa-solid fa-film"></i> Gerenciar Filmes</a></li>
                    <li><a class="dropdown-item" href="<?php echo BASEURL; ?>movies/add.php"><i class="fa-solid fa-plus"></i> Novo Filme</a></li>
                </ul>
                </li>
                <li class="nav-item">
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Usuarios
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="<?php echo BASEURL; ?>users/"><i class="fa-solid fa-users"></i> Gerenciar Usuarios</a></li>
                    <li><a class="dropdown-item" href="<?php echo BASEURL; ?>users/add.php"><i class="fa-solid fa-user-plus"></i> Novo Usuario</a></li>
                </ul>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            </div>
        </div>
        </nav>

        <main class="container">