@extends('layouts.master')

@section('content')
    <div class="centered">
        
        @foreach($actions as $action)
            <a href="{{ route('selection', strtolower($action->name)) }}">{{$action->name}}</a>
        @endforeach
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
        
        <form action=" {{ route('add_action') }} " method="post">
            <label for="name">Name of action:  </label>
            
            <!--<select id="select-action" name="action">-->
            <!--    <option value="greet">Greet</option>-->
            <!--    <option value="hug">Hug</option>-->
            <!--    <option value="kiss">Kiss</option>-->
            <!--</select>-->
            <input type="text" name="name" id="name"/>
            <label for="niceness">Niceness value: </label>
            <input type="text" name="niceness" id="niceness"/>
            <button type="submit">Submit</button>
            {{ csrf_field() }}
        </form>
        <br>
        <br>
        
        <ul>
        @foreach($logs as $log)
            <li>
                {{ $log->selection_action->name }}
                @foreach($log->selection_action->categories as $category)
                    {{ $category->name  }}
                @endforeach
            </li>
        @endforeach
        </ul>
        
    </div>
@endsection