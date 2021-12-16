<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar consulta') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="">
                        <table class="table table-sm table-ordered table-hover">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-4 py-2 text-md text-gray-800">Código</th>
                                    <th class="px-4 py-2 text-md text-gray-800">Paciente</th>
                                    <th class="px-4 py-2 text-md text-gray-800">Data</th>
                                    <th class="px-4 py-2 text-md text-gray-800">Horário</th>
                                    <th class="px-4 py-2 text-md text-gray-800">Salvar</th>
                                    <th class="px-4 py-2 text-md text-gray-800">Excluir</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-300">
                                <tr class="whitespace-nowrap">
                                    <td class="px-4 py-2 text-md text-gray-500">{{$appointment->id}}</td>
                                    <td class="px-2 py-2 text-md text-gray-500">{{$appointment->patient->name}}</td>
                                    <td class="px-2 py-2 text-md text-gray-500">{{date('d-m-Y', strtotime($appointment->date_time))}}</td>
                                    <td class="px-4 py-2 text-md text-gray-500">{{date('H:i', strtotime($appointment->date_time))}}</td>
                                    <td class="px-2 py-2">
                                        <a  class="px-4 py-1 text-sm btn btn-sm btn-success"
                                            href="{{route('appointment', ['id' => $appointment->id])}}"
                                        >
                                            Salvar
                                        </a>
                                    </td>
                                    <td class="px-2 py-2">
                                        <a  class="px-4 py-1 text-sm btn btn-sm btn-danger"
                                            href="{{route('delete-appointment', ['id' => $appointment->id])}}"
                                        >
                                            Deletar
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>