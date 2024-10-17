@extends('master')
@section('content')

<a href="{{ route('users.create')}}" class="btn btn-primary">Criar</a>
<hr>
<div class="footer-table-container">
    <div class="table-container table-responsive-sm">
        <h3 style="text-align: center;">Usuários</h3><br>
        <table class="table table-striped table-hover table-sm" style="text-align: center;">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Sobrenome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->firstName }}</td>
                        <td>{{ $user->lastName }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-warning" style="color: white;">Editar</a>
                            <a href="{{ route('users.show', ['user' => $user->id]) }}" class="btn btn-info" style="color: white;">Mostrar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


