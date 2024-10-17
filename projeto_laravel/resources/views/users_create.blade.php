@extends('master')
@section('content')
<h2>Create</h2>

    @if(session()->has('message'))
        {{session()->get('message')}}
    @endif

    @if($errors->any())
        @foreach($errors-> all() as $error)
            {{$error}}
        @endforeach
    @endif

    <form action="{{ route('users.store')}}" method="post">
        @csrf    
        <input type="text" name="firstName" placeholder="Nome">
        <input type="text" name="lastName" placeholder="Sobrenome">
        <input type="text" name="email" placeholder="Email">
        <button type="submit">Criar</button>
    </form>
