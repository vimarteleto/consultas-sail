<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Appointment\RegisterAppointmentRequest;
use App\Http\Requests\Appointment\UpdateAppointmentRequest;
use App\Repositories\AppointmentRepository;
use App\Repositories\PatientRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    protected $userRepository;
    protected $appointmentRepository;
    protected $patientRepository;

    public function __construct(
        UserRepository $userRepository, 
        AppointmentRepository $appointmentRepository,
        PatientRepository $patientRepository
    )
    {
        $this->userRepository = $userRepository;
        $this->appointmentRepository = $appointmentRepository;
        $this->patientRepository = $patientRepository;
    }

    public function getAppointments()
    {
        $id = Auth::user()->id;
        $appointments = $this->userRepository->getAppointmentsByUserId($id);
        return view('appointments.dashboard', ['appointments' => $appointments]);
    }

    public function getAppointmentById($id)
    {
        $appointment = $this->appointmentRepository->getAppointmentById($id);
        $patients = $this->patientRepository->getPatients()->sortBy('name');
        return view('appointments.edit-appointment', [
            'appointment' => $appointment,
            'patients' => $patients
        ]);
    }

    public function updateAppointment(UpdateAppointmentRequest $request, $id)
    {   
        
        $this->appointmentRepository->updateAppointment($request, $id);
        return redirect('/dashboard')->with(['warning' => 'Consulta editada com sucesso!']);
    }

    public function deleteAppointment($id)
    {
        $this->appointmentRepository->deleteAppointment($id);
        return redirect('/dashboard')->with(['danger' => 'Consulta excluída com sucesso!']);
    }

    public function createAppointment()
    {
        $patients = $this->patientRepository->getPatients()->sortBy('name');
        return view('appointments.create-appointment', [
            'patients' => $patients
        ]);
    }

    public function storeAppointment(RegisterAppointmentRequest $request)
    {
        $this->appointmentRepository->createAppointment($request);
        return redirect('/dashboard')->with(['success' => 'Consulta registrada com sucesso!']);
    }
}
