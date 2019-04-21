<div class="form-group">
			<label for="company">Company:</label>
			<input type="text" class="form-control" name="company" placeholder="eg. Commodore" value="{{ old('company') ?? $system->company }}">
			<div>{{ $errors->first('company') }}</div>
		</div>
		<div class="form-group">
			<label for="name">Name:</label>
			<input type="text" class="form-control" name="name" placeholder="Enter system name" value="{{ old('name') ?? $system->name }}">
			<div>{{ $errors->first('name') }}</div>
		</div>