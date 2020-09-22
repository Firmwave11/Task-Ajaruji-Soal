@extends('app')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
@section('content')
<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<strong>Soal</strong>
		</div>
        <form name="" action="{{route('soal',[$page])}}" method="get" id="registerSubmit">
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label">Mata Pelajaran</label>
                <div class="col-md-6">
                    <select name="matapelajaran" id="matapelajaran" required>
                        <option value="">== Pilih Mata Pelajaran ==</option>
                        @foreach ($mataPelajaran as $pelajaran)
                            <option value="{{ $pelajaran['id'] }}">{{ $pelajaran['nama'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label">Pilih Soal</label>
                <div class="col-md-6">
                    <select name="soal" id="soal" required>
                        <option value="">--- Pilih Soal ---</option>
                    </select>
                </div>
                {{ csrf_field() }}
            </div>
            <input type="submit" value="Send" />
        </form>
		</div>
	</div>
</div>
@endsection
    <!-- Script -->
 <script type="text/javascript">
$(document).ready(function(){
    $("#matapelajaran").change(function(){
        $.ajax({
            /* the route pointing to the post function */
            url: '{{ route('ajax') }}',
            type: 'POST',
            /* send the csrf-token and the input to the controller */
            data: $("#registerSubmit").serialize(),//{ "mapel": $("#matapelajaran").val() },
            //dataType: "html",
            dataType: 'html',
            /* remind that 'data' is the response of the AjaxController */
            beforeSend: function() {
             $('#loader').show();
            },
            success: function (data) { 
                //$(".writeinfo").html(data.msg); 
                //var result = $('<div />').append(data).find('#writeinfo').html();
                //document.querySelector("#pop-benar");
                $('#soal').html(data);
                //document.querySelector("#pop-benar")
            },
            complete: function() {
              $('#loader').hide();
            },
            error: function (xhr, status) {
                alert("Sorry, there was a problem!");
            },
        }); 
    });
});    
</script> 
<!-- <script type="text/javascript">

$(function () {
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });
    $('#mataPelajaran').on('change', function () {
        axios.post('', {id: $(this).val()})
            .then(function (response) {
                $('#tryout').empty();
                $.each(response.data, function (id_mapel, nama) {
                    $('#tryout').append(new Option(nama, id_mapel))
                })
            });
    });
});
</script> -->

