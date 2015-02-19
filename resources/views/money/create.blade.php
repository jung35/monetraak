@extends('app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">New Money Track</div>

                <div class="panel-body">
                    {!! Form::open(['route' => 'money.store']) !!}
                        @include('money.partials.form', ['buttonText' => 'Create'])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@stop