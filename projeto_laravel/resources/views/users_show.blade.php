@extends('master')
@section('content')

<h2>User - {{ $user ->firstName}}</h2>

<form action="{{ route('users.destroy', ['user' => $user->id])}}" method="post">
    @csrf    
    <input type="hidden" name="_method" value="DELETE">
    <button type="submit" class="btn btn-danger">Excluir</button>
</form>
