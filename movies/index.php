<?php
    include "functions.php";
    index();
    include HEADER_TEMPLATE; 
?>

<header>
	<div class="row">
		<div class="col-sm-6">
			<h2>Filmes</h2>
		</div>
		<div class="col-sm-6 text-right h2">
	    	<a class="btn btn-primary" href="add.php"><i class="fa fa-plus"></i> Novo Filme</a>
	    	<a class="btn btn-default" href="index.php"><i class="fa fa-refresh"></i> Atualizar</a>
	    </div>
	</div>
</header>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<?php echo $_SESSION['message']; ?>
	</div>
<?php endif; ?>

<hr>

<style>
    .movie-card {
        border: none;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0,0,0,0.15);
        transition: transform .15s ease;
        background: #1c1c1c;
        color: #fff;
    }
    .movie-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 6px 16px rgba(0,0,0,0.3);
    }
    .movie-poster {
        width: 100%;
        aspect-ratio: 2 / 3;
        object-fit: cover;
        display: block;
        background: #2a2a2a;
    }
    .movie-poster-placeholder {
        aspect-ratio: 2 / 3;
        background: #2a2a2a;
    }
    .movie-card .card-body {
        padding: .75rem;
    }
    .movie-card .card-title {
        font-size: .95rem;
        font-weight: 600;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .movie-card small {
        color: #bbb !important;
    }
</style>

<div class="row row-cols-2 row-cols-md-4 g-3">
    <?php if ($movies) : ?>
    <?php foreach ($movies as $movie) : ?>
        <div class="col">
            <div class="card movie-card h-100">
                <?php if (!empty($movie['Foto'])) : ?>
                    <img src="uploads/<?php echo htmlspecialchars($movie['Foto']); ?>" class="movie-poster" alt="<?php echo htmlspecialchars($movie['Titulo']); ?>">
                <?php else : ?>
                    <div class="movie-poster-placeholder d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-film fa-3x text-secondary"></i>
                    </div>
                <?php endif; ?>
                <div class="card-body text-center">
                    <div class="card-title" title="<?php echo htmlspecialchars($movie['Titulo']); ?>"><?php echo htmlspecialchars($movie['Titulo']); ?></div>
                    <small class="d-block mb-2"><?php echo htmlspecialchars($movie['Diretor']); ?> &middot; <?php echo htmlspecialchars($movie['Ano']); ?></small>
                    <div class="d-flex justify-content-center gap-1">
                        <a href="view.php?id=<?php echo $movie['Id']; ?>" class="btn btn-sm btn-success" title="Visualizar">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <a href="edit.php?id=<?php echo $movie['Id']; ?>" class="btn btn-sm btn-warning" title="Editar">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete-modal" data-movie="<?php echo $movie['Id']; ?>" title="Excluir">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <?php else : ?>
        <div class="col-12">
            <p class="text-muted">Nenhum registro encontrado.</p>
        </div>
    <?php endif; ?>
</div>
<?php include('modal.php'); ?>
<?php include FOOTER_TEMPLATE; ?>