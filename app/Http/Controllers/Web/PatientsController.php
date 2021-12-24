<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Patient\RegisterPatientRequest;
use App\Http\Requests\Patient\UpdatePatientRequest;
use App\Repositories\AppointmentRepository;
use App\Repositories\PatientRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientsController extends Controller
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

    public function getPatients()
    {
        $patients = $this->patientRepository->getPatients();
        return view('patients.patients', ['patients' => $patients]);
    }

    public function getPatientById($id)
    {
        $patient = $this->patientRepository->getPatientById($id);
        return view('patients.edit-patient', [
            'patient' => $patient,
        ]);
    }

    public function updatePatient(UpdatePatientRequest $request, $id)
    {
        $patient = $this->patientRepository->updatePatient($request, $id);
        return redirect('/patients')->with(['warning' => "Paciente $patient->name editado com sucesso!"]);
    }

    public function deletePatient($id)
    {
        $patient = $this->patientRepository->getPatientById($id);
        $this->patientRepository->deletePatient($id);
        return redirect('/patients')->with(['danger' => "Paciente $patient->name excluído com sucesso!"]);
    }

    public function createPatient()
    {
        return view('patients.create-patient');
    }

    public function storePatient(RegisterPatientRequest $request)
    {
        $patient = $this->patientRepository->createPatient($request);
        return redirect('/patients')->with(['success' => "Paciente $patient->name registrado com sucesso!"]);
    }

    public function teste()
    {
        return redirect('/patients')->with(['success' => 'ERRO!']);
    }

    public function getAppointmentsByPatientId($id)
    {
        $patient = $this->patientRepository->getPatientById($id);
        $appointments = $this->patientRepository->getAppointmentsByPatientId($id)->where('user_id', Auth::user()->id);
        return view('appointments.dashboard', ['appointments' => $appointments, 'patient' => $patient]);
    }
}