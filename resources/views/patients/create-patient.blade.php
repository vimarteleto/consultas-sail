<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cadastrar paciente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form class="w-full max-w-lg" method="POST" action="{{route('store-patient')}}">
                        @csrf
                        <div class="w-full px-3 py-2">
                            <label for="grid-password" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                Nome
                            </label>
                            <input required id="grid-password" name="name" type="text"class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        </div>

                        <div class="w-full px-3 py-2">
                            <label for="grid-password" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                CPF
                            </label>
                            <input required maxlength="11" minlength="11" id="grid-password" name="cpf" type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        </div>

                        <div class="w-full px-3 py-2">
                            <label for="grid-last-name" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" >
                                Nascimento
                            </label>
                            <input required id="grid-last-name" name="birthday" type="date" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        </div>
                        <div class="w-full px-3 py-2" style="display: flex; justify-content:flex-end; gap:24px">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                            <a href="{{route('patients')}}" type="submit" class="btn btn-success">Voltar</a>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

    
</x-app-layout>