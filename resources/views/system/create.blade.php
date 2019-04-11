@extends('layouts.app')
@section('content')
<div class="container fill">
	<form action="{{ route('system.store')}}" method="POST">
		@csrf
		@include('system.form')
		<div class="form-group">
			<button type=Submit class="btn btn-primary">Add</button>
		</div>
	</form>
</div>
@endsection