
<?php
   require_once('../users/auth.php');
  require_once('functions.php');
  edit();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Atualizar Usuário</h2>

<form action="edit.php?id=<?php echo htmlspecialchars((string) (($user ?? [])['id'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>" method="post">

  <hr />

  <div class="row">

    <div class="form-group col-md-6">
      <label for="nome">Nome</label>

      <input type="text"
             id="nome"
             class="form-control"
             name="user[nome]"
             maxlength="50"
             value="<?php echo htmlspecialchars($user['nome'] ?? ''); ?>"
             required>
    </div>

    <div class="form-group col-md-6">
      <label for="usuario">Usuário</label>

      <input type="text"
             id="usuario"
             class="form-control"
             name="user[user]"
             maxlength="50"
             value="<?php echo htmlspecialchars($user['user'] ?? ''); ?>"
             required>
    </div>

  </div>

  <div class="row">

    <div class="form-group col-md-6">
      <label for="senha">Nova Senha</label>

      <input type="password"
             id="senha"
             class="form-control"
             name="user[password]"
             maxlength="255"
             placeholder="Deixe vazio para manter a senha atual">
    </div>

  </div>

  <div id="actions" class="row">

    <div class="col-md-12">

      <button type="submit" class="btn btn-primary">
        <i class="fa fa-floppy-o"></i> Salvar
      </button>

      <a href="index.php" class="btn btn-default">
        <i class="fa fa-undo"></i> Cancelar
      </a>

    </div>

  </div>

</form>

<?php include(FOOTER_TEMPLATE); ?>