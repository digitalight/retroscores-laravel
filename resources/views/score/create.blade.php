@extends('layouts.app')
@section('content')
<div class="container fill">
	<form action="{{ route('score.store')}}" method="POST" enctype="multipart/form-data">
		@csrf
		@include('score.form')
		<div class="form-group">
			<button type=Submit class="btn btn-primary">Add</button>
		</div>
	</form>
</div>
@endsection