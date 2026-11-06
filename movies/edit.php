<?php 
  require_once('functions.php'); 
  edit();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Atualizar Filme</h2>

<form action="edit.php?id=<?php echo $movie['Id']; ?>" method="post" enctype="multipart/form-data">
  <hr />
  <div class="row">
    <div class="form-group col-md-6">
      <label for="titulo">Título</label>
      <input type="text" class="form-control" name="movie[Titulo]" maxlength="50" value="<?php echo $movie['Titulo']; ?>">
    </div>

    <div class="form-group col-md-4">
      <label for="diretor">Diretor</label>
      <input type="text" class="form-control" name="movie[Diretor]" maxlength="40" value="<?php echo $movie['Diretor']; ?>">
    </div>

    <div class="form-group col-md-2">
      <label for="ano">Ano</label>
      <input type="number" class="form-control" name="movie[Ano]" value="<?php echo $movie['Ano']; ?>">
    </div>
  </div>

  <div class="row">
    <div class="form-group col-md-4">
      <label for="foto">Foto atual</label><br>
      <?php if (!empty($movie['Foto'])) : ?>
        <img src="uploads/<?php echo $movie['Foto']; ?>" width="100" class="img-thumbnail mb-2">
      <?php else : ?>
        <p class="text-muted">Sem foto cadastrada</p>
      <?php endif; ?>
    </div>

    <div class="form-group col-md-4">
      <label for="foto">Trocar foto</label>
      <input type="file" class="form-control" name="foto" accept="image/*">
    </div>

    <div class="form-group col-md-3">
      <label for="datacad">Data de Cadastro</label>
      <input type="text" class="form-control" disabled value="<?php echo $movie['DataCad']; ?>">
    </div>
  </div>

  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Salvar</button>
      <a href="index.php" class="btn btn-default"><i class="fa-solid fa-rotate-left"></i> Cancelar</a>
    </div>
  </div>
</form>

<?php include(FOOTER_TEMPLATE); ?>