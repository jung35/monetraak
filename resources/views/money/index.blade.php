@extends('app')

@section('modal')
    <div class="modal fade" id="moneyCreateModal" tabindex="-1" role="dialog" aria-labelledby="moneyCreateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="moneyCreateModalLabel">Create New Tracker</h4>
                </div>
                <div id="MoneyForm"></div>
            </div>
        </div>
    </div>
@stop

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