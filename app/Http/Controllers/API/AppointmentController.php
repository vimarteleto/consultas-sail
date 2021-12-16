<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Appointment\RegisterAppointmentRequest;
use App\Http\Requests\Appointment\UpdateAppointmentRequest;
use App\Repositories\AppointmentRepository;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    private $appointmentRepository;

    public function __construct(AppointmentRepository $appointmentRepository)
    {
        $this->appointmentRepository = $appointmentRepository;
    }

    public function createAppointment(RegisterAppointmentRequest $request)
    {
        $appointment = $this->appointmentRepository->createAppointment($request);
        return response()->json($appointment, 200);
    }
    
    public function getAppointments()
    {
    	$appointments = $this->appointmentRepository->getAppointments();
        return response($appointments);
    }

    public function getAppointmentById($id)
    {
        $appointment = $this->appointmentRepository->getAppointmentById($id);
        return $appointment ?? response()->json(['message' => "Appointment does not exists"], 404);
    }

    public function updateAppointment(UpdateAppointmentRequest $request, $id)
	{
        $appointment = $this->appointmentRepository->updateAppointment($request, $id);
		return $appointment ?? response()->json(['message' => "Appointment does not exists"], 404);
	}

    public function deleteAppointment($id)
	{
        $appointment = $this->appointmentRepository->deleteAppointment($id);
        $appointment ? $message = "Appointment $id removed" : $message = "Appointment does not exists";
        return response()->json(['message' => $message]);
	}

    public function getAppointmentPatient($id)
	{
		$patient = $this->appointmentRepository->getAppointmentPatient($id);
        return $patient ?? response()->json(['message' => "Appointment does not exists"], 404);
	}

	public function getAppointmentDoctor($id)
	{
		$doctor = $this->appointmentRepository->getAppointmentDoctor($id);
        return $doctor ?? response()->json(['message' => "Appointment does not exists"], 404);
	}
}
