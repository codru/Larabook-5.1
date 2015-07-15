@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="com-md-6 col-md-offset-3">
            {!! Form::open() !!}

            {!! Form::hidden('token', $token) !!}

                    <!-- Email Form Input -->
            <div class="form-group">
                {!! Form::label('email', 'Email:') !!}
                {!! Form::email('email', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Password Form Input -->
            <div class="form-group">
                {!! Form::label('password', 'Password:') !!}
                {!! Form::password('password', ['class' => 'form-control']) !!}
            </div>


            <!-- Password Confirmation Form Input -->
            <div class="form-group">
                {!! Form::label('password_confirmation', 'Password Confirmation:') !!}
                {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
            </div>

            @include('partials.errors')

                    <!-- Reset Password Form Input -->
            <div class="form-group">
                {!! Form::submit('Reset Password', ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection
