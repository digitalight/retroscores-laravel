@extends('layouts.app')
@section('content')
<div class="container fill">
    <div class="row">
        
        <div class="col-md-4">
            <div class="card">
                    <div class="card-body">
                        <h5 class="text-center">{{ $system->company }}</h5>
                        <h4 class="text-center">{{ $system->name }}</h4>
                        <a class="text-center" href="{{ route('system.edit', ['system' => $system]) }}">Edit</a>
                    </div>
            </div>
        </div>
        <div class="col-md-8">
            @if (count($system->games) == 0)
                <h3 class="text-center">No games added yet!</h3>
            @else
                @include('system.table')
            <div class="row justify-content-center py-2">
            {{ $games->links() }}
        </div>
            @endif
        </div>
    </div>
</div>
@endsection