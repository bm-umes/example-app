
@extends('layouts.app')
 
 @section('title', 'Page Title')
  
 @section('sidebar')
     @parent
  
     <p>This is appended to the master sidebar.</p>
 @endsection
  
 @section('content')

{{$texto}} </br>
{!!$texto!!} </br>
@{{ $texto }}</br>
{{$ip}}
</br>
{{$url}}</br>
{{ time() }}
@verbatim
    <div class="container">
        Hello, {{ name }}.
    </div>
@endverbatim
Contador: {{$contador}}</br>
ContadorCache: {{$contadorCache}}

@endsection