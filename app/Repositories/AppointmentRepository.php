<?php

namespace App\Repositories;

use App\Http\Requests\Appointment\RegisterAppointmentRequest;
use App\Http\Requests\Appointment\UpdateAppointmentRequest;
use App\Models\Appointment;

class AppointmentRepository 
{
	private $model;

	public function __construct(Appointment $model)
	{
		$this->model = $model;
	}

	public function createAppointment(RegisterAppointmentRequest $request)
	{
		$appointment = $this->model->create([
			'user_id' => $request->user_id,
			'patient_id' => $request->patient_id,
			'date_time' => $request->date_time,
		]);
		return $appointment;
	}

	public function getAppointments()
	{
		return $this->model->with('patient', 'doctor')->get();
	}
	
	public function getAppointmentById($id)
	{
		return $this->model->find($id);
	}

	public function updateAppointment(UpdateAppointmentRequest $request, $id)
	{
		$appointment = $this->model->find($id);
		$appointment ? $appointment->update($request->all()) : $appointment = null;
		return $appointment;
	}

	public function deleteAppointment($id)
	{
		$appointment = $this->model->find($id);
		$appointment ? $appointment->delete() : $appointment = null;
		return $appointment;
	}

	public function getAppointmentPatient($id)
	{
		$appointment = $this->model->find($id);
		$appointment ? $patient = $appointment->patient()->first() : $patient = null;
		return $patient;
	}

	public function getAppointmentDoctor($id)
	{
		$appointment = $this->model->find($id);
		$appointment ? $doctor = $appointment->doctor()->first() : $doctor = null;
		return $doctor;
	}
}