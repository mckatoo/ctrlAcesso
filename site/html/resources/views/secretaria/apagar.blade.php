<div class="modal fade" id="modalDelete{{ $a->id }}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
        <div class="panel panel-danger">
          <div class="panel-heading">
            <h4 class="modal-title panel-title">Deletar Matricula {{ $a->matricula }}</h4>
          </div>
          <div class="modal-body panel-body">
            Deseja deletar o registro do aluno {{ $a->nome }} de matrícula {{ $a->matricula }}?
          </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger">Deletar</button>
      </div>
    </div>
  </div>
</div>