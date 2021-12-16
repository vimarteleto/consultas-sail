<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Atualizar perfil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form class="w-full max-w-lg" method="POST" action="{{route('edit-user', ['id' => $user->id])}}">
                        @csrf
                        <div class="w-full px-3 py-2">
                            <label for="grid-password" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                Nome
                            </label>
                            <input required id="grid-password" name="name" type="text" value="{{$user->name}}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        </div>

                        <div class="w-full px-3 py-2">
                            <label for="grid-password" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                CRM
                            </label>
                            <input required maxlength="5" minlength="5" id="grid-password" name="crm" type="text" value="{{$user->crm}}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        </div>

                        <div class="w-full px-3 py-2">
                            <label for="grid-password" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                Email
                            </label>
                            <input required maxlength="11" minlength="11" id="grid-password" name="email" type="email" value="{{$user->email}}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        </div>

                        <div class="w-full px-3 py-2">
                            <label for="grid-password" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                Especialidade
                            </label>
                            <select required id="grid-state" name="specialty_id" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                <option disabled selected value="">Selecione a especialidade</option>
                                @foreach ($specialties as $specialty)
                                    <option {{$user->specialty_id == $specialty->id ? 'selected' : '' }} value="{{$specialty->id}}">{{$specialty->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="w-full px-3 py-2" style="display: flex; justify-content:flex-end; gap:24px">
                            <button type="submit" class="btn btn-primary">Editar</button>
                            <a href="{{route('dashboard')}}" type="submit" class="btn btn-success">Voltar</a>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

    
</x-app-layout>