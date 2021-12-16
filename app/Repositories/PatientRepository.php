<?php

namespace App\Repositories;

use App\Http\Requests\Patient\RegisterPatientRequest;
use App\Http\Requests\Patient\UpdatePatientRequest;
use App\Models\Patient;

class PatientRepository 
{
	private $model;

	public function __construct(Patient $model)
	{
		$this->model = $model;
	}

	public function createPatient(RegisterPatientRequest $request)
	{
		$patient = $this->model->create([
			'cpf' => $request->cpf,
			'name' => $request->name,
			'birthday' => $request->birthday,
		]);
		return $patient;
	}

	public function getPatients()
	{
		return $this->model->all();
	}
	
	public function getPatientById($id)
	{
		return $this->model->find($id);
	}

	public function getAppointmentsByPatientId($id)
	{
		$patient = $this->model->find($id);
		return $patient ? $patient->appointments()->get() : null;
	}

	public function updatePatient(UpdatePatientRequest $request, $id)
	{
		$patient = $this->model->find($id);
		$patient ? $patient->update($request->all()) : $patient = null;
		return $patient;
	}

	public function deletePatient($id)
	{
		$patient = $this->model->find($id);
		$patient ? $patient->delete() : $patient = null;
		return $patient;
		
	}
}