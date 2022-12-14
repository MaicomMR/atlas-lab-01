<x-app-layout>
    <html>

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edição da lista de compras & Adição de itens a lista</div><br>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                        <tr>
                            <td class="border px-6 py-4">Nome da lista: {{$listaCompra->nome}}</td><br>
                            <td class="border px-6 py-4">Descrição: {{$listaCompra->descricao}}</td>
                        </tr>

                            <form action="{{ route('add-compras') }}" method="post">
                                @csrf
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Produto:</span>
                                    <input value="{{old('compra1')}}" name="compra1" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Valor:</span>
                                    <input value="{{old('valor')}}" name="valor" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Quantidade:</span>
                                    <input value="{{old('quantidade')}}" name="quantidade" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                                <button class="btn btn-success" type="submit">Adicionar a lista</button>
                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </html>
</x-app-layout>




