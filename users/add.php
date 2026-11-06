<?php
  require_once('../users/auth.php');
  require_once('functions.php');
  
  add();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Novo Usuário</h2>

<form action="add.php" method="post">

  <hr />

  <div class="row">

    <div class="form-group col-md-6">
      <label for="nome">Nome</label>

      <input type="text"
             id="nome"
             class="form-control"
             name="user[nome]"
             maxlength="50"
             required>
    </div>

    <div class="form-group col-md-6">
      <label for="usuario">Usuário</label>

      <input type="text"
             id="usuario"
             class="form-control"
             name="user[user]"
             maxlength="50"
             required>
    </div>

  </div>

  <div class="row">

    <div class="form-group col-md-6">
      <label for="senha">Senha</label>

      <input type="password"
             id="senha"
             class="form-control"
             name="user[password]"
             maxlength="255"
             required>
    </div>

  </div>

  <div id="actions" class="row">

    <div class="col-md-12">

      <button type="submit" class="btn btn-primary">
        <i class="fa-solid fa-floppy-disk"></i> Salvar
      </button>

      <a href="index.php" class="btn btn-default">
        <i class="fa-solid fa-rotate-left"></i> Cancelar
      </a>

    </div>

  </div>

</form>

<?php include(FOOTER_TEMPLATE); ?>