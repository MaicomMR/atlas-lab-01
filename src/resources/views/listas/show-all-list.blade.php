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
                            <td class="border px-6 py-4">Ações:</td>
                        </tr>
                    </thead>
                    @foreach($listas as $lista)
                        <tr>
                            <td class="border px-6 py-4">{{$lista->nome}}</td>
                            <td class="border px-6 py-4">{{$lista->descricao}}</td>
                            <td class="border px-6 py-4"></td>
                            <button class="btn btn-sucess">Clique aqui</button>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
