<html>@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Lista de compras') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <table class="table table-dark">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Produto</th>
                                    <th scope="col">Valor</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($compras as $compra)
                                    <tr>
                                        <th scope="row">{{$compra->id}}</th>
                                        <td>{{$compra->produto}}</td>
                                        <td>{{$compra->valor}}</td>
                                        <td>
                                            <a href="{{url('rm-compras')}}">Editar</a>
                                        </td>
                                        <td>
                                            <a href="{{url('/lista/delete')}}">Deletar</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <form style="margin-top: 30px" method="post" action="{{route('rm-compras')}}">
                                @csrf
                                @method('delete')
                                <span >Qual desses itens você gostaria de deletar anjo? Insira o ID do item dentro do campo ao lado:</span>
                                <input type="text" placeholder="Item a ser deletado" name="delete" style="margin-bottom: 5px">
                                <button type="submit">Clique aqui!</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


</html>
