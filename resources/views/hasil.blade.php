@extends('app')
@section('content')
<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<strong>hasil</strong>
		</div>
            <p>{!!$jawab!!}</p>
            <a href="{{ url ('/') }}"><i class="fa fa-home"></i><span>Home</span></a>
    </div>
</div>
@endsection