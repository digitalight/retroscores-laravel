@extends('layouts.app')
@section('content')
<div class="container fill">
    <div class="row">
        
        <div class="col-md-4 py-4">
            <div class="card">
                    <div class="card-body">
                        <h4 class="text-center">{{ $score->game->title }}</h4>
                        <h5 class="text-center">{{ $score->updated_at }}</h5>
                        <h5 class="text-center font-weight-bold">Score: {{ $score->score }}</h5>
                        @if ($score->screenshot)
                        <p class="text-center">BBCode</p>
                        <samp class="card">{{ '[img]'.env('APP_URL') . '/storage/' . $score->screenshot . '[/img]'}}<br> {{'Score: ' . $score->score}}</samp>
                        @endif
                    </div>
            </div>
        </div>
        <div class="col-md-8">
            @if ($score->screenshot)
            <img class="rounded mx-auto d-block py-4" src="{{ asset('storage/' . $score->screenshot) }}">
            @else
            <h2>Oops no evidence</h2>
            @endif
        </div>
    </div>
</div>
@endsection