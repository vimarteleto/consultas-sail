<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard de pacientes') }}
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
                                <th class="px-4 py-2 text-md text-gray-800">CPF</th>
                                <th class="px-4 py-2 text-md text-gray-800">Nascimento</th>
                                <th class="px-4 py-2 text-md text-gray-800">Editar</th>
                                <th class="px-4 py-2 text-md text-gray-800">Excluir</th>
                                <th class="px-4 py-2 text-md text-gray-800">Consultas</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-300">
                            @foreach ($patients as $patient)
                            <tr class="whitespace-nowrap">
                                <td class="px-4 py-2 text-md text-gray-500">{{$patient->id}}</td>
                                <td class="px-2 py-2 text-md text-gray-500">{{$patient->name}}</td>
                                <td class="px-2 py-2 text-md text-gray-500">{{$patient->cpf}}</td>
                                <td class="px-4 py-2 text-md text-gray-500">{{date('d/m/Y', strtotime($patient->birthday))}}</td>
                                <td class="px-2 py-2">
                                    <a  class="px-4 py-1 text-sm btn btn-sm btn-primary"
                                        href="{{route('patient', ['id' => $patient->id])}}"
                                    >
                                        Editar
                                    </a>
                                </td>
                                <td class="px-2 py-2">
                                    <a  class="px-4 py-1 text-sm btn btn-sm btn-danger"
                                        href="{{route('delete-patient', ['id' => $patient->id])}}"
                                    >
                                        Deletar
                                    </a>
                                </td>
                                <td class="px-2 py-2">
                                    <a  class="px-4 py-1 text-sm btn btn-sm btn-dark"
                                        {{-- href="{{route('appointments-patient', ['id' => $patient->id])}}" --}}
                                    >
                                        Consultas
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a  class="px-4 py-1 text-sm btn btn-sm btn-success"
                        href="{{route('create-patient')}}"
                    >
                        Novo paciente
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
