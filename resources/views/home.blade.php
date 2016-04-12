@extends('layouts.master')

@section('content')
    <div class="centered">
        <a href=" {{ route('selection', ['action' => 'greet']) }} ">Greet</a>
        <a href=" {{ route('selection', ['action' => 'hug']) }} ">Hug</a>
        <a href=" {{ route('selection', ['action' => 'kiss']) }} ">Kiss</a>
        <br>
        <br>
        @if (count($errors) > 0)
        
            <div>
                
                    @foreach($errors->all() as $error)
                    
                        {{ $error }}
                        <br>
                        <br>
                    
                    @endforeach
                
            </div>
        
        @endif
        <form action=" {{ route('benice') }} " method="post">
            <label for="select-action">I want to ...</label>
            <select id="select-action" name="action">
                <option value="greet">Greet</option>
                <option value="hug">Hug</option>
                <option value="kiss">Kiss</option>
            </select>
            <input type="text" name="name"/>
            <button type="submit">Submit</button>
            {{ csrf_field() }}
        </form>
    </div>
@endsection