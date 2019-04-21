@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center py-3">
        <a href="/game/create" class="btn btn-primary text-center">Add Game</a>
    </div>
    <div class="row justify-content-center">
        @if (count($games) == 0)
        <h3 class="center">No games added yet!</h3>
        @else
        @foreach ($games as $game)
        <div class="col-md-2 pb-2">
            <div class="card">
                <a href="/game/{{ $game->id }}">
                    @if ($game->cover)
                    <img class="card-img-top" src="{{ asset('storage/' . $game->cover) }}" alt="Card image cap">
                    @else
                    <img class="card-img-top" src="{{ asset('storage/covers/default.jpg')}}" alt="Card image cap">
                    @endif
                    <div class="card-body">
                        <h5 class="text-center">{{ $game->title }} <br> ({{ $game->system->name}})</h5>
                        <h4 class="text-center">{{ $game->released }}</h4>
                        
                    </div>
                </a>
            </div>
        </div>
        @endforeach
        
        
        @endif
    </div>
    <div class="row justify-content-center py-2">
            {{ $games->links() }}
        </div>
</div>
@endsection