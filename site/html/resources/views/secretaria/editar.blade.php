<div class="modal fade" id="modalEdit{{ $a->id }}">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Editar Matricula {{ $a->matricula }}</h4>
			</div>
			<form action="{{ route('aluno.salvar') }}" class="form" method="POST" role="form">
				{{ csrf_field() }}
				<input type="hidden" name="id" value="{{ $a->id }}">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="form-group col-lg-12">
							<label class="control-label">Nome</label>
							<input type="text" name="nome" autofocus="autofocus" class="form-control" value="{{ $a->nome }}" required="required" title="Nome Completo">
						</div>
						<div class="form-group col-lg-6">
							<label class="control-label">Matrícula</label>
							<input type="text" name="matricula" class="form-control" value="{{ $a->matricula }}" required="required" title="RA">
						</div>
						<div class="form-group col-lg-6">
							<label class="control-label">Campus</label>
							<select name="campus" class="form-control" required="required">
								<option value="0">Selecione...</option>
								@foreach ($campus as $c)
									@if ($c->id === $a->turma->curso->campus['id'])
										<option selected="selected" value="{{ $c->id }}">{{ $c->campus }}</option>
									@else
										<option value="{{ $c->id }}">{{ $c->campus }}</option>
									@endif
								@endforeach
							</select>
						</div>
						<div class="form-group col-lg-12">
							<label class="control-label">Curso</label>
							<select name="curso" class="form-control" required="required">
								<option value="0">Selecione...</option>
								@foreach ($curso as $c)
									@if ($c->id === $a->turma->curso->id)
										<option selected="selected" value="{{ $c->id }}">{{ $c->curso }}</option>
									@else
										<option value="{{ $c->id }}">{{ $c->curso }}</option>
									@endif
								@endforeach
							</select>
						</div>
						<div class="form-group col-lg-4">
							<label class="control-label">Turma</label>
							<select name="turma" class="form-control" required="required">
								<option value="0">Selecione...</option>
								@foreach ($turma as $t)
									@if ($t->id === $a->turma->id)
										<option selected="selected" value="{{ $t->id }}">{{ $t->turma }}</option>
									@else
										<option value="{{ $t->id }}">{{ $t->turma }}</option>
									@endif
								@endforeach
							</select>
						</div>
						<div class="form-group col-lg-4">
							<label class="control-label">Aceite do Contrato</label>
							<input type="text" name="aceite" class="form-control datepicker" value="{{ $a->aceite_contrato->format('d/m/Y') }}" required="required" title="Aceite do Contrato">
						</div>
						<div class="form-group col-lg-4">
							<label class="control-label">Entradas</label>
							<input type="number" name="entradas" class="form-control" value="{{ $a->entradas }}" title="Entradas Permitidas">
						</div>
					</div>
					<div class="panel-footer">
						<button type="reset" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						<button type="submit" class="btn btn-primary pull-right">Salvar</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>