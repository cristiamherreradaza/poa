<select class="form-control" id="distrito" name="distrito" onchange="cambiaDistrito()">
    <option value="">Seleccione</option>
    @foreach ($distritos as $d)
        <option value="{{ $d->id }}">{{ $d->nombre }}</option>
    @endforeach
</select>
<script type="text/javascript">

    function cambiaDistrito()
    {

        let distrito = $("#distrito").val();

        $.ajax({
            url: "{{ url('User/ajaxOtb') }}",
            data: {distrito: distrito},
            type: 'POST',
            success: function(data) {
                $("#ajaxOtb").html(data);
            // $("#listadoProductosAjax").html(data);
            }
        });
    }

</script>