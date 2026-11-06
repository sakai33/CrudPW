<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include "config.php";
include DBAPI;
include HEADER_TEMPLATE;

$db = open_database();

?>

<style>
    .dashboard-card {
        display: block;
        border: none;
        border-radius: 14px;
        padding: 2rem 1rem;
        text-align: center;
        text-decoration: none;
        color: #fff;
        background: linear-gradient(160deg, #2b2b2b, #1a1a1a);
        box-shadow: 0 3px 10px rgba(0,0,0,0.2);
        transition: transform .15s ease, box-shadow .15s ease;
        height: 100%;
    }

    .dashboard-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 22px rgba(0,0,0,0.35);
        color: #fff;
    }

    .dashboard-card i {
        display: block;
        margin-bottom: .75rem;
    }

    .dashboard-card p {
        margin: 0;
        font-size: 1.1rem;
        font-weight: 600;
    }

    .dashboard-card.card-primary i {
        color: #4dabf7;
    }

    .dashboard-card.card-success i {
        color: #51cf66;
    }

    .dashboard-card.card-warning i {
        color: #ffd43b;
    }

    .dashboard-section-title {
        font-size: 1rem;
        text-transform: uppercase;
        letter-spacing: .05em;
        color: #888;
        margin-bottom: 1rem;
    }
</style>

<div class="d-flex align-items-center justify-content-between mb-4">
    <h1 class="mb-0">Dashboard</h1>

    

    <?php if (isset($_SESSION['usuario_id'])): ?>

    <div>
        <span class="me-2">
            Olá, <?php echo htmlspecialchars($_SESSION['usuario_nome']); ?>!
        </span>

        <a href="logout.php" class="btn btn-danger">
            <i class="fa-solid fa-right-from-bracket"></i>
            Sair
        </a>
    </div>

<?php else: ?>

    <button type="button" class="btn btn-primary"
        data-bs-toggle="modal" data-bs-target="#loginModal">

        <i class="fa-solid fa-right-to-bracket"></i>
        Entrar

    </button>

<?php endif; ?>

</div>

<div class="alert alert-info" role="alert">
    <i class="fa-solid fa-circle-info"></i>
    <strong>Atenção!</strong> Para adicionar, visualizar ou gerenciar usuários,
    é necessário realizar o login no sistema.
</div>

<hr />

<?php if ($db) : ?>

    <!-- Clientes -->
    <div class="mb-5">
        <div class="dashboard-section-title">
            Clientes
        </div>

        <div class="row g-3">

            <div class="col-6 col-sm-4 col-md-3">
                <a href="customers/add.php" class="dashboard-card card-primary">
                    <i class="fa-solid fa-user-plus fa-4x"></i>
                    <p>Novo Cliente</p>
                </a>
            </div>

            <div class="col-6 col-sm-4 col-md-3">
                <a href="customers" class="dashboard-card">
                    <i class="fa-solid fa-users fa-4x"></i>
                    <p>Ver Clientes</p>
                </a>
            </div>

        </div>
    </div>


    <!-- Usuários -->
    <div class="mb-5">
        <div class="dashboard-section-title">
            Usuários
        </div>

        <div class="row g-3">

            <div class="col-6 col-sm-4 col-md-3">
                <a href="users/add.php" class="dashboard-card card-warning">
                    <i class="fa-solid fa-user-plus fa-4x"></i>
                    <p>Novo Usuário</p>
                </a>
            </div>

            <div class="col-6 col-sm-4 col-md-3">
                <a href="users" class="dashboard-card">
                    <i class="fa-solid fa-user-gear fa-4x"></i>
                    <p>Ver Usuários</p>
                </a>
            </div>

        </div>
    </div>


    <!-- Filmes -->
    <div class="mb-3">
        <div class="dashboard-section-title">
            Filmes
        </div>

        <div class="row g-3">

            <div class="col-6 col-sm-4 col-md-3">
                <a href="movies/add.php" class="dashboard-card card-success">
                    <i class="fa-solid fa-film fa-4x"></i>
                    <p>Novo Filme</p>
                </a>
            </div>

            <div class="col-6 col-sm-4 col-md-3">
                <a href="movies" class="dashboard-card">
                    <i class="fa-solid fa-video fa-4x"></i>
                    <p>Ver Filmes</p>
                </a>
            </div>

        </div>
    </div>


<?php else : ?>

    <div class="alert alert-danger" role="alert">
        <p>
            <strong>ERRO:</strong>
            Não foi possível conectar ao Banco de Dados!
        </p>
    </div>

<?php endif; ?>

<!-- Modal de Login -->
<div class="modal fade" id="loginModal" tabindex="-1">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">
                    <i class="fa-solid fa-user-lock"></i>
                    Acessar Sistema
                </h5>

                <button type="button" class="btn-close"
                        data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <form action="login.php" method="POST">

                    <div class="mb-3">
                        <label class="form-label">Usuário</label>

                        <input type="text"
                               name="usuario"
                               class="form-control"
                               placeholder="Digite seu usuário"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Senha</label>

                        <input type="password"
                               name="senha"
                               class="form-control"
                               placeholder="Digite sua senha"
                               required>
                    </div>
                    <button type="submit"
                            class="btn btn-primary w-100">

                        Entrar

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

<?php include FOOTER_TEMPLATE; ?>