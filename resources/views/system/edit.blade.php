@extends('layouts.app')
@section('content')
<div class="container fill">
	<form action="{{ route('system.update', ['system' => $system])}}" method="POST">
		@csrf
		@method('PATCH')
		@include('system.form')
		<div class="form-group">
			<button type=Submit class="btn btn-primary">Update</button>
		</div>
	</form>
</div>
@endsection