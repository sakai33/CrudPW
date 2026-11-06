<?php 
  require_once('functions.php'); 
  add();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Novo Filme</h2>

<form action="add.php" method="post" enctype="multipart/form-data">
  <hr />
  <div class="row">
    <div class="form-group col-md-6">
      <label for="titulo">Título</label>
      <input type="text" class="form-control" name="movie[Titulo]" maxlength="50">
    </div>

    <div class="form-group col-md-4">
      <label for="diretor">Diretor</label>
      <input type="text" class="form-control" name="movie[Diretor]" maxlength="40">
    </div>

    <div class="form-group col-md-2">
      <label for="ano">Ano</label>
      <input type="number" class="form-control" name="movie[Ano]">
    </div>
  </div>

  <div class="row">
    <div class="form-group col-md-6">
      <label for="foto">Foto</label>
      <input type="file" class="form-control" name="foto" accept="image/*">
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