@extends('layouts.default')
@section('page-title', 'Usuários')
@section('page-actions')
    <a href={{ route('user.create') }} class="btn btn-primary">Adicionar Usuário</a>
@endsection
@section('content')
    @session('success')
        @if (session('success'))
            <div class="alert alert-success">
                {{ $value }}
            </div>
        @endif
    @endsession


    <form action="{{ route('user.index') }}" method="get" class="mb-3" style="width: 300px;">
        <div class="input-group input-group-sm">
            <input class="form-control" type="text" name="keyword" id="" placeholder="Pesquisa"
                value="{{ request('keyword') }}">

            <button type="submit" class="btn btn-primary">Buscar</button>
        </div>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{$user->name}}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary btn-sm">Editar</a>
                        @can('destroy', \App\Models\User::class)
                            <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Tem certeza que deseja excluir este usuário?')">Excluir</button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $users->links() }}
@endsection