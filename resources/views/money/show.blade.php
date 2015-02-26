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
                                <a href="{{ route('api.v1.money.edit', $money) }}" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-plus"></span>
                                    Edit
                                </a>
                                {!! Form::open(['route' => ['api.v1.money.destroy', $money], 'method' => 'DELETE', 'class' => 'form-inline']) !!}
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
                                            <th>Title</th>
                                            <th width="90px" class="text-right">Saved</th>
                                            <th width="90px" class="text-right">To Save</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($moneyList as $moneyItem)
                                            <tr>
                                                <td>{{ $moneyItem->title }}</td>
                                                <td class="text-right">${{ number_format($moneyItem->saved, 2) }}</td>
                                                <td class="text-right">${{ number_format($moneyItem->to_save, 2) }}</td>
                                            </tr>
                                        @endforeach
                                        <tr class="money-list-end">
                                            <td></td>
                                            <td class="text-right">
                                               ${{ number_format($moneyInfo->money_final, 2) }}
                                            </td>
                                            <td class="text-right"></td>
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
                                                {!! Form::open(['route' => ['api.v1.money.modify', $money->id], 'method' => 'POST']) !!}
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
                                                {!! Form::open(['route' => ['api.v1.money.save', $money->id], 'method' => 'POST']) !!}
                                                    @include('money.partials.smallForm', ['titleRequired' => true,'typeOptions' => ['Dollars', 'Percent (100% = 100.00)'], 'buttonText' => 'Save Money'])
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <textarea name="log" cols="30" rows="10" class="form-control" disabled>
@foreach($moneyLogs as $moneyLog)
{{ $moneyLog->toString() }}
@endforeach
</textarea>
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

@section('js')
    <script src="/js/money/show.js" type="text/jsx"></script>
@stop