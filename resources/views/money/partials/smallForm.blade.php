@if(isset($titleRequired) && $titleRequired)
    <div class="form-group">
        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
    </div>
@endif

<div class="form-group">
    {!! Form::select('type', $typeOptions, null, ['class' => 'form-control', 'placeholder' => 'Type']) !!}
</div>

<div class="form-group">
    {!! Form::input('number', 'amount', null, ['class' => 'form-control', 'placeholder' => 'Amount', 'step' => 'any']) !!}
</div>

<div class="form-group">
    {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '2', 'placeholder' => 'Description (optional)']) !!}
</div>

<div class="form-group">
    {!! Form::submit($buttonText, ['class' => 'btn btn-primary form-control']) !!}
</div>