@extends('app')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
@section('content')
<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<strong>Soal</strong>
			<strong><br>Mata Pelajaran : {{$soal['mata_pelajaran']}}</br></strong>
		</div>
            <form name="" id="soal" method="post">
		 @foreach ($soal['soal'] as $datas)
            <p>{{$page}}.{!!$datas['content']!!}</p>
			@foreach($datas['answer'] as $answer)
				<label for="jawaban">
                    <input class="jawaban" type="radio" id="jawaban" name="jawaban" value="{{$answer['content']}}" required="required">{!!$answer['content']!!}
                </label></br>
			@endforeach 
		@endforeach
          <button type="submit" name="jawab" id="jawab" class="btn btn-success" data-target="#ModalJawab" data-backdrop="static" disabled="disabled" data-toggle="modal" value="jawab">Periksa</button>
			</form>
               <div id="ModalJawab" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Jawaban Anda:</h4>
					</div>
					<div class="modal-body">
                         <form action ="{{route('jelas', [$data,$idsoal,$page])}}" class="bootstrap-modal-form" name="modal_popup" method="get">
                         <div class="alert alert-success d-none" id="msg_div">
         	               </div>
						<button type="submit" class="btn btn-info" >Penjelasan</button>
			          </form>
                         {!!$lanjut!!}
                         {{ csrf_field() }}
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>	
</div>
{!!$output!!}
@endsection
<script type="text/javascript">
$(document).ready(function(){
    $('.jawaban').change(function(){
    $('#jawab').removeAttr('disabled');});
    $("#jawab").click(function(e){
		e.preventDefault();
		$.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
        $.ajax({
            /* the route pointing to the post function */
            url: '{{ route('jawab', [$data,$idsoal,$page]) }}',
            type: 'POST',
            /* send the csrf-token and the input to the controller */
            data: $("#soal").serialize(),
            dataType: 'html',
            /* remind that 'data' is the response of the AjaxController */
            beforeSend: function() {
             //$('#loader').show();
            },
            success: function (data) { 
                //$(".writeinfo").html(data.msg);
			$('#msg_div').html(data);

                //document.querySelector("#pop-benar")
            },
            error: function (xhr, status) {
                alert("Sorry, there was a problem!");
            },
        }); 
    });
}); 
</script>