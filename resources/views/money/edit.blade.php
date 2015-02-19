@extends('app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Money Track: {{ $money->title }}</div>

                <div class="panel-body">
                    {!! Form::model($money, ['route' => ['money.update', $money->id], 'method' => 'PATCH']) !!}
                        @include('money.partials.form', ['buttonText' => 'Edit'])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@stop