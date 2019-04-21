<table class="table table-striped">
	<thead>
		<th width="50">ID</th>
		<th>Title</th>
		<th>Released</th>
	</thead>
	<tbody>
		@foreach($games as $game)
		<tr>
		<td>{{ $game->id }}</td>
		<td><a href="/game/{{ $game->id }}">{{ $game->title }}</a></td>
		<td>{{ $game->released }}</td>
		</tr>
		@endforeach
	</tbody>
</table>