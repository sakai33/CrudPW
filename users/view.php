<?php 
     require_once('../users/auth.php');
    require_once('functions.php');

    if (isset($_GET['id'])) {
        view($_GET['id']);
    } else {
        header('Location: index.php');
        exit;
    }
?>

<?php include(HEADER_TEMPLATE); ?>

<h2><?php echo htmlspecialchars($user['nome'] ?? ''); ?></h2>
<hr>

<?php if (!empty($_SESSION['message'])) : ?>
    <div class="alert alert-<?php echo htmlspecialchars($_SESSION['type'] ?? 'info'); ?>">
        <?php echo htmlspecialchars($_SESSION['message']); ?>
    </div>
<?php endif; ?>

<div class="row">

    <div class="col-md-12">
        <dl class="dl-horizontal">

            <dt>Nome:</dt>
            <dd>
                <?php echo htmlspecialchars($user['nome'] ?? ''); ?>
            </dd>

            <dt>Usuario:</dt>
            <dd>
                <?php echo htmlspecialchars($user['user'] ?? ''); ?>
            </dd>

            <dt>Data de Cadastro:</dt>
            <dd>
                <?php
                    if (!empty($user['dataCad'])) {
                        $dt = new DateTime(
                            $user['dataCad'],
                            new DateTimeZone('America/Sao_Paulo')
                        );

                        echo $dt->format('d/m/Y - H:i:s');
                    } else {
                        echo 'Não informada';
                    }
                ?>
            </dd>

        </dl>
    </div>

</div>

<div id="actions" class="row">
    <div class="col-md-12">

        <a href="edit.php?id=<?php echo urlencode($user['id'] ?? ''); ?>"
           class="btn btn-primary">
            Editar
        </a>

        <a href="index.php"
           class="btn btn-default">
            Voltar
        </a>

    </div>
</div>

<?php include(FOOTER_TEMPLATE); ?>