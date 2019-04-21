<table class="table table-striped">
	<thead>
		<th>Date Updated</th>
		<th>User</th>
		<th>Score</th>
	</thead>
	<tbody>
		@foreach($scores as $score)
		<tr>
			<td>{{ $score->updated_at }}</td>
			<td>{{ $score->user->name}}</td>
			<td><a href="{{ route('score.show', ['score' => $score]) }}">{{ $score->score }}</a></td>
		</tr>
		@endforeach
	</tbody>
</table>
<div class="row justify-content-center py-2">
	{{ $scores->links() }}
</div>