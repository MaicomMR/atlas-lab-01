<x-app-layout>

    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Listagem de itens') }}
            </h2>
        </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h2 style="text-align: center">Nome da tabela: {{$listaCompra->nome}}</h2>
                <div class="w-full max-w-xs">
                    <form method="POST" action="{{ route('listas.editNamePost', ['id'=>$id]) }}"  class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                        @csrf
                      <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="nome">
                          Novo nome para lista
                        </label>
                        <input class=" form-control shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nome" name="nome" type="text" placeholder="Novo nome para lista">
                      </div>
                      <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="descricao">
                          Nova descricão
                        </label>
                        <input class="form-control shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="descricao" name="descricao" type="text" placeholder="Nova descrição">>
                      </div>
                      <div class="flex items-center justify-between">
                        <button type="submit">Salvar alterações</button>
                      </div>
                    </form>
                  </div>
            </div>
        </div>
    </div>


</x-app-layout>