@extends('app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <h2 class="title">Money Track</h2>
                        </div>
                        <div class="col-xs-6 text-right">
                            <a href="{{ route('money.create') }}" class="btn btn-primary">
                                <span class="glyphicon glyphicon-plus"></span>
                                Create New
                            </a>
                        </div>
                    </div>
                </div>
                @foreach($money->all() as $moneyList)
                    <div class="panel-body">
                        <div class="moneyList">
                            <div class="row">
                                <div class="col-xs=12 col-sm-6 col-md-4">
                                    <a href="{{ route('money.show', $moneyList) }}">
                                        <div class="panel panel-custom">
                                            <div class="panel-heading">{{ $moneyList->title }}</div>

                                            <div class="panel-body">
                                                <p>{{ $moneyList->description }}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@stop