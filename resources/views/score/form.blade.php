<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
<div class="form-group">
			<label for="game_id">Game:</label>
			<select class="form-control" name="game_id">
				@foreach ($games as $game)
					<option value="{{ $game->id }}" {{ $game->id == $score->game_id ? 'selected' : '' }}>{{$game->title}} ({{ $game->system->name }})</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label for="title">Score:</label>
			<input type="text" class="form-control" name="score" placeholder="Add your score here" value="{{ old('score') ?? $score->score }}">
			<div>{{ $errors->first('score') }}</div>
		</div>
		<div class="form-group">
			<label for="screenshot">Screenshot:</label>
			<input type="file" class="form-control" name="screenshot">
			<div>{{ $errors->first('screenshot') }}</div>
		</div>