@extends('layout')

@section('content')
    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Título</label>
            <input name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Descrição</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <button class="btn btn-success">Salvar</button>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
@endsection
