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
                            <button class="btn btn-primary" data-toggle="modal" data-target="#moneyCreateModal">
                                <span class="glyphicon glyphicon-plus"></span>
                                Create New
                            </button>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="moneyList"id="moneyList">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('js')
    <script src="/js/money/index.js" type="text/jsx"></script>
@stop