@extends('layout.app')

@section('title', 'Редактировать динозавра')

@section('content')
<div class="container">
    <h1 class="mb-4">Редактировать динозавра</h1>

    @include('dinosaurs.form', [
        'action' => route('dinosaurs.update', $dinosaur->id),
        'method' => 'PUT',
        'dinosaur' => $dinosaur
    ])
</div>
@endsection
