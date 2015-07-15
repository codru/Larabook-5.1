@extends('layouts.default')

@section('content')
    <h1>Sign In!</h1>

    <div class="row">
        <div class="col-md-6">
            {!! Form::open(['route' => 'login_path']) !!}

                    <!-- Email Form Input -->
            <div class="form-group">
                {!! Form::label('email', 'Email:') !!}
                {!! Form::text('email', null, ['class' => 'form-control', 'required' => 'required']) !!}
            </div>

            <!-- Password Form Input -->
            <div class="form-group">
                {!! Form::label('password', 'Password:') !!}
                {!! Form::password('password', ['class' => 'form-control']) !!}
            </div>

            @include('partials.errors')

            <div class="form-group">
                {!! Form::submit('Sign In', ['class' => 'btn btn-primary']) !!}
                {!! link_to_action('PasswordController@getEmail', 'forgot a password?') !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection
