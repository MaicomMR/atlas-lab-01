<x-app-layout>

    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Listagem de itens') }}
            </h2>
        </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h2 style="text-align: center">Nome da tabela</h2>
                <table class="w-full whitespace-no-wrapw-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-center font-bold">
                            <td class="border px-6 py-4" style="text-align: center">Item</td>
                            <td class="border px-6 py-4" style="text-align: center">Valor</td>
                        </tr>
                        @foreach($itens as $item)
                        <tr class="text-center font-bold">
                            <td class="border px-6 py-4" style="text-align: center">{{$item->item}}</td>
                            <td class="border px-6 py-4" style="text-align: center">{{$item->valor}}</td>
                        </tr>
                        @endforeach
                    </thead>
                </table>
            </div>
        </div>
    </div>


</x-app-layout>