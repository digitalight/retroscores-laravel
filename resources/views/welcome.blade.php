@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row py-2">
		<div class="col-md-4 py-2">
				<div class="row rounded border">
					<div class="col-4 bg-info">
						<h3 class="text-center py-3">{{count($systems)}}</h3>
					</div>
					<div class="col-8 bg-white">
						<h2 class="pt-3 text-center">Systems</h2>
					</div>
				</div>
		</div>
		<div class="col-md-4 py-2">
				<div class="row mx-1 rounded border">
					<div class="col-4 bg-success">
						<h3 class="text-center py-3">{{count($games)}}</h3>
					</div>
					<div class="col-8 bg-white">
						<h2 class="pt-3 text-center">Games</h2>
					</div>
				</div>
		</div>
		<div class="col-md-4 py-2">
				<div class="row rounded border">
					<div class="col-4 bg-warning">
						<h3 class="text-center py-3">{{count($scores)}}</h3>
					</div>
					<div class="col-8 bg-white">
						<h2 class="pt-3 text-center">Scores</h2>
					</div>
				</div>
		</div>
	</div>
	<div class="row justify-content-center py-2">
		<h4 class="text-center">Latest Scores</h4>
		<table class="table table-striped">
			<thead>
				<th>Date</th>
				<th>Game</th>
				<th>User</th>
				<th>Score</th>
			</thead>
			<tbody>
				@foreach($scores as $score)
				<tr>
					<td>{{ $score->updated_at}}</td>
					<td>{{ $score->game->title}}</td>
					<td>{{ $score->user->name}}</td>
					<td><a href="{{ route('score.show', ['score' => $score]) }}">{{ $score->score }}</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	
	
</div>
@endsection