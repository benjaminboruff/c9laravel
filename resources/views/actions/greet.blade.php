@extends('layouts.master')

@section('content')
    <div class="centered">
        <h1>I greet {{ $name or 'you' }}!</h1>
    </div>
@endsection