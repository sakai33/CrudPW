<!-- Modal de Delete-->
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
<div class="modal-dialog" role="document">
	<div class="modal-content movie-modal">
	<div class="modal-header">
		<h4 class="modal-title" id="modalLabel">Excluir Filme</h4>
		<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
	</div>
	<div class="modal-body">
		Deseja realmente excluir este filme?
	</div>
	<div class="modal-footer">
		<a id="confirm" class="btn btn-danger" href="#"><i class="fa-solid fa-trash"></i> Sim, excluir</a>
		<a id="cancel" class="btn btn-outline-light" data-bs-dismiss="modal">Não</a>
	</div>
	</div>
</div>
</div> <!-- /.modal -->

<style>
	.movie-modal {
		background: #1c1c1c;
		color: #fff;
		border: 1px solid #333;
		border-radius: 10px;
	}
	.movie-modal .modal-header,
	.movie-modal .modal-footer {
		border-color: #333;
	}
</style>