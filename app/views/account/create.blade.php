@extends('layout.main')

@section('content')

<form action="{{ URL::route('account-create-post') }}" method="post">

      <div class="form-group">
        Email: <input type="text" name="email" {{ (Input::old('email')) ? 'value="'. e(Input::old('email')) .'"' : '' }}/>

        @if($errors->has('email'))
            {{ $errors->first('email') }}
        @endif
    </div>

      <div class="form-group">
        Username: <input type="text" name="username" {{ (Input::old('username')) ? 'value="'. e(Input::old('username')) .'"' : '' }}/>

        @if($errors->has('username'))
            {{ $errors->first('username') }}
        @endif
    </div>

        <div class="form-group">
        Password: <input type="password" name="password" />

        @if($errors->has('password'))
            {{ $errors->first('password') }}
        @endif
    </div>

        <div class="form-group">
        Password Again: <input type="password" name="password_again" />

        @if($errors->has('password_again'))
            {{ $errors->first('password_again') }}
        @endif
    </div>


    {{ Form::token() }}


    <input type="submit" value="Create Account"/>
</form>

<!--
/*
    {{ Form::open([
            'route'=>'account-create-post'
        ])
    }}

        <div class="field">
            Email:
            {{ Form::text('email') }}

            @if($errors->has('email'))
                {{ $errors->first('email') }}
            @endif
        </div>

        <div class="field">
            Username:
            {{ Form::text('username') }}

            @if($errors->has('username'))
                {{ $errors->first('username') }}
            @endif
        </div>

        <div class="field">
            Password:
            {{ Form::password('password') }}

            @if($errors->has('password'))
                {{ $errors->first('password') }}
            @endif
        </div>

        <div class="field">
            Password Again:
            {{ Form::password('password_again') }}

            @if($errors->has('password_again'))
                {{ $errors->first('password_again') }}
            @endif
        </div>

        {{ Form::submit('Create Account') }}

    {{ Form::close() }}
*/
-->
@stop