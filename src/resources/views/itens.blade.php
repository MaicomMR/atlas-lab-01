<html>
@foreach($compras as $compra)
    <p style="display: inline-block; color: blue" >{{$compra->produto}}</p> || <p style="display: inline-block; color: red">{{$compra->valor}}</p>
@endforeach
</html>
