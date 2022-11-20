<form action="{{ route('add-compras') }}" method="post">
    @csrf
    <input type="text" placeholder="Compra1" name="compra1" style="margin-bottom: 5px">
    <input type="text" placeholder="valorcompra1" name="valor" style="margin-bottom: 5px"><br>

{{--    <input type="text" placeholder="Compra2" name="compra2" style="margin-bottom: 5px">--}}
{{--    <input type="text" placeholder="valorcompra2" name="valor2" style="margin-bottom: 5px"><br>--}}

{{--    <input type="text" placeholder="Compra3" name="compra3" style="margin-bottom: 5px">--}}
{{--    <input type="text" placeholder="valorcompra3" name="valor3" style="margin-bottom: 5px"><br>--}}

{{--    <input type="text" placeholder="Compra4" name="compra4" style="margin-bottom: 5px">--}}
{{--    <input type="text" placeholder="valorcompra4" name="valor4" style="margin-bottom: 5px"><br>--}}

    <button type="submit">Comprar itens</button>
</form>


