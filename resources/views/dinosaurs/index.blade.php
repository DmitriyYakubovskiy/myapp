@extends('layout.app')

@section('title', 'Динопедия')

@section('content')
<div class="container">
    <h1 class="mb-4">Динозавры</h1>

    <div class="row g-4">

        @foreach ($dinosaurs as $index => $dino)
            <div class="col-12 col-sm-6 col-lg-4 col-xxl-3 col-wide-2">
                <div class="card h-100 dino-card"
                     data-title="{{ $dino->title }}"
                     data-type="{{ $dino->type }}"
                     data-image="{{ asset($dino->image_full) }}"
                     data-description="{{ $dino->description }}"
                     data-details="{{ $dino->details }}"
                >
                    <div class="label_block {{ $dino->type }}">
                        <label>{{ $dino->type === 'predator' ? 'Плотоядный' : 'Травоядный' }}</label>
                    </div>

                    <img src="{{ asset($dino->image) }}" class="card-img-top" alt="{{ $dino->title }}">

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $dino->title }}</h5>
                        <p class="card-text flex-grow-1">{{ $dino->description }}</p>

                        <button class="btn btn-primary mt-auto"
                                data-bs-toggle="modal"
                                data-bs-target="#dinoModal"
                                data-index="{{ $index }}">
                            Подробнее
                        </button>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>
@endsection