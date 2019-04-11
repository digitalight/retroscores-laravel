@extends('layouts.app')
@section('content')
<div class="container fill">
	<form action="{{ route('score.update', ['score' => $score])}}" method="POST" enctype="multipart/form-data">
		@csrf
		@method('PATCH')
		@include('score.form')
		<div class="form-group">
			<button type=Submit class="btn btn-primary">Update</button>
		</div>
	</form>
</div>
@endsection