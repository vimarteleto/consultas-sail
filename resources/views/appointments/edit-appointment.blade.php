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
                    <form class="w-full max-w-lg" method="POST" action="{{route('edit-appointment', ['id' => $appointment->id])}}">
                        @csrf
                        <div class="w-full px-3 py-2">
                            <label for="grid-state" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" >
                                Paciente
                            </label>
                            <div class="relative">
                                <select required id="grid-state" name="patient_id" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                    @foreach ($patients as $patient)
                                        <option {{$appointment->patient_id == $patient->id ? 'selected' : ''}} value="{{$patient->id}}">{{$patient->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="w-full px-3 py-2">
                            <label for="grid-password" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                Data
                            </label>
                            <input required id="grid-password" name="date" type="date" value="{{date('Y-m-d', strtotime($appointment->date_time))}}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        </div>
                        <div class="w-full px-3 py-2">
                            <label for="grid-last-name" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" >
                                Horário
                            </label>
                            <input required id="grid-last-name" name="time" type="time" value="{{date('H:i', strtotime($appointment->date_time))}}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
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