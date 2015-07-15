@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            {!! Form::open(['action' => 'PasswordController@postEmail']) !!}

                    <!-- Email Form Input -->
            <div class="form-group">
                {!! Form::label('email', 'Email:') !!}
                {!! Form::email('email', null, ['class' => 'form-control']) !!}
            </div>

            @include('partials.errors')

                    <!-- Reset Password Form Input -->
            <div class="form-group">
                {!! Form::submit('Reset Password', ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@stop
