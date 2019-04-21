@extends('layouts.app')
@section('content')
<div class="container fill">
    <div class="row justify-content-center py-3">
        <a href="/system/create" class="btn btn-primary text-center">Add System</a>
    </div>
    <div class="row justify-content-center pb-3">
        @if (count($systems) == 0)
        <h3 class="center">No systems added yet!</h3>
        @else

        @foreach ($systems as $system)
        <div class="col-md-4">
            <div class="card">
                <a href="/system/{{ $system->id }}">
                <div class="card-body">
                    <h5 class="text-center">{{ $system->company }}</h5>
                    <h4 class="text-center">{{ $system->name }} <span class="badge badge-pill badge-info">{{ count($system->games)}}</span></h4>
                    
                </div>
                </a>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>
@endsection