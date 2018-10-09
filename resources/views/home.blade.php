@extends('layouts.app')

@section('content')
<div class="container">
@if(getenv('APP_ENV') == 'local' || getenv('APP_ENV') == 'dev')
<script src="{{ asset('js/jquery.min.js')}}"></script>
@else
<script src="{{ secure_asset('js/jquery.min.js')}}"></script>
@endif

<div style="text-align:center; width:100%">
<img src="{{ asset('images/loading.gif') }}" style="width:180px;margin:auto" alt="">
</div>



<script>
$(".navbar").hide();
$(function(){
    $.ajax({
        url : '/verifylogin',
        type : 'get',
        dataType : 'json',
        success : function(data){
            console.log(data);
            if(data.login == true){
                $('body').load("{{ url('/calculo') }}");
                return false;
            }
            $('body').load("{{ url('/login') }}");
        }
    });
});
if ('serviceWorker' in navigator && 'PushManager' in window) {
    navigator.serviceWorker.register('service-worker.js').then(function(registration) {
        console.log('ServiceWorker registration successful with scope: ', registration.scope);
    }, function(err) {
        console.log('ServiceWorker registration failed: ', err);
    });
}
</script>
</div>
@endsection