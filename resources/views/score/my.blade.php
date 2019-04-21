@extends('layouts.app')
@section('content')
<div class="container fill">
	<div class="row justify-content-center py-2">
		<h4>My Scores</h4>
	</div>
	<table class="table table-striped">
		<thead>
			<th>Date</th>
			<th>Game</th>
			<th>Score</th>
			<th>Operations</th>
		</thead>
		<tbody>
			@if (count($myscores) == 0)
				<tr><td><p>No scores entered yet. Click your name in the top right and <strong>Add Score</strong></p></td></tr>
			@else
				@foreach($myscores as $myscore)
			<tr>
				<td>{{ $myscore->updated_at}}</td>
				<td>{{ $myscore->game->title}}</td>
				<td>{{ $myscore->score}}</td>
				<td>
					<div>
						<form action="{{ route('score.destroy', ['score' => $myscore]) }}" method="POST">
                @method('DELETE')
                @csrf
					<a class="btn btn-sm btn-primary" href="{{ route('score.edit', ['score' => $myscore])}}">Edit</a>
					<a class="btn btn-sm btn-success" href="{{ route('score.show', ['score' => $myscore]) }}">Show</a>
					

                <button class="btn btn-sm btn-danger" type="submit">Delete</button>
            </form>
        </div>
				</td>
			</tr>
			@endforeach
			@endif

		</tbody>
	</table>
	<div class="row justify-content-center pt-2">
	{{ $myscores->links()}} 
</div>
</div>
@endsection