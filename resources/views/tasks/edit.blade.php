@extends('tasks.layout')

@section('content')
    <form method="POST" action="{{ route('tasks.update', $task) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Título</label>
            <input name="title" value="{{ $task->title }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Descrição</label>
            <textarea name="description" class="form-control">{{ $task->description }}</textarea>
        </div>
        <div class="form-check mb-3">
            <input type="checkbox" name="completed" value="1"
                   class="form-check-input" {{ $task->completed ? 'checked' : '' }}>
            <label class="form-check-label">Concluída</label>
        </div>
        <button class="btn btn-success">Atualizar</button>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
@endsection
