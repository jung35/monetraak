@extends('app')

@section('content')

<div class="moneyList">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-8 col-sm-9 ">
                                <h2 class="title">{{ $money->title }}</h2>
                            </div>
                            <div class="col-xs-4 col-sm-3 text-right">
                                <a href="{{ route('money.edit', $money) }}" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-plus"></span>
                                    Edit
                                </a>
                                {!! Form::open(['route' => ['money.destroy', $money], 'method' => 'DELETE', 'class' => 'form-inline']) !!}
                                    <button type="submit" class="btn btn-danger">
                                        <span class="glyphicon glyphicon-minus"></span> Delete
                                    </button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <p class="text-muted">{{ $money->description }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-lg-6">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Type</th>
                                            <th class="text-right">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>ASD</td>
                                            <td class="text-right">$91.00</td>
                                        </tr>
                                        <tr>
                                            <td>ASD</td>
                                            <td class="text-right">$91.00</td>
                                        </tr>
                                        <tr>
                                            <td>ASD</td>
                                            <td class="text-right">$91.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-xs-12 col-lg-6">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="title">Modify Money</h4>
                                            </div>
                                            <div class="panel-body">
                                                {!! Form::open() !!}
                                                    @include('money.partials.smallForm', ['typeOptions' => ['Add', 'Subtract'], 'buttonText' => 'Submit'])
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="title">Save Money</h4>
                                            </div>
                                            <div class="panel-body">
                                                {!! Form::open() !!}
                                                    @include('money.partials.smallForm', ['typeOptions' => ['Dollars', 'Percent (100% = 100.00)'], 'buttonText' => 'Save Money'])
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <textarea name="log" cols="30" rows="10" class="form-control" disabled></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop