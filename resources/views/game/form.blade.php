<div class="form-group">
			<label for="system_id">System:</label>
			<select class="form-control" name="system_id">
				@foreach ($systems as $system)
					<option value="{{ $system->id }}" {{ $system->id == $game->system_id ? 'selected' : '' }}>{{$system->company}} {{ $system->name }}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label for="title">Title:</label>
			<input type="text" class="form-control" name="title" placeholder="Game title" value="{{ old('title') ?? $game->title }}">
			<div>{{ $errors->first('title') }}</div>
		</div>
		<div class="form-group">
			<label for="released">Release year:</label>
			<input type="text" class="form-control" name="released" placeholder="eg. 1992" value="{{ old('released') ?? $game->released }}">
			<div>{{ $errors->first('released') }}</div>
		</div>
		<div class="form-group">
			<label for="cover">Cover Image:</label>
			<input type="file" class="form-control" name="cover">
			<div>{{ $errors->first('cover') }}</div>
		</div>
		