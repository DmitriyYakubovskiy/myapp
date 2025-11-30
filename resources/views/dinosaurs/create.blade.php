@extends('layout.app')

@section('title', 'Добавить динозавра')

@section('content')
<div class="container">
    <h1 class="mb-4">Добавить динозавра</h1>

    @include('dinosaurs.form', [
        'action' => route('dinosaurs.store')
    ])
</div>
@endsection
