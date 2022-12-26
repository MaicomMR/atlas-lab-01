<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de compras') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="w-full whitespace-no-wrapw-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-center font-bold">
                            <td class="border px-6 py-4">Nome</td>
                            <td class="border px-6 py-4">Descricão</td>
                        </tr>
                    </thead>
                    @foreach($listas as $lista)
                        <tr>
                            <td class="border px-6 py-4">{{$lista->nome}}</td>
                            <td class="border px-6 py-4">{{$lista->descricao}}</td>
                            <td class="border px-6 py-4">
                                <form method="DELETE">
                                <button type="button" onclick="window.location='{{ URL::route('listas.edit', ['id' => $lista->id]); }}'" class="btn btn-primary">Adicionar itens</button>
                                <button type="button" onclick="window.location='{{ URL::route('listas.editName', ['id' => $lista->id]); }}'" class="btn btn-primary">Editar nome</button>
                                <button type="button" onclick="window.location='{{ URL::route('listas.itens', ['id' => $lista->id]); }}'" class="btn btn-primary">Listar itens</button>
                                <button type="button" onclick="window.location='{{ URL::route('delete.list', ['id' => $lista->id]); }}'" class="btn btn-primary">Deletar Lista</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
