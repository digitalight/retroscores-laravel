@extends('layouts.app')
@section('content')
<div class="container">
	<form action="{{ route('game.store')}}" method="POST" enctype="multipart/form-data">
		@csrf
		@include('game.form')
		<div class="form-group">
			<button type=Submit class="btn btn-primary">Add</button>
		</div>
	</form>
</div>
@endsection