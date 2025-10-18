@extends('tasks.layout')

@section('content')
    <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Nova Tarefa</a>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Título</th>
            <th>Descrição</th>
            <th>Concluída?</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tasks as $task)
            <tr>
                <td>{{ $task->title }}</td>
                <td>{{ $task->description }}</td>
                <td>{{ $task->completed ? '✅' : '❌' }}</td>
                <td>
                    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline-block">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Excluir tarefa?')">Excluir
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
