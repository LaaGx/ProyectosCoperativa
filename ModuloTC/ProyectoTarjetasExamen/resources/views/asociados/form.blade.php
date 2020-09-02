<div class="form-group {{ $errors->has('CodigoAsociado') ? 'has-error' : ''}}">
    <label for="CodigoAsociado" class="control-label">{{ 'Codigoasociado' }}</label>
    <input class="form-control" name="CodigoAsociado" type="text" id="CodigoAsociado" value="{{ isset($asociado->CodigoAsociado) ? $asociado->CodigoAsociado : ''}}" >
    {!! $errors->first('CodigoAsociado', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('NombreAsociado') ? 'has-error' : ''}}">
    <label for="NombreAsociado" class="control-label">{{ 'Nombreasociado' }}</label>
    <input class="form-control" name="NombreAsociado" type="text" id="NombreAsociado" value="{{ isset($asociado->NombreAsociado) ? $asociado->NombreAsociado : ''}}" >
    {!! $errors->first('NombreAsociado', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('No_TC') ? 'has-error' : ''}}">
    <label for="No_TC" class="control-label">{{ 'No Tc' }}</label>
    <input class="form-control" name="No_TC" type="text" id="No_TC" value="{{ isset($asociado->No_TC) ? $asociado->No_TC : ''}}" >
    {!! $errors->first('No_TC', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('FechaEmisionTC') ? 'has-error' : ''}}">
    <label for="FechaEmisionTC" class="control-label">{{ 'Fechaemisiontc' }}</label>
    <input class="form-control" name="FechaEmisionTC" type="date" id="FechaEmisionTC" value="{{ isset($asociado->FechaEmisionTC) ? $asociado->FechaEmisionTC : ''}}" >
    {!! $errors->first('FechaEmisionTC', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('monto') ? 'has-error' : ''}}">
    <label for="monto" class="control-label">{{ 'Monto' }}</label>
    <input class="form-control" name="monto" type="text" id="monto" value="{{ isset($asociado->monto) ? $asociado->monto : ''}}" >
    {!! $errors->first('monto', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('SaldoActual') ? 'has-error' : ''}}">
    <label for="SaldoActual" class="control-label">{{ 'Saldoactual' }}</label>
    <input class="form-control" name="SaldoActual" type="text" id="SaldoActual" value="{{ isset($asociado->SaldoActual) ? $asociado->SaldoActual : ''}}" >
    {!! $errors->first('SaldoActual', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
