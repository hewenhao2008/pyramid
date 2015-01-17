@extends('layout.base')
@section('sidebar')
Hello {{{$name}}} , your age is {{{ $age }}} , your friend is {{{$friend or 'LULU'}}},today is {{date('Y-m-d',time())}}
@stop

@{{ This will not be processed by Blade }}

@if($name == 'Bruce')
Your name is  Bruce
@else
Your haven't a name
@endif

@for ($i = 0; $i < count($data); $i++)
    The current value is {{$data[$i]}} <hr>
@endfor

@foreach ($data as $vo)
    number is {{$vo}} <hr>
@endforeach