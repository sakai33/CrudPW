<?php 
	require_once('functions.php'); 
	view($_GET['id']);
?>

<?php include(HEADER_TEMPLATE); ?>

<h2><?php echo htmlspecialchars($movie['Titulo'] ?? ''); ?></h2>
<hr>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?>"><?php echo $_SESSION['message']; ?></div>
<?php endif; ?>

<div class="row">
	<div class="col-md-3 mb-3">
		<?php if (!empty($movie['Foto'])) : ?>
			<img src="uploads/<?php echo htmlspecialchars($movie['Foto']); ?>" class="img-fluid rounded" alt="<?php echo htmlspecialchars($movie['Titulo'] ?? ''); ?>">
		<?php else : ?>
			<div class="d-flex align-items-center justify-content-center rounded" style="aspect-ratio: 2/3; background:#2a2a2a;">
				<i class="fa-solid fa-film fa-3x text-secondary"></i>
			</div>
		<?php endif; ?>
	</div>

	<div class="col-md-9">
		<dl class="dl-horizontal">
			<dt>Diretor:</dt>
			<dd><?php echo htmlspecialchars($movie['Diretor'] ?? ''); ?></dd>

			<dt>Ano:</dt>
			<dd><?php echo htmlspecialchars($movie['Ano'] ?? ''); ?></dd>

			<dt>Data de Cadastro:</dt>
			<dd>
				<?php
					if (!empty($movie['DataCad'])) {
						$dt = new DateTime($movie['DataCad'], new DateTimeZone('America/Sao_Paulo'));
						echo $dt->format('d/m/Y - H:i:s');
					}
				?>
			</dd>
		</dl>
	</div>
</div>

<div id="actions" class="row">
	<div class="col-md-12">
	  <a href="edit.php?id=<?php echo $movie['Id'] ?? ''; ?>" class="btn btn-primary">Editar</a>
	  <a href="index.php" class="btn btn-default">Voltar</a>
	</div>
</div>

<?php include(FOOTER_TEMPLATE); ?>