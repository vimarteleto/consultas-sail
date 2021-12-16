<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard de especialidades') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table table-sm table-ordered table-hover">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 text-md text-gray-800">Código</th>
                                <th class="px-4 py-2 text-md text-gray-800">Nome</th>
                                <th class="px-4 py-2 text-md text-gray-800">Editar</th>
                                <th class="px-4 py-2 text-md text-gray-800">Excluir</th>
                                <th class="px-4 py-2 text-md text-gray-800">Médicos</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-300">
                            @foreach ($specialties as $specialty)
                            <tr class="whitespace-nowrap">
                                <td class="px-4 py-2 text-md text-gray-500">{{$specialty->id}}</td>
                                <td class="px-2 py-2 text-md text-gray-500">{{$specialty->name}}</td>
                                <td class="px-2 py-2">
                                    <a  class="px-4 py-1 text-sm btn btn-sm btn-primary"
                                        href="{{route('specialty', ['id' => $specialty->id])}}"
                                    >
                                        Editar
                                    </a>
                                </td>
                                <td class="px-2 py-2">
                                    <a  class="px-4 py-1 text-sm btn btn-sm btn-danger"
                                        href="{{route('delete-specialty', ['id' => $specialty->id])}}"
                                    >
                                        Deletar
                                    </a>
                                </td>
                                <td class="px-2 py-2">
                                    <a  class="px-4 py-1 text-sm btn btn-sm btn-dark"
                                        href="{{route('specialty-users', ['id' => $specialty->id])}}"
                                    >
                                        Médicos
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a  class="px-4 py-1 text-sm btn btn-sm btn-success"
                        href="{{route('create-specialty')}}"
                    >
                        Nova especialidade
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
