<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Patient\UpdatePatientRequest;
use App\Http\Requests\Patient\RegisterPatientRequest;
use App\Repositories\PatientRepository;

class PatientController extends Controller
{
    private $patientRepository;

    public function __construct(PatientRepository $patientRepository)
    {
        $this->patientRepository = $patientRepository;
    }

    public function createPatient(RegisterPatientRequest  $request)
    {
        $patient = $this->patientRepository->createPatient($request);
        return response()->json($patient, 200);
    }
    
    public function getPatients()
    {
    	$patients = $this->patientRepository->getPatients();
        return response($patients);
    }

    public function getPatientById($id)
    {
        $patient = $this->patientRepository->getPatientById($id);
        return $patient ?? response()->json(['message' => "Patient does not exists"], 404);
    }

    public function getAppointmentsByPatientId($id)
	{
		$appointments = $this->patientRepository->getAppointmentsByPatientId($id);
        return $appointments ?? response()->json(['message' => "Patient does not exists"], 404);
	}

    public function updatePatient(UpdatePatientRequest $request, $id)
	{
        $patient = $this->patientRepository->updatePatient($request, $id);
		return $patient ?? response()->json(['message' => "Patient does not exists"], 404);
	}

    public function deletePatient($id)
	{
        $patient = $this->patientRepository->deletePatient($id);
        $patient ? $message = "Patient $id removed" : $message = "Patient does not exists";
        return response()->json(['message' => $message]);
	}
}
