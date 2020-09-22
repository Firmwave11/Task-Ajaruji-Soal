@extends('app')
@section('content')
<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<strong>Penjelasan</strong>
		</div>
		<div class="panel-body">
				@if (session('status'))
					<div class="alert alert-success">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  	<strong>Success!</strong> {{ session('status') }}
					</div>
				@endif
			</div>
            <p>{!!$penjelasan['penjelasan']!!}</p>
			{!!$lanjut!!}
    </div>
</div>
@endsection