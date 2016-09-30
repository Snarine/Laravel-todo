 @extends('todo.layouts.default')
 
@section('content')
 	 
 	@foreach ($errors->all() as $error)
        <div class="errors">{{ $error }}</div>
    @endforeach
    
 
    {{ Form::open(array('route' => 'user-login')) }}
    <input type="text" name="username" placeholder="username">
    <input type="text" name="password" placeholder="Password">
    <button type="submit">Submit</button>
    {{ Form::close() }}
@stop