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
                                <th class="px-4 py-2 text-md text-gray-800">CRM</th>
                                <th class="px-4 py-2 text-md text-gray-800">Email</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-300">
                            @foreach ($users as $user)
                            <tr class="whitespace-nowrap">
                                <td class="px-4 py-2 text-md text-gray-500">{{$user->id}}</td>
                                <td class="px-2 py-2 text-md text-gray-500">{{$user->name}}</td>
                                <td class="px-2 py-2 text-md text-gray-500">{{$user->crm}}</td>
                                <td class="px-2 py-2 text-md text-gray-500">{{$user->email}}</td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a  class="px-4 py-1 text-sm btn btn-sm btn-success"
                        href="{{route('specialties')}}"
                    >
                        Voltar
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
