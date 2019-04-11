@extends('layouts.app')
@section('content')
<div class="container fill">
	<table class="table table-striped">
	<thead>
		<th>Date Updated</th>
		<th>Game</th>
		<th>User</th>
		<th>Score</th>
		<th>Screenshot</th>
		
	</thead>
	<tbody>
		@foreach($scores as $score)
		<tr>
			<td>{{ $score->updated_at }}</td>
			<td><a href="/game/{{ $score->game->id}}">{{ $score->game->title}}</a></td>
			<td>{{ $score->user->name}}</td>
			<td>{{ $score->score }}</td>
			<td>
			<a class="btn btn-sm btn-success" href="{{ route('score.show', ['score' => $score]) }}">Screenshot</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
<div class="row justify-content-center py-2">
	{{ $scores->links() }}
</div>
</div>
@endsection