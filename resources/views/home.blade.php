@extends('layouts.app')

@section('title')
  Bienvenido
@endsection

@section('content')
   <x-listar-posts :posts="$posts" />
@endsection