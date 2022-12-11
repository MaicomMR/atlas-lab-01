<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de compras') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Descricão</th>
                </tr>
                </thead>
                @foreach($listas as $lista)
                    <tr>
                        <th scope="row">{{$lista->nome}}</th>
                        <td>{{$lista->descricao}}</td><br>
                        <td>
                            <a href="{{url('rm-compras')}}">Editar</a>
                        </td>
                        <td><br>
                            <a href="{{url('/lista/delete')}}">Deletar</a>
                        </td>
                    </tr>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
