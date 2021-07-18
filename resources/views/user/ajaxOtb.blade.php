<select class="form-control" id="sector_id" name="sector_id">
    <option value="">Seleccione</option>
    @foreach ($otbs as $o)
        <option value="{{ $o->id }}">{{ $o->nombre }}</option>
    @endforeach
</select>