@extends('layouts.app')
@section('content')
<div class="container">
	<form action="{{ route('game.update', ['game' => $game])}}" method="POST" enctype="multipart/form-data">
		@csrf
		@method('PATCH')
		@include('game.form')
		<div class="form-group">
			<button type=Submit class="btn btn-primary">Update</button>
		</div>
	</form>
</div>
@endsection