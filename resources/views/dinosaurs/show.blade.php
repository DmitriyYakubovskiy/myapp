@extends('layout.app')

@section('title', $dinosaur->title)

@section('content')
<div class="container">

    <h1>{{ $dinosaur->title }}</h1>

    <div class="row mt-4">
        <div class="col-md-6">
            <img src="{{ asset($dinosaur->image_full) }}" class="img-fluid rounded">
        </div>

        <div class="col-md-6">
            <p><strong>Тип:</strong>
               {{ $dinosaur->type === 'predator' ? 'Плотоядный' : 'Травоядный' }}
            </p>

            <p>{{ $dinosaur->description }}</p>
            <p>{{ $dinosaur->details }}</p>

            <a href="{{ route('dinosaurs.edit', $dinosaur->id) }}" class="btn btn-warning mt-3">
                Редактировать
            </a>

            <form action="{{ route('dinosaurs.destroy', $dinosaur->id) }}"
                  method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger mt-3">Удалить</button>
            </form>
        </div>
    </div>

</div>
@endsection
