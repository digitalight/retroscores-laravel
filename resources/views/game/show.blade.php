@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        
        <div class="col-md-4">
            <div class="card">
                @if ($game->cover)
                    <img class="card-img-top" src="{{ asset('storage/' . $game->cover) }}" alt="Card image cap">
                    @endif
                    <div class="card-body">
                        <h4 class="text-center">{{ $game->title }}</h4>
                        <h5 class="text-center">{{ $game->released }}</h5>
                        <a class="text-center" href="{{ route('game.edit', ['game' => $game]) }}">Edit</a>
                    </div>
            </div>
        </div>
        <div class="col-md-8">
            @if (count($game->scores) == 0)
                <h3 class="text-center">No scores added yet!</h3>
            @else
                @include('game.table')
            
            @endif
        </div>
    </div>
</div>
@endsection