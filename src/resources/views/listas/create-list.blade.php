<x-app-layout>

<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criação de nova lista de compras') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <form action="{{ route('add-lista') }}" method="post">
                        @csrf
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Nome da lista:</span>
                            <input value="{{old('nome')}}" name="nome" type="text" placeholder="Compras da mês" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Descrição:</span>
                            <input value="{{old('descricao')}}" name="descricao" placeholder="Compras do mês" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                        <button style="text-align: center" class="btn btn-success" type="submit">Criar nova lista</button>
                    </form>
            </div>
        </div>
    </div>
</x-app-layout>
